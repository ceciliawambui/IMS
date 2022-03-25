<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax()) {
            $categories = Category::with(['supplier']);

            return datatables()->of($categories)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedCategories){
                        $trashedCategories->onlyTrashed();
                    });
                })
                ->editColumn('supplier', function($category){
                    return $category->suppliers?->name ?? "NA";
                })
                ->editColumn('image', function($category){;
                    return '<img src="'."storage/images/".$category->image .'"width="50" height="40" />';
                })
                ->addColumn('action', function($category) use($request) {
                    return view('categories.action', [
                        'id' => $category->id,
                        'trashed' => $request->trashed,

                    ]);

                })
                ->rawColumns(['image', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('categories.create', [ 'suppliers' => $suppliers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'supplier_id'=>'required',

        ]);

        $categories = new Category;
        $categories->name = $request->name;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $categories->image = $filename;
            // dd($filename);
        }
        $categories->supplier_id = $request->supplier_id;
        $categories->save();
        return redirect()->route('categories.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $suppliers = Supplier::all();
        return view('categories.edit', compact('category', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|unique:categories',
            'supplier_id'=>'required',

        ]);

        $categories = Category::find($id);
        $categories->name = $request->name;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $categories->image = $filename;
        }
        $categories->supplier_id = $request->supplier_id;
        $categories->save();
        return redirect()->route('categories.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $com = Category::where('id',$request->id)->delete();
        return Response()->json($com);
    }
    public function restore($id)
    {
        Category::where('id', $id)->withTrashed()->restore();

        return redirect()->route('categories.index');
    }
    public function forceDelete($id)
    {
        Category::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('categories.index');
    }
}

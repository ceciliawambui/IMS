<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(request()->ajax()) {

            $products = Product::with(['category']);

            return datatables()->of($products)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedProducts){
                        $trashedProducts->onlyTrashed();
                    });
                })
                ->editColumn('category', function($product){
                    return $product->category?->name ?? "NA";
                })
                ->editColumn('image', function($product){;
                    return '<img src="'."storage/images/".$product->image .'"width="70" height="60" />';
                })
                ->addColumn('action', function($product) use($request) {
                    return view('products.action', [
                        'id' => $product->id,
                        'trashed' => $request->trashed,

                    ]);

                })
                ->rawColumns(['image','action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', [ 'categories' => $categories]);
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
            'category_id'=>'required',
            'quantity'=>'required',
            'buying_price'=>'required',
            'selling_price'=>'required',


        ]);

        $products = new Product;
        $products->name = $request->name;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $products->image = $filename;
            // dd($filename);
        }
        $products->category_id = $request->category_id;
        $products->quantity = $request->quantity;
        $products->buying_price = $request->buying_price;
        $products->selling_price = $request->selling_price;
        $products->save();
        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id'=>'required',
            'quantity'=>'required',
            'buying_price'=>'required',
            'selling_price'=>'required',

        ]);

        $products = Product::find($id);
        $products->name = $request->name;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $products->image = $filename;
        }
        $products->category_id = $request->category_id;
        $products->quantity = $request->quantity;
        $products->buying_price = $request->buying_price;
        $products->selling_price = $request->selling_price;
        $products->save();
        return redirect()->route('products.index');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        $com = Product::where('id',$request->id)->delete();
        return Response()->json($com);
    }
    public function restore($id)
    {
        Product::where('id', $id)->withTrashed()->restore();

        return redirect()->route('products.index');
    }
    public function forceDelete($id)
    {
        Product::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('products.index');
    }
}

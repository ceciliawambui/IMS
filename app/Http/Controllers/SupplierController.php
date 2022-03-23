<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if(request()->ajax()) {
            $suppliers = Supplier::query();
            return datatables()->of($suppliers)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedSuppliers){
                        $trashedSuppliers->onlyTrashed();
                    });
                })
                ->addColumn('action', function($supplier) use($request) {
                    return view('suppliers.action', [
                        'id' => $supplier->id,
                        'trashed' => $request->trashed,
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }


        return view('suppliers.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'location' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'product_category' => 'required',

        ]);

        $suppliers = new Supplier;
        $suppliers->name = $request->name;
        $suppliers->address = $request->address;
        $suppliers->location = $request->location;
        $suppliers->contact_person = $request->contact_person;
        $suppliers->phone = $request->phone;
        $suppliers->product_category = $request->product_category;
        $suppliers->save();
        return redirect()->route('suppliers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'location' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'product_category' => 'required',

        ]);
        $suppliers = Supplier::find($id);
        $suppliers->name = $request->name;
        $suppliers->address = $request->address;
        $suppliers->location = $request->location;
        $suppliers->contact_person = $request->contact_person;
        $suppliers->phone = $request->phone;
        $suppliers->product_category = $request->product_category;
        $suppliers->save();
        return redirect()->route('suppliers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier, Request $request)
    {
        $com = Supplier::where('id',$request->id)->delete();
        return Response()->json($com);
    }
    public function restore($id)
    {
        Supplier::where('id', $id)->withTrashed()->restore();

        return redirect()->route('suppliers.index');
    }
    public function forceDelete($id)
    {
        Supplier::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('suppliers.index');
    }
}

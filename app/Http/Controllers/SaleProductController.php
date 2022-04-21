<?php

namespace App\Http\Controllers;

use App\Models\SaleProduct;
use Illuminate\Http\Request;

use App\Models\Product;

class SaleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(request()->ajax()) {
            $saleproducts = SaleProduct::with(['products']);
            return datatables()->of($saleproducts)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedSaleproducts){
                        $trashedSaleproducts->onlyTrashed();
                    });
                })
                ->editColumn('name', function($saleProduct){
                    return $saleProduct->products?->name ?? "NA";
                })
                // ->editColumn('quantity', function($saleProduct){
                //     return $saleProduct->products?->quantity ?? "NA";
                // })
                // ->editColumn('price', function($saleProduct){
                //     return $saleProduct->products?->price ?? "NA";
                // })

                ->addColumn('action', function($saleProduct) use($request) {
                    return view('saleproducts.action', [
                        'id' => $saleProduct->id,
                        'trashed' => $request->trashed,
                    ]);

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('saleproducts.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('saleproducts.create',['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'total'=>''
        ]);
        $saleProduct = new SaleProduct;
        $saleProduct->product_id = $request->product_id;
        $saleProduct->quantity = $request->quantity;
        $saleProduct->price = $request->price;
        $saleProduct->total = $request->price * $request->quantity;
        $saleProduct->save();
        return view('saleproducts.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SaleProduct $saleProduct)
    {
        return view('saleproducts.show', compact('saleProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleProduct $saleProduct)
    {
        $products = Product::all();
        return view('saleproducts.edit', compact('saleProduct', 'products'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleProduct $saleProduct)
    {
        $request->validate([
            'product_id'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'total'=>''
        ]);
        $saleProduct = SaleProduct::find($id);
        $saleProduct->product_id = $request->product_id;
        $saleProduct->quantity = $request->quantity;
        $saleProduct->price = $request->price;
        $saleProduct->total = $request->total;
        $saleProduct->save();
        return view('saleproducts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy( SaleProduct $saleProduct, Request $request)
    {
        $com = SaleProduct::where('id',$request->id)->delete();
        return Response()->json($com);
    }
    public function restore($id)
    {
        SaleProduct::where('id', $id)->withTrashed()->restore();

        return redirect()->route('saleproducts.index');
    }
    public function forceDelete($id)
    {
        SaleProduct::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('saleproducts.index');
    }


    // public function search(Request $request){
    //     // Get the search value from the request
    //     $search = $request->input('search');

    //     // Search in the title and body columns from the posts table
    //     $posts = Post::query()
    //         ->where('product_id', 'LIKE', "%{$search}%")
    //         ->orWhere('product_id', 'LIKE', "%{$search}%")
    //         ->get();

    //     // Return the search view with the resluts compacted
    //     return view('search', compact('products'));
    // }
}

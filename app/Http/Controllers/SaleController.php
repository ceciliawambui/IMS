<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('sales.index');

    // }
    public function index(Request $request)
    {

        if(request()->ajax()) {

            $sales = Sale::with(['products' => function($query){
                $query->select('id','name','image');
            }]);

            return datatables()->of($sales)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedSales){
                        $trashedSales->onlyTrashed();
                    });
                })
                ->editColumn('product_name', function($sale){
                    return $sale->product?->product_name ?? "NA";
                })
                ->editColumn('product_image', function($sale){;
                    return $sale->product?->product_image ?? "NA";
                    // return '<img src="'."storage/images/".$product->image .'"width="50" height="40" />';
                })
                ->addColumn('action', function($product) use($request) {
                    return view('sales.action', [
                        'id' => $sale->id,
                        'trashed' => $request->trashed,

                    ]);

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('sales.create', [ 'products' => $products]);

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
            'date' => 'required',
            'customer' => 'required',
            'product_id'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'amount'=>'required',

        ]);

        $sales = new Sale;
        $sales->date = $request->date;
        $sales->customer = $request->customer;
        $sales->product_id = $request->product_id;
        $sales->price = $request->price;
        $sales->quantity = $request->quantity;
        $sales->amount = $request->amount;
        $sales->save();
        return redirect()->route('sales.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}

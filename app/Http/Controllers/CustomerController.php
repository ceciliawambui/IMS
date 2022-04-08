<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if(request()->ajax()) {
            $customers = Customer::query();
            return datatables()->of($customers)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedCustomers){
                        $trashedCustomers->onlyTrashed();
                    });
                })
                ->addColumn('action', function($customer) use($request) {
                    return view('customers.action', [
                        'id' => $customer->id,
                        'trashed' => $request->trashed,
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }


        return view('customers.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'phone' => 'required',
        ]);

        $customers = new Customer;
        $customers->name = $request->name;
        $customers->phone = $request->phone;
        $customers->save();
        return redirect()->route('customers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $customers = Customer::find($id);
        $customers->name = $request->name;
        $customers->phone = $request->phone;
        $customers->save();
        return redirect()->route('customers.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Request $request)
    {
        $com = Customer::where('id',$request->id)->delete();
        return Response()->json($com);
    }
    public function restore($id)
    {
        Customer::where('id', $id)->withTrashed()->restore();

        return redirect()->route('customers.index');
    }
    public function forceDelete($id)
    {
        Customer::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('customers.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Models\Customer;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(request()->ajax()) {
            $points = Point::with(['customers']);
            return datatables()->of($points)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedPoints){
                        $trashedPoints->onlyTrashed();
                    });
                })
                ->editColumn('customer', function($point){
                    return $point->customers?->name ?? "NA";
                })

                ->addColumn('action', function($point) use($request) {
                    return view('points.action', [
                        'id' => $point->id,
                        'trashed' => $request->trashed,
                    ]);

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('points.index');
    }
    // public function index()
    // {
    //     return view('points.index');
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('points.create',['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'customer_id'=>'required',
            'points'=>'required',
            'date'=>'required'
        ]);
        $point = new Point;
        $point->customer_id = $request->customer_id;
        $point->points = $request->points;
        $point->date = $request->date;
        $point->save();
        return redirect()->route('points.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        return view('points.show', compact('point'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        $customers = Customer::all();
        return view('points.edit', compact('point', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        $request->validate([
            'customer_id'=>'required',
            'points'=>'required',
            'date'=>'required'
        ]);
        $point = Point::find($id);
        $point->customer_id = $request->customer_id;
        $point->points = $request->points;
        $point->date = $request->date;
        $point->save();
        return redirect()->route('points.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point, Request $request)
    {
        $com = Point::where('id',$request->id)->delete();
        return Response()->json($com);
    }
    public function restore($id)
    {
        Point::where('id', $id)->withTrashed()->restore();

        return redirect()->route('points.index');
    }
    public function forceDelete($id)
    {
        Point::where('id', $id)->onlyTrashed()->forceDelete();

        return redirect()->route('points.index');
    }
}

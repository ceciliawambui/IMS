<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

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

            $points = Point::with(['customer']);

            return datatables()->of($points)
                ->filter(function($query) use($request){
                    $query->when($request->trashed == 1, function($trashedPoints){
                        $trashedPoints->onlyTrashed();
                    });
                })
                ->editColumn('customer', function($point){
                    return $point->customer?->name ?? "NA";
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
        return view('points.create');        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('searchDemo');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function autocomplete(Request $request)
    {
        $data = [];

        if($request->filled('q')){
            $data = Product::select("name","selling_price","id")
                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
        // console.log->json($data);
        return response()->json($data);
    }
    public function searchform(){
        return view('searchOne');
    }

        //Search Data from Database and put it into the select box in Results
        // public function autoCompleteSearch(Request $request) {

        //  $query = $request->get('search','');

        //  $tabledata = Product::select('id','name','selling_price')->where('name','LIKE','%'.$query.'%')->get();
        //    $getdata = $tabledata;
        //      $data=array();
        //      foreach($getdata as $tabledata){
        //          $data[]=array('value'=>$tabledata->name,'id'=>$tabledata->id);
        //          }
        //          if(count($data) && !empty( $query )){
        //              $dataVal = '<ul class="no-bullets" id="selectval">';
        //              foreach($data as $key=>$value){
        //                $dataVal .=  '<li onClick="selectval('."'".$value['value']."'".')">'.$value['value'].'</li>';
        //              }
        //              $dataVal .='</ul>';
        //              }else{
        //                $dataVal = '<ul id="selectval">';
        //                $dataVal .=  '<li>No result found..!</li>';
        //                $dataVal .='</ul>';
        //              }
        //                echo $dataVal;
        //                exit();
        // }


         //Find Result Accroding to Request Parameter
        //  public function autoCompleteSearchResult(Request $request)
        //  {
        //     if($request->has('search_keyword')){
        //     $search=$request->get('search_keyword');
        //     $data=Product::where('name','like','%'.$search.'%')->first();
        //     return view('view',['data' => $data]);
        //    }
        //  }

}

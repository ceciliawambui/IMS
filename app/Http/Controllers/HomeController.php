<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;

use App\Models\Product;

use App\Models\Category;

use App\Models\User;

use App\Models\Sale;

use App\Models\Supplier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('admin.index');
    // }
    public function index()
    {
        $countSuppliers = Supplier::withoutTrashed()->count();
        $countCategories =Category::withoutTrashed()->count();
        $countProducts = Product::withoutTrashed()->count();
        $countCustomers= Customer::withoutTrashed()->count();
        // $countSales = Sale::withoutTrashed()->count();
        // $countUsers = User::withoutTrashed()->count();
        if (Auth::user()->hasRole('admin')) {
            return view('admin.index', compact('countSuppliers', 'countCategories', 'countProducts', 'countCustomers' ));
        } else {
            return view('admin.products',compact('countSuppliers', 'countCategories', 'countProducts', 'countCustomers' ));
        }

        // return view('home', compact('countSuppliers', 'countCategories', 'countProducts', 'countCustomers', 'countSales','countUsers' ));
    }
}

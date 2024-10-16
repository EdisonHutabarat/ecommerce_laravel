<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Distributors;

class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::count();
        $users = User::count();
        $distributors = Distributors::count();

        return view('pages.admin.index', compact('products', 'users', 'distributors'));
    } 
}

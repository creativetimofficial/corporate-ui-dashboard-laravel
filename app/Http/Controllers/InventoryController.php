<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index(){

        $user = User::find(Auth::id());

        $products = Product::all();
        return view('inventory.index', compact('inventory'));
    }
}

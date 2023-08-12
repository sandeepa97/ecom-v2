<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Item;
use App\Models\Admin;
use App\Models\Seller;  

class DashboardController extends Controller
{
    public function index()
    {
        $countProducts = ProductType::count();
        $countItems = Item::where('disabled', '=', 'f')->count();
        return view(
            'admin.dashboard', [
                'countProducts' => $countProducts,
                'countItems' => $countItems
            ]
        );
    }
}

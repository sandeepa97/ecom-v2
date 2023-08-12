<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Item;
use App\Models\Admin;
use App\Models\Seller;

class WebController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();
        $items = Item::where('disabled', '=', 'f')->get();
        $trendingItems = Item::where('disabled', '=', 'f')->where('trending', '=', 't')->get();
        $newItems = Item::where('disabled', '=', 'f')->where('new', '=', 't')->get();
        $seller = Seller::first();
        $admin = Admin::first();

        return view(
            'website.index', [
            'productTypes' => $productTypes,
            'items' => $items,
            'trendingItems' => $trendingItems,
            'newItems' => $newItems,
            'seller' => $seller,
            'admin' => $admin
            ]
        );
    }

}

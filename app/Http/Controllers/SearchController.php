<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Seller;
use App\Models\ProductType;
use App\Models\Item;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $seller = Seller::first();
        $admin = Admin::first();
        $productTypes = ProductType::all();

        $query = $request->get('keyword');
        $results = Item::where('name', 'like', '%' . $query . '%')->get();

        return view(
            'website.search', [
            'results' => $results,
            'productTypes' => $productTypes,
            'seller' => $seller,
            'admin' => $admin
            ]
        );
    }
}

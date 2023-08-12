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

    public function shop()
    {
        $productTypes = ProductType::all();
        $seller = Seller::first();
        $admin = Admin::first();

        return view(
            'website.shop', [
            'productTypes' => $productTypes,
            'seller' => $seller,
            'admin' => $admin
            ]
        );
    }

    public function contact()
    {
        $productTypes = ProductType::all();
        $seller = Seller::first();
        $admin = Admin::first();

        return view(
            'website.contact', [
            'productTypes' => $productTypes,
            'seller' => $seller,
            'admin' => $admin
            ]
        );
    }

    public function loginForm()
    {
        $seller = Seller::first();

        return view(
            'website.auth.login', [
            'seller' => $seller
            ]
        );
    }

    public function forgotPassword()
    {
        $seller = Seller::first();

        return view(
            'website.auth.forgot-password', [
            'seller' => $seller
            ]
        );
    }

    public function recoverPassword()
    {
        $seller = Seller::first();

        return view(
            'website.auth.recover-password', [
            'seller' => $seller
            ]
        );
    }
}

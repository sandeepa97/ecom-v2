<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $activeItems = Item::where('disabled', '=', 'f')->get();
        $inactiveItems = Item::where('disabled', '=', 't')->get();

        return view(
            'admin.item.index', [
            'items' => $items,
            'activeItems' => $activeItems,
            'inactiveItems' => $inactiveItems
            ]
        );
    }
}

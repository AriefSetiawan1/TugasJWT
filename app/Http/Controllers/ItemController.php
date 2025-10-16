<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = [
            ['id' => 1, 'name' => 'Kemeja Batik', 'price' => 150000],
            ['id' => 2, 'name' => 'Jaket Jeans', 'price' => 250000],
            ['id' => 3, 'name' => 'Sepatu Sneakers', 'price' => 350000],
        ];

        return response()->json($items);
    }
}

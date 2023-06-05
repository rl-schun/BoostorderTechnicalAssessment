<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class OrderController extends Controller
{
    public function getCart() {
        $results = DB::select('select * from cart');

        return $results;
    }
    public function addCart(Request $request) {
        $raw_data = $request->getContent();
        $usable_data = json_decode($raw_data);
        DB::insert('INSERT INTO cart (ProductID, name, imageURL) values (?, ?, ?)', [$usable_data->id, $usable_data->name, $usable_data->imageURL]);
    }

    public function getOrderList() {
        $results = DB::select('SELECT * FROM orderlist');

        return $results;
    }

    public function createOrder() {
        $results = DB::select('select * from cart');

        foreach($results as $item){
            DB::insert('INSERT INTO orderlist (ProductID, name, imageURL, status) VALUES (?,?,?,?)',[$item->ProductID, $item->name, $item->imageURL, 'Pending']);
        };

        DB::delete('DELETE FROM cart');
    }

    public function updateOrderStatus(){

    }
}

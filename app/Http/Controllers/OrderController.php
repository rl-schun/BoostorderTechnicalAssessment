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

    public function updateOrderStatus(Request $request){
        $raw_data = $request->getContent();
        $usable_data = json_decode($raw_data);
        $newStatus = $usable_data->newStatus;
        DB::update('UPDATE orderlist SET status=? WHERE status != "Completed"', [$newStatus]);
        DB::update('INSERT INTO notification VALUES (?,?)', ["Your Order Status have been updated to {$newStatus}", 0]);
    }

    public function getNotificationCount(){
        $results = DB::select('SELECT COUNT(*) AS total from notification WHERE isread != 1');

        return $results;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class CatalogueController extends Controller
{
    //
    public function index() {
        $pageNum = Route::current()->parameter('pageNum');
        $authedRequest = Http::withBasicAuth(env('MANGOMART_USERNAME'),env('MANGOMART_PASSWORD'));
        $raw_data = $authedRequest->get("https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products?page={$pageNum}");
        $json_data = json_decode($raw_data);
        
        $usableProductList = $this->filterRawData($json_data);
        $result = [
            "productList"=> $usableProductList,
            "totalPage"=> $raw_data->header("X-WP-TotalPages"),
        ];

        return response()->json($result);
    }

    private function filterRawData(array $raw_data) {
        $buffer_container = [];

        foreach($raw_data as $element){
            if($element->catalog_visibility == "hidden")
                continue;

            array_push($buffer_container, [
                'id' => $element->id,
                'name' => $element->name,
                'categories' => $element->categories,
                'imageURL' => $element->images[0]->src
            ]);
        }

        return $buffer_container;
    }
}

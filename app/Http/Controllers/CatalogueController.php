<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CatalogueController extends Controller
{
    //
    public function index() {
        $authedRequest = Http::withBasicAuth(env('MANGOMART_USERNAME'),env('MANGOMART_PASSWORD'));
        $raw_data = $authedRequest->get('https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products');
        $json_data = json_decode($raw_data);
        
        $result = $this->filterRawData($json_data);

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

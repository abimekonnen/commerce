<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductTyp;

class dataFetchController extends Controller
{
    public function getType($categoryName){

        $data = ProductTyp::where('category',$categoryName )->get();
        echo json_encode($data);
    }
}

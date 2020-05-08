<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotels;

class HotelsController extends Controller
{
    public function getHotels() {

       $model = new Hotels();
       $hotels = $model->getHotels();

        return response()->json(['hotels' => $hotels]);
    }
}

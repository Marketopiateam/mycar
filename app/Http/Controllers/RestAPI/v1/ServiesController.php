<?php

namespace App\Http\Controllers\RestAPI\v1;

use App\Models\City;

use App\Models\Brand;
use App\Models\Product;
use App\Models\modelcar;
use App\Models\motorcar;
use App\Models\ServiceCar;
use App\Utils\BrandManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Services;

class ServiesController extends Controller
{

    public function get_servies(Request $request)
    {

        try {
            $servies =  Services::get();

        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }

        return response()->json($servies,200);
    }


    public function booking_servies(Request $request)
    {

        $data=[];

            $data=['service_id'=>$request->service_id];

            $data=['name'=> $request->name];

            $data=['body'=>$request->body];

            $data=['phone'=> $request->phone];
            
        try {
            $booking_servies =  Services::create($data);

        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }

        return response()->json($booking_servies,200);
    }
}

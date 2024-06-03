<?php

namespace App\Http\Controllers\RestAPI\v1;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Brand;
use App\Models\Product;
use App\Models\modelcar;
use App\Models\motorcar;
use App\Models\ServiceCar;
use App\Utils\BrandManager;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function get_brands(Request $request)
    {
        if($request->has('seller_id') && !empty($request->seller_id)){
            //finding brand ids
            $brand_ids = Product::active()
                ->when($request->has('seller_id') && !empty($request->seller_id), function ($query) use ($request) {
                    return $query->where(['added_by' => 'seller'])
                        ->where('user_id', $request->seller_id);
                })->pluck('brand_id');

            $brands = Brand::active()->whereIn('id', $brand_ids)->withCount('brandProducts')->latest()->get();
        }else{
            $brands = BrandManager::get_active_brands();
        }

        return response()->json($brands,200);
    }

    public function get_products(Request $request, $brand_id)
    {
        try {
            $products = BrandManager::get_products($brand_id, $request);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }

        return response()->json($products,200);
    }

     public function get_motor_car(Request $request)
    {
        $motorcars =  motorcar::where('modelcar_id', $request->model_id)->get();
        return response()->json($motorcars, 200);
    }

    public function get_model_car(Request $request)
    {
        $modelcar =  modelcar::where('brand_id', $request->brand_id)->get();
        return response()->json($modelcar, 200);
    }

    public function get_servies_car(Request $request)
    {
        $servies_car =  ServiceCar::with(['city','brand'])->where('city_id',$request->city_id)->get();
        return response()->json($servies_car, 200);
    }

    public function get_city(Request $request)
    {
        $city =  City::get();
        return response()->json($city, 200);
    }
    public function get_search(Request $request)
    {
        try {
            $products = BrandManager::get_productsbymodelandmotor( $request);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }

        return response()->json($products,200);
    }
    public function filter_servies(Request $request)
    {
        $data = [];
        if ($request->has('brand_id')) {
            $data['brand_id'] = $request->input('brand_id');
        }
        if ($request->has('city_id')) {
            $data['city_id'] = $request->input('city_id');
        }

        try {
            $servies_car =  ServiceCar::with(['city','brand'])->where($data)->get();

        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }

        return response()->json($servies_car,200);
    }
}

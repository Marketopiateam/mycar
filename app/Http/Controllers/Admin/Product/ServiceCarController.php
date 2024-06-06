<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Brand;
use App\Models\modelcar;
use App\Models\ServiceCar;
use Illuminate\Http\Request;
//use App\Enums\ViewPaths\Admin\Brand;
use App\Exports\BrandListExport;
use App\Traits\FileManagerTrait;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ServiceCarRequest;

use App\Http\Requests\StoreModelRequest;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\Enums\ExportFileNames\Admin\Brand as BrandExport;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\CarModelRepositoryInterface;
use App\Contracts\Repositories\TranslationRepositoryInterface;
use App\Models\City;

class ServiceCarController extends Controller
{
    use FileManagerTrait;
    public function index(Request $request)
    {
        $servicecar =  ServiceCar::get();

        return view('admin-views.servicecar.list', compact('servicecar'));
    }
    public function create(modelcar $model)
    {
        $brands = ServiceCar::get();
        $city =  City::get();
        return view('admin-views.servicecar.add-new', compact('brands', 'city'));
    }
    public function store(Request $request)
    {
        $data['city_id'] = $request['city_id'] ?? '';
        $data['name'] = $request['name'] ?? '';
        $data['address'] = $request['address'] ?? '';
        $data['brands'] = $request['brands'] ?? null;
        $data['phone'] = $request['phone'] ?? null;
        $data['star'] = $request['star'] ?? '';
        $data['image'] =  $this->upload(dir: 'service_car/image/', format: 'png', image: $request['image']);

        ServiceCar::create($data);
        Toastr::success(translate('servicecar_created_successfully'));
        return redirect()->route('admin.service-car.index');
    }
    public function update(Request $request,  $model)
    {

        $data['city_id'] = $request['city_id'] ?? '';
        $data['name'] = $request['name'] ?? '';
        $data['address'] = $request['address'] ?? '';
        $data['phone'] = $request['phone'] ?? null;
        $data['brands'] = $request['brands'] ?? null;
        $data['star'] = $request['star'] ?? '';
        if ($request->has('image')) {

            $data['image'] =  $this->upload(dir: 'service_car/image/', format: 'png', image: $request['image']);
        }

        $model = ServiceCar::find($model)->update($data);

        Toastr::success(translate('servicecar_updated_successfully'));
        return redirect()->route('admin.service-car.index');
    }
    public function edit($id)
    {

        $model =  ServiceCar::findOrFail($id);
        $brands =  Brand::get();
        $city =  City::get();
        return view('admin-views.servicecar.edit', compact('model', 'brands', 'city'));
    }
    public function destroy($id)
    {
        $model =  ServiceCar::findOrFail($id);
        $model->delete();
        Toastr::success(translate('servicecar_deleted_successfully'));
        return redirect()->route('admin.service-car.index');
    }
}

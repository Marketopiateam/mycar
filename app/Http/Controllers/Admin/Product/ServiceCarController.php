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
        $brands = Brand::get();
        return view('admin-views.servicecar.add-new', compact('brands'));
    }
    public function store(Request $request)
    {
        $data['name'] = $request['name']??'';
        $data['address'] = $request['address']??'';
        $data['brands'] = $request['brands']??null;
        $data['star'] = $request['star']??'';
        $data['image'] =  $this->upload(dir: 'service_car/image/', format: 'png', image: $request['image']);

        ServiceCar::create($data);
        Toastr::success(translate('model_created_successfully'));
        return redirect()->route('admin.models.index');
    }
    public function update(StoreModelRequest $request, modelcar $model): RedirectResponse
    {
        $model->update($request->all());
        Toastr::success(translate('model_updated_successfully'));
        return redirect()->route('admin.models.index');
    }
    public function edit(modelcar $model)
    {
        $brands = Brand::get();
        return view('admin-views.servicecar.edit', compact('brands', 'model'));
    }
    public function destroy(modelcar $model): RedirectResponse
    {
        $model->delete();
        Toastr::success(translate('model_deleted_successfully'));
        return redirect()->route('admin.models.index');
    }
}

<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\Repositories\CarModelRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\TranslationRepositoryInterface;
use App\Enums\ExportFileNames\Admin\Brand as BrandExport;
//use App\Enums\ViewPaths\Admin\Brand;
use App\Exports\BrandListExport;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelRequest;
use App\Models\Brand;
use App\Models\modelcar;
use App\Services\BrandService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CarModelController extends Controller
{
    public function index(Request $request)
    {
        $models = modelcar::with('brand');
        if ($request->searchValue != "") {
            $models = $models->where('name', 'LIKE', "%".$request->searchValue."%");
        }
        $models = $models->paginate(20);

        return view('admin-views.model.list', compact('models'));
    }
    public function create(modelcar $model)
    {  
        $brands = Brand::get();
        return view('admin-views.model.add-new', compact('brands'));
    }
    public function store(StoreModelRequest $request)
    {  
        modelcar::create($request->all());
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
        return view('admin-views.model.edit', compact('brands', 'model'));
    }
    public function destroy(modelcar $model): RedirectResponse
    {
        $model->delete();
        Toastr::success(translate('model_deleted_successfully'));
        return redirect()->route('admin.models.index');
    }
    
}

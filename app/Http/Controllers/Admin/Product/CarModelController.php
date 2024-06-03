<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\Repositories\CarModelRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\TranslationRepositoryInterface;
use App\Enums\ExportFileNames\Admin\Brand as BrandExport;
use App\Enums\ViewPaths\Admin\Brand;
use App\Exports\BrandListExport;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandAddRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
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
        return view('admin-views.model.list');
    }
    public function create(BrandAddRequest $request, modelcar $model): RedirectResponse
    {  
        Toastr::success(translate('brand_added_successfully'));
        return redirect()->route('admin.brand.list');
    }

    public function update(BrandUpdateRequest $request, $id, modelcar $model): RedirectResponse
    {
        Toastr::success(translate('brand_updated_successfully'));
        return redirect()->route('admin.brand.list');
    }


}

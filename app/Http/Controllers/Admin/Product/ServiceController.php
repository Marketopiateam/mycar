<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\Repositories\MotorCarRepositoryInterface;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Repositories\TranslationRepositoryInterface;
use App\Enums\ExportFileNames\Admin\Brand as BrandExport;
use App\Enums\ViewPaths\Admin\Brand;
use App\Exports\BrandListExport;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandAddRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
use App\Http\Requests\StoreMotorRequest;
use App\Models\modelcar;
use App\Models\motorcar;
use App\Models\Services;
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

class ServiceController extends Controller
{
    public function index(Request $request)
    {

        $services = Services::query();
        if ($request->searchValue != "") {
            $services = $services->where('name', 'LIKE', "%".$request->searchValue."%");
        }
        $services = $services->skip(1)->paginate(20);

        return view('admin-views.services.list', compact('services'));
    }
    public function create(motorcar $model)
    {
        return view('admin-views.services.add-new');
    }
    public function store(Request $request)
    {
        Services::create($request->all());
        Toastr::success(translate('service_created_successfully'));
        return redirect()->route('admin.services.index');
    }
    public function update(Request $request, Services $service): RedirectResponse
    {
        $service->update($request->all());
        Toastr::success(translate('service_updated_successfully'));
        return redirect()->route('admin.services.index');
    }
    public function edit(Services $service)
    {
        return view('admin-views.services.edit', compact('service'));
    }
    public function destroy($id): RedirectResponse
    {
        $services = Services::find($id);
        $services->delete();
        Toastr::success(translate('service_deleted_successfully'));
        return redirect()->route('admin.services.index');
    }

}

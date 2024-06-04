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

class MotorCarController extends Controller
{
    public function index(Request $request)
    {
        $motors = motorcar::with('model');
        if ($request->searchValue != "") {
            $motors = $motors->where('name', 'LIKE', "%".$request->searchValue."%");
        }
        $motors = $motors->paginate(20);

        return view('admin-views.motor.list', compact('motors'));
    }
    public function create(motorcar $model)
    {  
        $models = modelcar::get();
        return view('admin-views.motor.add-new', compact('models'));
    }
    public function store(StoreMotorRequest $request)
    {  
        motorcar::create($request->all());
        Toastr::success(translate('motor_created_successfully'));
        return redirect()->route('admin.motors.index');
    }
    public function update(StoreMotorRequest $request, motorcar $motor): RedirectResponse
    {
        $motor->update($request->all());
        Toastr::success(translate('motor_updated_successfully'));
        return redirect()->route('admin.motors.index');
    }
    public function edit(motorcar $motor)
    {  
        $models = modelcar::get();
        return view('admin-views.motor.edit', compact('models', 'motor'));
    }
    public function destroy($id): RedirectResponse
    {
        $motor = motorcar::find($id);
        $motor->delete();
        Toastr::success(translate('motor_deleted_successfully'));
        return redirect()->route('admin.motors.index');
    }
    
}

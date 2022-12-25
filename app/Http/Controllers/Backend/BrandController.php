<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\BrandService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\StoreBrandRequest;

class BrandController extends Controller
{
    //list
    public function index(){

        return view('backend.brands.index');

    }


    //create
    public function create(){

        return view('backend.brands.create');

    }

    //store
    public function store(StoreBrandRequest $request){

        (new BrandService())->store($request);

        return redirect()->route('brand')->with(['sucess'=>"Brand ဖန်တီခြင်းအောင်မြင်ပါသည်"]);
    }

    //edit
    public function edit(Brand $brand){

        return view('backend.brands.edit')->with(['brand'=>$brand]);

    }

    //update
    public function update(StoreBrandRequest $request,Brand $brand){

        (new BrandService())->update($request,$brand);

        return redirect()->route('brand')->with(['success'=>"Brand ပြုပြင်ခြင်းအောင်မြင်ပါသည်"]);

    }

    public function detail(){

    }

    //delete
    public function destroy(Brand $brand){
        $image = $brand->getRawOriginal('image') ?? '';
        Storage::delete($image);

        $brand->delete();
        return "success";
    }

     // product list ssr
    public function serverSide()
    {
        $brand = Brand::withCount('products')->orderBy('id','desc');
        return datatables($brand)
        ->addColumn('image', function ($each) {
            return '<img src="'.$each->image.'" class="img-thumbnail" style="width: 50px">';
        })
        ->addColumn('name',function($each){
            return '<p class="mb-0 " style="min-width:150px; max-width: 250px">'. Str::limit($each->name, 80).' </p>';
        })
        ->addColumn('products_count',function($each){
            return '<p class="mb-0 " style="min-width:250px; max-width: 400px">'. $each->products_count .' </p>';
        })
        ->addColumn('created_at',function($each){
            return Carbon::parse($each->created_at)->format('d/m/Y');
        })
        ->addColumn('action', function ($each) {
            $show_icon = '<a href="'.route('brand.detail', $each->id).'" class="btn btn-sm btn-outline-info"><i class="mdi mdi-eye-outline btn_icon"></i></a>';
            $edit_icon = '<a href="'.route('brand.edit', $each->id).'" class="btn btn-sm btn-outline-success"><i class="mdi mdi-square-edit-outline btn_icon"></i></a>';
            $delete_icon = '<a href="#" class="btn btn-sm btn-danger delete_btn" data-id="'.$each->id.'"><i class="mdi mdi-trash-can-outline btn_icon"></i></a>';

            return '<div class="d-flex flex-wrap gap-2">'.$show_icon .$edit_icon. $delete_icon .'</div>';
        })
        ->rawColumns(['name','products_count','image' ,'created_at','action'])
        ->toJson();
    }

}
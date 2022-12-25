<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreProductRequest;
use App\Http\Requests\Backend\UpdateProductRequest;

class ProductController extends Controller
{
    //list
     public function index(){

        return view('backend.products.index');

    }

    //create
    public function create(){

        $brands = Brand::orderBy('id','desc')->get();

        $categories = Category::orderBy('id','desc')->get();

        return view('backend.products.create')->with(['categories'=>$categories,'brands'=> $brands]);

    }

    //store
    public function store(StoreProductRequest $request){


        (new ProductService())->store($request);

        return redirect()->route('product')->with(['success'=>'Product ဖန်တီးခြင်းအောင်မြင်ပါသည်။']);

    }

    // detail
    public function detail(Product $product){

        return view('backend.products.detail')->with(['product'=>$product]);

    }

    // edit
    public function edit(Product $product){

        $brands = Brand::orderBy('id','desc')->get();

        $categories = Category::orderBy('id','desc')->get();

        return view('backend.products.edit')->with(['product'=>$product,'categories'=>$categories,'brands'=> $brands]);

    }

    // get product images for detail page
    public function getproductImages(Product $product){

        $oldImages = [];

        foreach ($product->images as $img) {
            $oldImages[] = [
            'id'  => $img->id,
            'src' => $img->image,
          ];
        }

        return response()->json($oldImages);
    }

    // update
    public function update(Product $product,UpdateProductRequest $request){
        if (empty($request->old) && empty($request->images)) {
            return redirect()->back()->with('infoMessage', 'Product Image is required');
        }

        (new ProductService())->update($request,$product);

        return redirect()->route('product')->with(['success'=>'product ပြုပြင်ခြင်းအောင်မြင်ပါသည်။']);

    }

    // delete
    public function destroy(Product $product){

        $images = $product->images()->get();

        foreach($images as $img){
            $oldPath = $img->getRawOriginal('image') ?? '';
            Storage::delete($oldPath);
        }

        $product->delete();

        return 'success';
    }


    // product list ssr
    public function serverSide()
    {
        $product = Product::with('image')->orderBy('id','desc');
        return datatables($product)
        ->addColumn('image', function ($each) {
            return '<img src="'.$each->image->image.'" class="img-thumbnail" style="width: 50px">';
        })
        ->addColumn('name',function($each){
            return '<p class="mb-0 text-start" style="min-width:150px; max-width: 250px">'. Str::limit($each->name, 80).' </p>';
        })
        ->addColumn('description',function($each){
            return '<p class="mb-0 text-start" style="min-width:250px; max-width: 400px">'. Str::limit($each->description, 100).' </p>';
        })
        ->addColumn('created_at',function($each){
            return Carbon::parse($each->created_at)->format('d/m/Y');
        })
        ->addColumn('action', function ($each) {
            $show_icon = '<a href="'.route('product.detail', $each->id).'" class="btn btn-sm btn-outline-info"><i class="mdi mdi-eye-outline btn_icon"></i></a>';
            $edit_icon = '<a href="'.route('product.edit', $each->id).'" class="btn btn-sm btn-outline-success"><i class="mdi mdi-square-edit-outline btn_icon"></i></a>';
            $delete_icon = '<a href="#" class="btn btn-sm btn-danger delete_btn" data-id="'.$each->id.'"><i class="mdi mdi-trash-can-outline btn_icon"></i></a>';

            return '<div class="d-flex flex-wrap gap-2">'.$show_icon .$edit_icon. $delete_icon .'</div>';
        })
        ->rawColumns(['name','description','image' ,'created_at','action'])
        ->toJson();
    }

}

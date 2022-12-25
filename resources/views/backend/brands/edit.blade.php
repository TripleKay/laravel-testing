@extends('backend.layouts.app')

@section('content')

    <x-breakcrumb title="Brand" activePage="create">
        <x-breakcrumbItem route="{{ route('brand') }}" title="Brands"></x-breakcrumbItem>
    </x-breakcrumb>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-none">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <a href="{{ URL::previous() }}" class="btn mb-0 py-0">
                            <i class="ri-arrow-left-s-line h4 mb-0"></i>
                        </a>
                        <p class="mb-0 ms-2">Brand ကိုပြုပြင်မည်</p>
                    </div>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-9">
                            <form method="POST" action="{{route('brand.update',$brand->id)}}" id="category_edit" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="" class="form-label">အမည်</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name',$brand->name) }}" placeholder="enter name.....">
                                </div>

                                <div class="mb-3">
                                    <label for="image">Images</label>
                                    <div class="mb-3">
                                        <img src="{{ $brand->image ?? asset(config('app.companyInfo.logo')) }}" class="" id="imgPreview" alt="{{$brand->name}}"  style="width: 150px;border-radius: 10px;border: 1px solid #000   ">
                                    </div>
                                    <input type="file" class="form-control" name="image" id="photo" accept="image/*"></input>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn_primary" >Brand ကိုပြုပြင်မည်</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\Backend\StoreCategoryRequest', '#category_create') !!}
    <script>

        $('#photo').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });


      </script>
@endsection


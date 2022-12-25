@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="">
                    {{-- <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" /> --}}
                    @php
                        $barcode1 = DNS1D::getBarcodeSVG('4445645656', 'PHARMA2T',10,50,'black',false);
                        echo DNS1D::getBarcodeHTML('4445645656', 'PHARMA2T',10,50,'red',true);
                        // echo '<img src="' . DNS1D::getBarcodePNG('4', 'C39+',3,33,array(1,1,1)) . '" alt="barcode"   />';
                        // echo DNS1D::getBarcodePNGPath('4445645656', 'PHARMA2T',3,33,array(255,255,255));
                        $barcode2= '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+',3,33,array(1,1,1)) . '" alt="barcode"   />';
                    @endphp
                    <div class="my-5 bg-light shadow p-3">
                        {{-- {!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!} --}}
                    </div>
                    {{-- <div class="my-5 bg-light shadow p-3">
                        {!! DNS1D::getBarcodeHTML('09787188807', 'PHARMA2T') !!}
                    </div> --}}


                </div>
            </div>
        </div>
    </div>
    <div class="col-6 py-5">
        <div class="my-5 bg-white shadow p-3">
            {!! DNS1D::getBarcodeHTML('09787188807', 'PHARMA') !!}
        </div>
    </div>
    <div class="col-6">
        <form action="" class="py-5">
            <input type="text" class="form-control" autofocus>
        </form>
    </div>
    <div class="col-12">
        <div class="card border-0 shadow-none">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <a href="{{ URL::previous() }}" class="btn mb-0 py-0">
                        <i class="ri-arrow-left-s-line h4 mb-0"></i>
                    </a>
                    <p class="mb-0 ms-2">Campaign အချက်အလက်</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card border-0 shadow-none">
            <div class="card-header ">
                <p class="mb-0">ခေါင်းစဥ် / Title</p>
            </div>
            <div class="card-body">
                <p>{{ $campaign->title ?? '---'}}</p>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card border-0 shadow-none">
            <div class="card-header ">
                <p class="mb-0">အကြောင်းအရာ / Description</p>
            </div>
            <div class="card-body">
                {{-- <p class="">{{  html_entity_decode($campaign->description ?? '---') }}</p> --}}
                <textarea class="form-control bg-transparent h-100" rows="10" disabled>{{ $campaign->description ?? '---'}}</textarea>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card border-0 shadow-none">
            <div class="card-header">
                <p class="mb-0">Images</p>
            </div>
            <div class="card-body d-flex flex-wrap">
                @foreach ($campaign->images as $img)
                    <div class="mx-2 rounded">
                        <img src="{{ $img->image }}" alt="{{ $campaign->name }}" class="rounded" srcset="" style="width: 100px; height: 100px">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreCampaignRequest', '#campaign_create') !!}
    <script src="{{ asset('dashboard/assets/js/image-uploader.min.js') }}"></script>
    <script>
         $(".input-images").imageUploader({
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10,
        });
    </script>
@endsection


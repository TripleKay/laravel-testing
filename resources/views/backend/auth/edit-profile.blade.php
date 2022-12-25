@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-10 offset-xl-1">
        <div class="card border-0 shadow-none">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <a href="{{ URL::previous() }}" class="btn mb-0 py-0">
                        <i class="ri-arrow-left-s-line h4 mb-0"></i>
                    </a>
                    <p class="mb-0 ms-2">Profile အချက်အလက်ကိုပြုပြင်မည်</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-9">
                        <form method="POST" action="{{route('profile.update')}}" id="edit-profile">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label mb-3">အမည်</label>
                                <input type="text" class="form-control" name="name" placeholder="enter your name..." value="{{ $data->name }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message  }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label mb-3">အီးမေးလ် / Email</label>
                                <input type="email" class="form-control" name="email" placeholder="enter your email..." value="{{ $data->email }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message  }}</small>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn_primary">ပြင်ဆင်မှုများကိုသိမ်းမည်</button>
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdateAdminRequest', '#edit-profile') !!}
@endsection


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
                    <p class="mb-0 ms-2">စကား၀ှက်ကိုပြောင်းလဲမည်</p>
                </div>
            </div>
                <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-9">
                        @if (Session::has('passwordError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('passwordError') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="POST" action="{{route('updatePassword')}}" >
                            @csrf

                            <div class="mb-3">
                                <label for="" class="form-label mb-3">စကား၀ှက်အသစ် / New Password</label>
                                <input type="password" class="form-control" name="newPassword" placeholder="enter your new password..." required>
                                @error('newPassword')
                                    <small class="text-danger">{{ $message  }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label mb-3">စကားဝှက်အတည်ပြုခြင်း / Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword" placeholder="enter your confirm password..." required>
                                @error('confirmPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-end ">
                                <button type="submit" class="btn btn_primary">စကား၀ှက်ကိုပြောင်းလဲမည်</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


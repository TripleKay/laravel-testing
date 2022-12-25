<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-none">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <a href="{{ URL::previous() }}" class="btn mb-0 py-0">
                        <i class="ri-arrow-left-s-line h4 mb-0"></i>
                    </a>
                    <p class="mb-0 ms-2">{{$title}} အသစ်ဖန်တီးမည်</p>
                </div>
            </div>
            <!-- end card header -->
            {{$slot}}
        </div>
    </div>
</div>

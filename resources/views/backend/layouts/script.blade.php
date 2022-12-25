    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/plugins.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{asset('dashboard/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Vector map-->
    <script src="{{asset('dashboard/assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

    <!--Swiper slider js-->
    <script src="{{asset('dashboard/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

    {{-- Sweet Alert --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- dropzone min -->
    <script src="{{ asset('dashboard/assets/libs/dropzone/dropzone-min.js') }}"></script>
     <!-- filepond js -->
    <script src="{{ asset('dashboard/assets/libs/filepond/filepond.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')}}"></script>

    <script src="{{ asset('dashboard/assets/js/pages/form-file-upload.init.js')}}"></script>
    
    {{-- jsvalidation --}}
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    
    <!-- Dashboard init -->
    <script src="{{asset('dashboard/assets/js/pages/dashboard-ecommerce.init.js')}}"></script>
    
    <!-- App js -->
    <script src="{{asset('dashboard/assets/js/app.js')}}"></script>

    <script>
         $(document).ready(function() {

                let token = document.head.querySelector('meta[name="csrf-token"]')

                if(token) {
                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-TOKEN' : token.content
                        }
                    })
                };

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })


                @if (session('success'))
                    Toast.fire({
                    icon: 'success',
                    title: '{{Session::get('success')}}',
                    })
                @endif

                @if (session('error'))
                    Toast.fire({
                    icon: 'success',
                    title: "အောင်မြင်ပါသည်။"
                    })
                @endif

                @if (session('infoMessage'))
                    Swal.fire({
                        icon: 'info',
                        text: '{{Session::get('infoMessage')}}',
                    })
                @endif
            })
        </script>
    </script>

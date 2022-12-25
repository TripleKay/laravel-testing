@extends('backend.layouts.app')

@section('content')

    <x-breakcrumb title="Brands" activePage="list">
        <x-breakcrumbItem route="{{ route('brand') }}" title="Brands"></x-breakcrumbItem>
    </x-breakcrumb>

    <div class="row">
        <div class="col-12">
            <x-card>
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h5 class="mb-0 text-dark">Brands - <div class="badge bg-dark">{{ App\Models\Brand::count() }}</div></h5>
                    <x-createButton route="{{ route('brand.create') }}" title="Brand"></x-createButton>
                </div>
                <div class="card-body">
                    <x-datatable>
                        <th class="text-center no-sort no-search text-nowrap">Image</th>
                        <th class="text-start text-nowrap" >အမည်</th>
                        <th class="text-center no-sort text-nowrap" >Product အရေအတွက်</th>
                        <th class="text-center no-sort text-nowrap">Created At</th>
                        <th class="text-center no-sort no-search text-nowrap">ပြင်မည်/ဖျက်မည်</th>
                    </x-datatable>
                </div>
            </x-card>
        </div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        //data table
          let table = $('#datatable').DataTable( {
              processing: true,
              serverSide: true,
              responsive: true,
              ajax: "/brands/datatable/ssd",
              language : {
                // "processing": "<img src='{{asset('/images/loading.gif')}}' width='50px'/><p></p>",
                "paginate" : {
                  "previous" : '<i class="mdi mdi-chevron-triple-left"></i>',
                  "next" : '<i class="mdi mdi-chevron-triple-right"></i>',
                }
              },
              columns : [
                  {data: 'image', name: 'image', class: 'text-center'},
                  {data: 'name', name: 'name' , class: 'text-center'},
                  {data: 'products_count', name: 'products_count' , class: 'text-center'},
                  {data: 'created_at', name: 'created_at' , class: 'text-center'},
                {data: 'action', name: 'action', class: 'text-center'},
              ],
              columnDefs : [
                {
                  targets : 'hidden',
                  visible : false,
                  searchable : false,
                },
                {
                  targets : 'no-sort',
                  sortable : false,
                },
                {
                  targets : 'no-search',
                  searchable : false,
                },
                {
                  targets: [0],
                  class : "control"
                },
              ]
          });

          // delete btn
          $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            Swal.fire({
                text: "Are you sure you want to delete!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
              if (result.isConfirmed) {
                let id = $(this).data('id');
                $.ajax({
                  url : `/brands/${id}`,
                  method : 'DELETE',
                }).done(function(res) {
                    table.ajax.reload();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                })
              }
            });
          })

        //create modal

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

      })
  </script>
@endsection



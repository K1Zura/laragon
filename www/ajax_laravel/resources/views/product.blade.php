<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <title>Ajax Laravel</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-3 text-center">Laravel  Ajax CRUD</h2>
                <a href="" class=" btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal"> Add product</a>
                <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search here...">
                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                            <td>
                                <a href=""
                                    class="btn btn-success update_product_form"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal"
                                    data-id="{{$item->id}}"
                                    data-name="{{$item->name}}"
                                    data-price="{{$item->price}}"
                                    ><i class="las la-edit"></i></a>
                                <a href=""
                                        class="btn btn-danger delete_product"
                                        data-id="{{$item->id}}"
                                        ><i class="las la-times"></i></a>
                            </td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="pagination">
                        {{$product->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('add_product_modal')
    @include('update_product_modal')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {!! Toastr::message() !!}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.add_product', function(e){
                e.preventDefault();
                let name = $('#name').val();
                let price = $('#price').val();
                Swal.fire({
                    title: 'Apakah sudah di cek?',
                    text: "Kamu yakin ingin mengubah?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:"{{ route('add.product') }}",
                            method:'post',
                            data:{name:name,price:price},
                            success:function(res) {
                                if (res.status=='success') {
                                    $('#addModal').modal('hide');
                                    $('#addProductForm')[0].reset();
                                    $('.table').load(location.href+' .table');
                                    Swal.fire(
                                    'Success!',
                                    'Your file has been add.',
                                    'success'
                                    )
                                }
                            },error:function(err){
                                let error = err.responseJSON;
                                $.each(error.errors, function (index, value) {
                                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
                                });
                                console.log(err);
                            }
                        })
                    }
                });
            })
            //show product in value form
            $(document).on('click', '.update_product_form', function () {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                $('#up_id').val(id);
                $('#up_name').val(name);
                $('#up_price').val(price);
            })

            //update product data
            $(document).on('click', '.update_product', function(e){
                e.preventDefault();
                let up_id = $('#up_id').val();
                let up_name = $('#up_name').val();
                let up_price = $('#up_price').val();
                $.ajax({
                    url:"{{ route('update.product') }}",
                    method:'post',
                    data:{up_id:up_id,up_name:up_name,up_price:up_price},
                    success:function(res) {
                        if (res.status=='success') {
                            $('#updateModal').modal('hide');
                            $('#updateProductForm')[0].reset();
                            $('.table').load(location.href+' .table');
                            Swal.fire(
                            'Success!',
                            'Your file has been add.',
                            'success'
                            )
                        }

                    },error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function (index, value) {
                            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
                        });
                    }
                })
            })

            //delete product data
            $(document).on('click', '.delete_product', function(e){
                e.preventDefault();
                let product_id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data ini tidak akan kembali lagi!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:"{{ route('delete.product') }}",
                            method:'post',
                            data:{product_id:product_id},
                            success:function(res) {
                                if (res.status=='success') {
                                    $('.table').load(location.href+' .table');
                                    Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    );
                                }
                            }
                        });
                    }
                });
            })

            //Pagination
            $(document).on('click','.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1]
                product(page)
            })

            function product(page) {
                $.ajax({
                    url:"/pagination/paginate-data?page="+page,
                    success:function(res){
                        $('table-data').html(res);
                    }
                })
            }

            //Search enggine
            $(document).on('keyup', function(e){
                e.preventDefault();
                let search_string  = $('#search').val();
                console.log(search_string);
                $.ajax({
                    url:"{{ route('search.product') }}",
                    method:'GET',
                    data:{search_string:search_string},
                    success:function(res){
                        $('.table-data').html(res);
                        if (res.status=='nothing_found') {
                            $('.table-data').html('<span class="text-danger">'+'Nothing Found'+'</span>');
                        }
                    }
            });
            })
        });
    </script>
  </body>
</html>

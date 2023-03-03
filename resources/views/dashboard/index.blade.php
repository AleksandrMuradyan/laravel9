@extends('layouts.dashboard')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="section-header-breadcrumb-content">
                            <h1>Create  Product</h1>

                        </div>
                    </div>

                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            </div>
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <form id="form"  class="form"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input id="name" type="text" class="form-control" name=name  required  autocomplete="name" autofocus placeholder="name">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input id="price" type="number" class="form-control " name="price"  required autocomplete="price" autofocus placeholder="price">

                                                                              </div>

                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input id="description" type="text" class="form-control" name="description"  required autocomplete="description" autofocus placeholder="description">
                                            </div>

                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="method" id="method" class="method form-control">
                                                <option value="GET"> get</option>
                                                <option value="POST"> post</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">

                                            <button type="submit" id="submit"  class="btn btn-primary">Create</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

        </section>

    </div>
    <script>


            $( document ).ready(function() {
                $('#form').submit(function(e){
                    var method =document.getElementById('method')
                    let route = '';
                    e.preventDefault();
                var formData = new FormData(this);
                    if(method.value == "GET"){
                        var type = true;
                        var formData = {
                                "name": $('#name').val(),
                                "price": $('#price').val(),
                                "description": $('#description').val(),
                        };
                    }else{
                        var type = false;
                        var formData = new FormData(this);
                    }
                $.ajax({
                    type: method.value,
                    url: '{{route('create_product')}}',
                    data: formData,
                    processData: type,
                    contentType: false,
                    dataType: "json",
                    success:function() {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'your product has been successfully created',
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        $('#name').val(''),
                            $('#price').val(''),
                        $('#description').val('')
                    },


                    error:function (response){
                         data = JSON.parse(response.responseText)
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    }
                });
            });
        });
    </script>



@endsection

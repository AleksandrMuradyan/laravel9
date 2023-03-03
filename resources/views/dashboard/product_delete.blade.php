@extends('layouts.dashboard')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="section-header-breadcrumb-content">
                            <h1>Update  Product</h1>

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

                            @php
                                $products =json_decode($data);

                            @endphp

                            <form id="form"  class="form"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <h1 style="text-align: center">Details</h1>
                                    <div class="col-sm-12 col-md-12 " style="margin-top: 15px">
                                        <h3 style="text-align: center">Name --  {{$products->name}}</h3>
                                        <h3 style="text-align: center">Price --  {{$products->price}} $</h3>
                                        <h3 style="text-align: center">Description --  {{$products->description}}</h3>

                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="method" id="method" class="method form-control">
                                            <option value="GET"> get</option>
                                            <option value="POST"> post</option>
                                        </select>
                                    <input type="hidden" value="{{$products->id}}" name="id">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">

                                        <button type="submit" id="submit"  class="btn btn-primary">Delete</button>
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
                e.preventDefault();
                var formData = new FormData(this);
                if(method.value == "GET"){
                    var type = true;
                    var formData = {
                        "id": {{$products->id}},
                    };
                }else{
                    var type = false;
                    var formData = new FormData(this);
                }
                $.ajax({
                    type: method.value,
                    url: '{{route('delete_product')}}',
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
                            timer: 2000
                        }).then(setTimeout(function() {
                            window.location.href = "{{route('product_list')}}";

                        }, 1000))},
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

@extends('layouts.dashboard')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="section-header-breadcrumb-content">
                            <h1>  Product List</h1>

                        </div>
                    </div>

                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        </div>



                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>

                                </tr>

                                </thead>
                                <tbody>
                                @php
                                    $products =json_decode($product);

                                @endphp
                                @foreach($products as  $product)
                                    <tr>
                                        <th scope="row"></th>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}$</td>
                                        <td>{{$product->description}}</td>
                                        <td><a class="dropdown-item" href="{{route('product_edit',['id'=>$product->id])}}">Edit</a></td>
                                        <td><a class="dropdown-item" href="{{route('product_delete',['id'=>$product->id])}}">Delete</a></td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>


@endsection

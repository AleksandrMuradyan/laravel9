@extends('layouts.dashboard')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="section-header-breadcrumb-content">
                            <h1>  Log List</h1>

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
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                                <th scope="col">Created</th>

                            </tr>

                            </thead>
                            <tbody>
                            @php
                                $logs =json_decode($data);

                            @endphp
                            @foreach($logs as  $log)
                                <tr>

                                    <td>{{$log->id}}</td>
                                    <td>{{$log->user_id}}</td>
                                    <td>{{$log->name}}</td>
                                    <td>{{$log->action}}</td>
                                    <td>{{$log->created_at}}</td>
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

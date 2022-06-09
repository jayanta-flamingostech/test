@extends('master')
@section('viewdetails')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">


                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Multiplex Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card bg-light ">
            <div class="card-header custom_info">
                <h3 class="card-title info-box-text">{{ $multiplexData->name }}</h3>
            </div>
            <video width="320" height="240" poster="{{env('AWS_MULTIPLEX_URL').'media_image/'.$multiplexData->image}}" controls>
                <source src="{{env('AWS_MULTIPLEX_URL').'media_file/'.$multiplexData->media}}">
            </video>
            <h3>{{ $multiplexData->name }}</h3>
            {{ $multiplexData->synopsis }}
            {{ $multiplexData->synopsis }}
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2 p-2 ">
                        <h3 class="text-primary text-center"><i class="fas fa-paint-brush"></i> Profile</h3>
                        <!-- --------------------- -->
                        <div class="card-body box-profile custom_info">

                            <ul class="list-group  mb-3">
                                <li class="list-group-item">
                                    <b>Email ID</b> <a class="float-right">{{$multiplexData->name}}</a>
                                </li>
                            </ul>
                        </div>    
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>


<!-- --------------------------->
@endsection()
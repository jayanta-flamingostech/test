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
           
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <video width="700" height="540" poster="{{env('AWS_MULTIPLEX_URL').'media_image/'.$multiplexData->image}}" controls>
                            <source src="{{env('AWS_MULTIPLEX_URL').'media_file/'.$multiplexData->media}}">
                        </video>
                        <h3>{{ $multiplexData->name }}</h3>
                        {{ $multiplexData->synopsis }}
                        {{ $multiplexData->synopsis }}
                        <a class="btn btn-sm btn-success" href={{ "multiplexapprove/$multiplexData->id" }} >Approve</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Reject
                        </button>					
                        <table class="table table-dark table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th scope="col">Sl. No.</th>
                                    <th scope="col">Reject Cause</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbdody>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2 p-2 ">
                        <h3 class="text-primary text-center"><i class="fas fa-paint-brush"></i> Detills</h3>
                        <!-- --------------------- -->
                        <div class="card-body box-profile custom_info">

                            <ul class="list-group  mb-3">
                            <li class="list-group-item">
                                    <b>Creator</b> <a class="float-right">{{$multiplexData->creator_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tag Line</b> <a class="float-right">{{$multiplexData->tag_line}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Genere</b> <a class="float-right">{{$multiplexData->genere_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Content</b> <a class="float-right">{{$multiplexData->type_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Audiance</b> <a class="float-right">{{$multiplexData->certification}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Cast</b> <a class="float-right">{{$multiplexData->stars}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Pricing</b> <a class="float-right">{{$multiplexData->price}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Start Date</b> <a class="float-right">{{ date("d-m-Y", strtotime($multiplexData->start_date)) }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>End Date</b> <a class="float-right">{{ date("d-m-Y", strtotime($multiplexData->end_date)) }}</a>
                                </li>
                                <li class="list-group-item">
                                <?php
                                    if($multiplexData->status == 'A'){
                                        $status = 'Approved';
                                        $badge = 'badge-success';
                                    }elseif($multiplexData->status == 'P'){
                                        $status = 'Pending';
                                        $badge = 'badge-warning';
                                    }else{
                                        $status = 'Rejected';
                                        $badge = 'badge-danger';
                                    }
                                ?>
                                    <b>Status</b> <a class="float-right"><div class="badge {{$badge}} fw-bolder">{{$status}}</div></a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection()
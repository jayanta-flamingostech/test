@extends('master')
@section('ottmedia_list')
<style>
.action{list-style: none;text-align:center;padding:0}
.action li{display: inline-block;}
.action li a{color: #fff;padding:0 5px;}
table thead tr th{text-align:center;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
						<li class="breadcrumb-item active">{{ __('Multiplex List') }}</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col-md-10">
					<h3 class="card-title"></h3>
				</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-dark table-striped table-bordered table-hover">
                  <thead>
                  <tr>  
                    <th>S.No.</th>                
                    <th>Name</th>
                    <th>Image</th>
                    <th>Genere</th>
                    <th>Content</th>
                    <th>Creator</th>
					          <th>Status</th> 
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $c=0; ?>
				   @if(count($multiplexAllData))
					   @foreach($multiplexAllData as $multiplexData)
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
						<tr>
							<td><?php echo $c=$c+1; ?></td>
							<td>{{$multiplexData->name}}</td>
              <td style="text-align:center;"><img style="width:70px;" @if ($multiplexData->image) src="{{env('AWS_MULTIPLEX_URL').'media_image/'.$multiplexData->image}}" @endif/></td>
							<td>{{$multiplexData->genere_name}}</td>
							<td>{{$multiplexData->type_name}}</td>
							<td>{{$multiplexData->creator_name}}</td>
							<td><div class="badge {{$badge}} fw-bolder">{{$status}}</div></td>
							<td><a class="btn btn-success" href={{"viewmultiplexdetails/".$multiplexData->id}}>Details</a></td>
						</tr>  
					   @endforeach
				   @else
						<tr>
							<td colspan="8" align="center">{{ __('No data found') }}</td>
						</tr>  
				   @endif
                        
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
	  
    </section>
</div>

<script>
  
</script>

@endsection() 
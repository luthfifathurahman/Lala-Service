<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'User';
	$breadcrumb[1]['url'] = url('backend/users-user');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Master User')

<!-- CONTENT -->
@section('content')
    {{ Form::open(['url' => url('/backend/users-user/delete'), 'method' => 'POST','class' => 'form-horizontal']) }}
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Master User</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))	
					</ol>
				</div> <!-- /.col -->
			</div> <!-- /.row -->
		</div> <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<div class="container-fluid">
        <div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">Master User</h2>
					</div>

					@include('backend.elements.notification')
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-xs-4">
								@include('backend.elements.create_button',array('url' => '/backend/users-user/create'))
							</div>
							<div class="col-lg-6 col-md-4 col-xs-4"></div>
							<div class="col-lg-3 col-md-4 col-xs-4">
								<?php
									$segment =  Request::segment(2);
									$userinfo = Session::get('userinfo');
									$access_control = Session::get('access_control');
									if (!empty($access_control)) :
										if ($access_control[$userinfo['user_level_id']][$segment] == "a"):
								?>           
									<button type="submit" class="btn btn-block btn-danger btn-delete-check"><i class="fa fa-minus"></i>&nbsp; Delete</a>
								<?php
										endif;
									endif;
								?>
							</div>
						</div>
						<br>
						<table id="example2" class="table table-bordered table-hover dataTable">
							<thead>
								<tr>
									<th>
										<span class="uni">
										<input type='checkbox' value='checkall' onclick='checkAll(this)' />
										</span>
									</th>
									<th>No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Level</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
            </div>
            <!-- /.card -->
		</div>
	</div>
</div>

    {{ Form::close() }}
@endsection

<!-- CSS -->
@section('css')

@endsection

<!-- JAVASCRIPT -->
@section('script')
	<script>
		$('.dataTable').dataTable({
			processing: true,
			serverSide: true,
            "order": [[ 1, "asc" ]],
			ajax: "<?=url('backend/users-user/datatable');?>",
			columns: [
                {data: 'check', name: 'check', orderable: false, searchable: false},
				{data: 'id', name: 'id'},
				{data: 'firstname', name: 'firstname'},
				{data: 'email', name: 'email'},
				{data: 'name', name: 'user_levels.name'},
				{data:  'active', render: function ( data, type, row ) {
					var text = "";
					var label = "";
					if (data == 1){
						text = "Active";
						label = "success";
					} else 
					if (data == 2){
						text = "Banned";
						label = "danger";
					}else 
					if (data == 3){
						text = "Non Active";
						label = "warning";
					}
					return "<span class='label label-" + label + "'>"+ text + "</span>";
                }},				
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			responsive: true
		});

        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
                }
            }
        }	

        $('.btn-delete-check').on('click', function(e){
            e.preventDefault();
            if (confirm("Apakah anda yakin mau menghapus data-data ini?")) {
                $(this).parents('form').submit();
            }
        });
	</script>
@endsection
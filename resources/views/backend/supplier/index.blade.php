<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Supplier';
	$breadcrumb[1]['url'] = url('backend/supplier');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Master Supplier')

<!-- CONTENT -->
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Master Supplier</h1>
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
						<h2 class="card-title">Master Supplier</h2>
					</div>

					@include('backend.elements.notification')
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-xs-4">
								@include('backend.elements.create_button',array('url' => '/backend/supplier/create'))
							</div>
							<div class="col-lg-6 col-md-4 col-xs-4"></div>
							<div class="col-lg-3 col-md-4 col-xs-4">
								<a href="/backend/dashboard" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
							</div>
						</div>
						<br>
						<table id="example2" class="table table-bordered table-hover dataTable">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>CP</th>
									<th>Telp</th>
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
@endsection

<!-- CSS -->
@section('css')

@endsection

<!-- JAVASCRIPT -->
@section('script')
	<script>
		$('.dataTable').dataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			processing: true,
			serverSide: true,
			ajax: "<?=url('backend/supplier/datatable');?>",
			columns: [
				{data: null, name: false, orderable: false, searchable: false,
					render: function (data, type, row, meta){
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
                {data: 'nama', name: 'nama'},
                {data: 'alamat', name: 'alamat'},
                {data: 'cp', name: 'cp'},
                {data: 'telp', name: 'telp'},	
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			responsive: true
		});
	</script>
@endsection
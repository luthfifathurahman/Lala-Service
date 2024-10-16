<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Inden';
	$breadcrumb[1]['url'] = url('backend/inden');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Daftar Inden')

<!-- CONTENT -->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Daftar Inden</h1>
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
						<h2 class="card-title">Daftar Inden</h2>
					</div>
					@include('backend.elements.notification')
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover dataTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>INV</th>
									<th>Jumlah</th>
									<th>Tanggal</th>
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
			ajax: "<?=url('backend/inden/datatable');?>",
			columns: [
				{"data": null, "name": false, orderable: false, searchable: false,
					render: function (data, type, row, meta){
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
                {data: 'nama', name: 'barang.nama'},
                {data: 'no_inv', name: 'no_inv'},
                {data: 'jumlah', name: 'purchase_d.jumlah'},
                {data: 'tanggal', name: 'tanggal'},
			],
			responsive: true
		});
	</script>
@endsection
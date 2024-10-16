<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Supplier';
	$breadcrumb[1]['url'] = url('backend/supplier');	
	$breadcrumb[2]['title'] = 'Add';
	$breadcrumb[2]['url'] = url('backend/supplier/create');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Edit';
		$breadcrumb[2]['url'] = url('backend/supplier/'.$data[0]->id.'/edit');
	}
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title')
	<?php
		$mode = "Create";
		if (isset($data)){
			$mode = "Edit";
		}
	?>
    Master Supplier - <?=$mode;?>
@endsection

<!-- CONTENT -->
@section('content')
	<?php
        $nama = old('nama');
        $alamat = old('alamat');
        $cp = old('cp');
        $telp = old('telp');
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/supplier/";
		if (isset($data)){
            $nama = $data[0]->nama;
            $alamat = $data[0]->alamat;
            $cp = $data[0]->cp;
            $telp = $data[0]->telp;
			$active = $data[0]->active;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/supplier/".$data[0]->id;
		}
	?>
<div class="content-wrapper">	
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Master Supplier - <?=$mode;?></h1>
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
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Master Supplier - <?=$mode;?></h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					{{ Form::open(['url' => $url, 'method' => $method]) }}
					{!! csrf_field() !!}
						<div class="card-body">
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Nama <span class="required">*</span></label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="nama" name="nama" required="required" class="form-control" value="<?=$nama;?>" placeholder="Enter ...">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Alamat</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="alamat" name="alamat" class="form-control" value="<?=$alamat;?>" placeholder="Enter ...">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Contact Person</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="cp" name="cp" class="form-control" value="<?=$cp;?>" placeholder="Enter ...">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">No. Hp</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="telp" name="telp" class="form-control" value="<?=$telp;?>" placeholder="Enter ...">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Status</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
								{{
									Form::select(
										'active',
										['1' => 'Active', '2' => 'Deactive'],
										$active,
										array(
											'class' => 'form-control',
										))
								}}
								</div>	
							</div>
						</div>
						<!-- /.card-body -->
						
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="<?=url('/backend/supplier')?>" class="btn btn-warning float-right">Cancel</a>
					</div>
					{{ Form::close() }}
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</div>

@endsection

<!-- CSS -->
@section('css')

@endsection

<!-- JAVASCRIPT -->
@section('script')

@endsection
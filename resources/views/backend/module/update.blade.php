<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Modules';
	$breadcrumb[1]['url'] = url('backend/modules');
	$breadcrumb[2]['title'] = 'Add';
	$breadcrumb[2]['url'] = url('backend/modules/create');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Edit';
		$breadcrumb[2]['url'] = url('backend/modules/'.$data[0]->id.'/edit');
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
    Modules - <?=$mode;?>
@endsection

<!-- CONTENT -->
@section('content')
	<?php
		$name = old('name');
		$slug = old('slug');
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/modules";
		if (isset($data)){
			$name = $data[0]->name;
			$slug = $data[0]->slug;
			$active = $data[0]->active;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/modules/".$data[0]->id;
		}
	?>

<div class="content-wrapper">	
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Modules</h1>
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

	<!-- .content-body m -->
    <div class="container-fluid">
        <div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Modules</h3>
					</div>
					{{ Form::open(['url' => $url, 'method' => $method,'class' => 'form-horizontal']) }}
						{!! csrf_field() !!}
					<div class="card-body">
						<div class="row form-group">
							<label class="col-md-4 col-sm-4 col-xs-4">Nama<span class="required">*</span></label>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" id="kode" name="kode" required="required" class="form-control" value="<?=$name;?>">
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-4 col-sm-4 col-xs-4">Slug<span class="required">*</span></label>
							<div class="col-md-4 col-sm-4 col-xs-4">
								<input type="text" id="kode" name="kode" required="required" class="form-control" value="<?=$slug;?>">
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
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="<?=url('/backend/modules')?>" class="btn btn-warning float-right">Cancel</a>
					</div>
					{{ Form::close() }}
				</div>
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
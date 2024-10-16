<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Setting';
	$breadcrumb[1]['url'] = url('backend/setting');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Setting')

<!-- CONTENT -->
@section('content')

<div class="content-wrapper">	
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Setting</h1>
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

    <!-- /.content-header -->
	<div class="container-fluid">
        <div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Setting</h3>
					</div>
                    {{ Form::open(['url' => 'backend/setting', 'method' => 'POST','class' => 'form-horizontal', 'files' => true]) }}
					{!! csrf_field() !!}
						<div class="card-body">
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Nama Website</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" class="form-control" name="1" placeholder="Title" autocomplete="off" value="<?=getData('web_title')?>" />
								</div>
							</div>
                            <div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Deskripsi Website</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" class="form-control" name="4" placeholder="Title" autocomplete="off" value="<?=getData('web_description')?>" />
								</div>
							</div>
                            <div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Logo Website</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
                                    <input type="file" name="logo" class="dropify" data-default-file="<?=url(getData('logo'))?>"/>
                                    <input type="hidden" name="default_logo" value=<?=url(getData('logo'))?>>
								</div>
							</div>
						</div>			
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="<?=url('/backend/dashboard')?>" class="btn btn-warning float-right">Back</a>
						</div>
					{{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

				</div>
			</div>
		</div>
	</div>
@endsection

<!-- CSS -->
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

<!-- JAVASCRIPT -->
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
    <script>
        $('.dropify').dropify();
    </script>
@endsection
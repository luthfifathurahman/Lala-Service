<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Koreksi Stok';
	$breadcrumb[1]['url'] = url('backend/koreksi-stok');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title')
    Koreksi Stok
@endsection

<!-- CONTENT -->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Koreksi Stok</h1>
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
						<h3 class="card-title">Koreksi Stok</h3>
					</div>
                    @include('backend.elements.notification')
					<!-- /.card-header -->
					<!-- form start -->
					{{ Form::open(['method' => 'POST','class' => 'form-horizontal form-label-left']) }}
					{!! csrf_field() !!}
						<div class="card-body">
							<div class="row form-group">
                                <label class="col-md-2 col-sm-2 col-xs-2"></label>
								<label class="col-md-3 col-sm-3 col-xs-2">Kode Barang</label>
								<div class="col-sm-5 col-xs-5">
                                    <div class="row">
                                        <div class="col-sm-8 col-xs-8">
                                            <input type="hidden" name="id_bahan_baku" id="id_bahan_baku" required>
                                            <input readonly type="text" name="nama_bahan_baku" id="nama_bahan_baku" class="form-control" placeholder="Nama Barang" required>
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            <a href="<?=url('backend/koreksi-stok/barang/popup-media/');?>" class="btn btn-success browse-bahan-baku" title="Browse">Browse</a>
                                        </div>
                                    </div>
                                </div>
							</div>
                            <div class="row form-group">
                                <label class="col-md-2 col-sm-2 col-xs-2"></label>
                                <label class="col-md-3 col-sm-3 col-xs-2">Jumlah</label>
                                <div class="col-sm-5 col-xs-8">
                                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" autocomplete="off" value="" required />
                                    <small>Masukkan - jika mengurangi stok. Misal -5 atau 5 jika menambah</small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-md-5 col-sm-5 col-xs-5"></label>
                                <div class="col-sm-1 col-xs-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
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
    <script>
        $('body').on('click', '.browse-bahan-baku', function (e) {
            $.colorbox({
                'width'				: '90%',
                'height'			: '95%',
                'maxWidth'			: '75%',
                'maxHeight'			: '95%',
                'transition'		: 'elastic',
                'scrolling'			: true,
                'href'              : $(this).attr('href')
            });
            e.preventDefault();
        });    
    </script>
@endsection
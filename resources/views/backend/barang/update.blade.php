<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Barang';
	$breadcrumb[1]['url'] = url('backend/barang');
	$breadcrumb[2]['title'] = 'Add';
	$breadcrumb[2]['url'] = url('backend/barang/create');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Edit';
		$breadcrumb[2]['url'] = url('backend/barang/'.$data[0]->id.'/edit');
	}
?>

<?php
	$cover_1 = [];
	if (isset($data)){
		$cover_1 = $data[0];
		$cover_1->field = 'img_id';
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
    Master Barang - <?=$mode;?>
@endsection

<!-- CONTENT -->
@section('content')
    <?php
        $kode = old('kode');
        $nama = old('nama');
        $harga_jual = old('harga_jual');
        $harga_beli = old('harga_beli');
        $stok_awal = old('stok_awal');
        $keterangan = old('keterangan');
        $img_id = old('img_id', 0);
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/barang/";
		if (isset($data)){
            $kode = $data[0]->kode;
            $nama = $data[0]->nama;
            $harga_jual = $data[0]->harga_jual;
            $harga_beli = $data[0]->harga_beli;
            $stok_awal = $data[0]->stok_awal;
            $keterangan = $data[0]->keterangan;
            $active = $data[0]->active;
            $img_id = $data[0]->img_id;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/barang/".$data[0]->id;
		}
	?>
<div class="content-wrapper">	
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Master Barang - <?=$mode;?></h1>
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
						<h3 class="card-title">Master Barang - <?=$mode;?></h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					{{ Form::open(['url' => $url, 'method' => $method]) }}
					{!! csrf_field() !!}
						<div class="card-body">
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Kode Barang <span class="required">*</span></label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="kode" name="kode" required="required" class="form-control" value="<?=$kode;?>" placeholder="Masukkan Kode Barang">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Nama Barang</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="nama" name="nama" required="required" class="form-control" value="<?=$nama;?>" placeholder="Masukkan Nama Barang">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Image</label>
								<div class="col-sm-6 col-xs-9">
									<input type="hidden" name="img_id" value=<?=$img_id;?> id="id-cover-image_1">
									@include('backend.elements.change_cover',array('cover' => $cover_1, 'id_count' => 1))	
								</div>
							</div>
							<div class=" row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Stok Awal</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" name="stok_awal" class="form-control" value="<?=$stok_awal;?>" placeholder="Masukkan Stok Awal">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Harga Beli</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" name="harga_beli" class="form-control" value="<?=$harga_beli;?>" placeholder="Masukkan Harga Beli">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Harga Jual</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" name="harga_jual" class="form-control" value="<?=$harga_jual;?>" placeholder="Masukkan Harga Jual">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Keterangan</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<textarea rows=5 name="keterangan" class="form-control" placeholder="Masukkan Keterangan"> {{ $keterangan }}</textarea>
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
						<a href="<?=url('/backend/barang')?>" class="btn btn-warning float-right">Cancel</a>
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
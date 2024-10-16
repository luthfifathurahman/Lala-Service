<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Purchase Order';
    $breadcrumb[1]['url'] = url('backend/purchase-order');
	if (isset($data)){
		$breadcrumb[2]['title'] = $data[0]->no_inv;
		$breadcrumb[2]['url'] = url('backend/purchase-order/'.$data[0]->id.'/edit');
	}
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Purchase Order')

<!-- CONTENT -->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Purchase Order</h1>
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
						<h2 class="card-title">Penjualan</h2>
					</div>

					@include('backend.elements.notification')
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-9 col-md-8 col-xs-8"></div>
							<div class="col-lg-3 col-md-4 col-xs-4 float-right">
								<a href="<?=url('/backend/purchase-order');?>" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
							</div>
						</div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h4>Purchase Order</h4>
                                No INV : <b><?=$data[0]->no_inv;?></b><br/>
                                Tanggal : <b><?=date('d F Y', strtotime($data[0]->tanggal))?></b><br/>
                                Supplier : <b><?=$data[0]->supplier->nama;?></b><br/>
                                Total : <b>Rp. <?=number_format($data[0]->total, 0, ',','.');?></b><br/>
                                <?php
                                    if ($data[0]->status == "order"){
                                        $text = "Order";
                                        $label = "info";
                                    } else 
                                    if ($data[0]->status == "received"){
                                        $text = "Received";
                                        $label = "success";
                                    }
                                ?>
                                Status : <?="<span class='badge badge-" . $label . "'>". $text . "</span>";?><br/>
                                Keterangan : <?=nl2br($data[0]->keterangan);?><br/>
                                <br/>
                            </div>
                        </div>
                        <br>
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($detail as $detail):
                                ?>
                                    <tr>
                                        <td><?=$detail->barang->nama;?></td>
                                        <td><?=number_format($detail->jumlah,0,',','.');?></td>
                                        <td><?=number_format($detail->harga,0,',','.');?></td>
                                        <td><?=number_format($detail->harga*$detail->jumlah,0,',','.');?></td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
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
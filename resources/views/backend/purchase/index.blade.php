<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Purchase Order';
	$breadcrumb[1]['url'] = url('backend/purchase-order');
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
						<h2 class="card-title">Purchase Order</h2>
					</div>

					@include('backend.elements.notification')
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-xs-4">
								@include('backend.elements.create_button',array('url' => '/backend/purchase-order/create'))
							</div>
							<div class="col-lg-6 col-md-4 col-xs-4"></div>
							<div class="col-lg-3 col-md-4 col-xs-4">
								<a href="<?=url('/backend/dashboard');?>" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
							</div>
						</div>
                        <br>
                        <form id="form-work" class="form-horizontal" role="form" autocomplete="off" method="GET">
                            {!! csrf_field() !!}
                            <br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-1" style="margin-top:7px;">
                                    Status 
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <select name="status" class="form-control">
                                        <?php
                                            $selected = "";
                                            if ($status == "0"){
                                                $selected = "selected";
                                            }
                                        ?>
                                        <option value="0" <?=$selected;?>>All</option>
                                        <?php
                                            $selected = "";
                                            if ($status === "order"){
                                                $selected = "selected";
                                            }
                                        ?>
                                        <option value="order" <?=$selected;?>>Order</option>
                                        <?php
                                            $selected = "";
                                            if ($status === "received"){
                                                $selected = "selected";
                                            }
                                        ?>
                                        <option value="received" <?=$selected;?>>Received</option>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-xs-12 col-sm-1" style="margin-top:7px;">
                                    Tanggal
                                </div>
                                <div class="col-xs-12 col-sm-3 date">
                                    <div class="input-group date" id="myDatepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="startDate" value=<?=$startDate;?>/>
                                        <div class="input-group-append" data-target="#myDatepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 date">
                                    <div class='input-group date' id='myDatepicker2' data-target-input="nearest">
                                        <input type='text' class="form-control datetimepicker-input" name="endDate" value=<?=$endDate;?> />
                                        <div class="input-group-append" data-target="#myDatepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 text-right">
                                    <?php
                                        $checked = "";
                                        if ($mode == "all"){
                                            $checked = "checked";
                                        }
                                    ?>
                                    <div class="checkbox">
                                        <input type="checkbox" name="mode" value="all" id="show-all" <?=$checked;?>>Tampilkan semua
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                        <br>
						<table id="example2" class="table table-bordered table-hover dataTable">
							<thead>
								<tr>
                                    <th>No</th>
                                    <th>INV</th>
                                    <th>Tanggal</th>
                                    <th>Supplier</th>
                                    <th>Total</th>
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
			ajax: "<?=url('backend/purchase-order/datatable?status='.$status.'&startDate='.$startDate.'&endDate='.$endDate.'&mode='.$mode);?>",
			columns: [
				{data: null, name: false, orderable: false, searchable: false,
					render: function (data, type, row, meta){
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
                {data: 'no_inv', name: 'no_inv'},
				{data: 'tanggal', name: 'tanggal'},
                {data: 'nama', name: 'supplier.nama'},
                {data: 'total', name: 'total'},
				{data:  'status', render: function ( data, type, row ) {
					var text = "";
					var label = "";
					if (data == "order"){
						text = "Order";
						label = "info";
					} else 
					if (data == "received"){
						text = "Received";
						label = "success";
					}
					return "<span class='badge badge-" + label + "'>"+ text + "</span>";
                }},				
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			responsive: true
		});

        $('#myDatepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $('#myDatepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
	</script>
@endsection
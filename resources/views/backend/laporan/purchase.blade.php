<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Laporan Purchase Order';
	$breadcrumb[1]['url'] = url('backend/report-purchase');
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
					<h1 class="m-0">Laporan Purchase Order</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))	
					</ol>
				</div> <!-- /.col -->
			</div> <!-- /.row -->
		</div> <!-- /.container-fluid -->
    </div>

    <div class="container-fluid">
        <div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">Laporan Purchase Order</h2>
					</div>

                    @include('backend.elements.notification')
					<!-- /.card-header -->
					<div class="card-body">
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
                                    <th>ID</th>
                                    <th>INV</th>
                                    <th>Tanggal</th>
                                    <th>Supplier</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total = 0;
                                    foreach ($data as $item):
                                ?>
                                    <tr>
                                        <td><?=$item->id;?></td>
                                        <td><b><a href="<?=url('backend/purchase-order/'.$item->id);?>" target=_blank><?=$item->no_inv;?></a></b></td>
                                        <td><?=date('d M Y', strtotime($item->tanggal));?></td>
                                        <td><?=$item->supplier->nama;?></td>
                                        <td><?=number_format($item->total,0,',','.');?></td>
                                        <td>
                                            <?php
                                                if ($item->status == "order"){
                                                    $text = "Order";
                            						$label = "info";
                                                } else 
                                                if ($item->status == "received"){
                                                    $text = "Received";
                                                    $label = "success";
                                                }
                                            ?>
                                            <span class='badge badge-<?=$label;?>'><?=$text;?></span>
                                        </td>
                                    </tr>
                                <?php
                                        $total += $item->total;
                                    endforeach;
                                ?>
                                    <tr>
                                        <td colspan=6 align=right>
                                            <h4>Total : Rp. <?=number_format($total,0,',','.');?></h4>
                                        </td>
                                    </tr>
                            </tbody>
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
        $('#myDatepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $('#myDatepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
	</script>
@endsection
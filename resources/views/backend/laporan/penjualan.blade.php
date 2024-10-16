<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Laporan Penjualan';
	$breadcrumb[1]['url'] = url('backend/report-penjualan');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Penjualan')

<!-- CONTENT -->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Laporan Penjualan</h1>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Laporan Penjualan</h2>
                    </div>
                    @include('backend.elements.notification')
					<!-- /.card-header -->
					<div class="card-body">
                        <form id="form-work" class="form-horizontal" role="form" autocomplete="off" method="GET">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-xs-1 col-sm-1" style="margin-top:7px;">
                                    Tanggal
                                </div>
                                <div class="col-xs-3 col-sm-3 date">
                                    <div class="input-group date" id="myDatepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="startDate" value=<?=$startDate;?>/>
                                        <div class="input-group-append" data-target="#myDatepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 date">
                                    <div class='input-group date' id='myDatepicker2' data-target-input="nearest">
                                        <input type='text' class="form-control datetimepicker-input" name="endDate" value=<?=$endDate;?> />
                                        <div class="input-group-append" data-target="#myDatepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 text-right">
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
                                <div class="col-xs-2 col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                        <br><br>
                        <table id="example2" class="table table-bordered table-hover dataTable">
							<thead>
								<tr>
                                    <th>ID</th>
                                    <th>No Nota</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
								</tr>
							</thead>
                            <tbody>
                                <?php
                                    $total = 0;
                                    foreach ($data as $item):
                                ?>
                                    <tr>
                                        <td><?=$item->id;?></td>
                                        <td><b><a href="<?=url('backend/penjualan/'.$item->id);?>" target=_blank><?=$item->no_nota;?></a></b></td>
                                        <td><?=date('d M Y', strtotime($item->tanggal));?></td>
                                        <td><?=number_format($item->total,0,',','.');?></td>
                                    </tr>
                                <?php
                                        $total += $item->total;
                                    endforeach;
                                ?>
                                    <tr>
                                        <td colspan=4 align=right>
                                            <h4>Total : Rp. <?=number_format($total,0,',','.');?></h4>
                                        </td>
                                    </tr>
                            </tbody>
						</table>
					</div>
				</div>
				<!-- /.card-body -->
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
        $('#myDatepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $('#myDatepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
	</script>
@endsection
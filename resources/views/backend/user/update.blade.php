<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'User';
	$breadcrumb[1]['url'] = url('backend/users-user');	
	$breadcrumb[2]['title'] = 'Add';
	$breadcrumb[2]['url'] = url('backend/users-user/create');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Edit';
		$breadcrumb[2]['url'] = url('backend/users-user/'.$data[0]->id.'/edit');
	}
?>

<?php
	$cover_1 = [];
	if (isset($data)){
		$cover_1 = $data[0];
		$cover_1->field = 'avatar_id';
	}
?>

@if(Session::has('errors'))
<?php 
	$errors = Session::get('errors'); 
?>
@endif

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
    Master User - <?=$mode;?>
@endsection

<!-- CONTENT -->
@section('content')
	<?php
		$firstname = old('firstname');
        $lastname = old('lastname');
        $birthdate = date('d-m-Y');
        $phone = old('phone');
        $address = old('address');
        $gender = old('gender');
		$email = old('email');
		$username = old('username');
		$avatar_id = old('avatar_id', 0);
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/users-user";
		$user_level_id = 0;
		if (isset($data)){
			$firstname = $data[0]->firstname;
            $lastname = $data[0]->lastname;
            $birthdate = date('d-m-Y',strtotime($data[0]->birthdate));
            $phone = $data[0]->phone;
            $address = $data[0]->address;
            $gender = $data[0]->gender;
			$email = $data[0]->email;
			$username = $data[0]->username;
			$avatar_id = $data[0]->avatar_id;
			$active = $data[0]->active;
			$user_level_id = $data[0]->user_level_id;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/users-user/".$data[0]->id;
		}
	?>
	<div class="content-wrapper">	
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Master User - <?=$mode;?></h1>
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
							<h3 class="card-title">Master User - <?=$mode;?></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						{{ Form::open(['url' => $url, 'method' => $method]) }}
						{!! csrf_field() !!}
						<div class="card-body">
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Nama Depan<span class="required">*</span></label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="kode" name="kode" required="required" class="form-control" value="<?=$firstname;?>" placeholder="Masukkan Kode Barang">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Nama Belakang</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="nama" name="nama" required="required" class="form-control" value="<?=$lastname;?>" placeholder="Masukkan Nama Barang">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Image</label>
								<div class="col-sm-6 col-xs-9">
									<input type="hidden" name="avatar_id" value=<?=$avatar_id;?> id="id-cover-image_1">
									@include('backend.elements.change_cover',array('cover' => $cover_1, 'id_count' => 1))		
								</div>
							</div>
							<div class=" row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Username</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" id="username" name="username" required="required" class="form-control" value="<?=$username;?>">
									<span class="error">
										<?php
											if (isset($errors)){
												echo $errors->first('username');
											}
										?>
									</span>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Email</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="email" id="email" name="email" required="required" class="form-control" value="<?=$email;?>">
									<span class="error">
										<?php
											if (isset($errors)){
												echo $errors->first('email');
											}
										?>
									</span>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Password<br/><small>default 123456</small></label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="password" id="password" name="password" class="form-control hide">
									<input type="checkbox" id="password_check" name="password_check" value="1">
									Change Password
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Level User</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									{{
										Form::select(
											'user_level_id',
											$userlevel,
											$user_level_id,
											array(
												'class' => 'form-control',
											))
									}}		
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Tanggal Lahir</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class='input-group date' id='myDatepicker' data-target-input="nearest">
                                        <input type='text' class="form-control datetimepicker-input" name="birthdate" value=<?=$birthdate;?> />
                                        <div class="input-group-append" data-target="#myDatepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text">
												<i class="fa fa-calendar"></i>
											</div>
                                        </div>
									</div>
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Jenis Kelamin</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									{{
										Form::select(
											'gender',
											['male' => 'Male', 'female' => 'Female', 'other' => 'Other'],
											$gender,
											array(
												'class' => 'form-control',
											))
										}}								
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Nomer Hp</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" name="phone" class="form-control" value="<?=$phone;?>">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Alamat</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									<input type="text" name="phone" class="form-control" value="<?=$address;?>">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-md-4 col-sm-4 col-xs-4">Status</label>
								<div class="col-md-4 col-sm-4 col-xs-4">
									{{
										Form::select(
											'active',
											['1' => 'Active', '2' => 'Banned', '3' => 'Non Active'],
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
							<a href="<?=url('/backend/users-user')?>" class="btn btn-warning float-right">Cancel</a>
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
	<script>
		$("#password_check").on("change", function(){
			if($(this).prop('checked') == true){
				$("#password").removeClass("hide");
				$("#password").prop('required',true);
			} else {
				$("#password").addClass("hide");
				$("#password").prop('required',false);
			}
		});
        $('#myDatepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });
	</script>
	
	@include('backend.partials.colorbox')	
	
@endsection
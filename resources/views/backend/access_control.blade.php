<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Access Control';
	$breadcrumb[1]['url'] = url('backend/access-control');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Access Control')

<!-- CONTENT -->
@section('content')
<!-- Your Blade Template -->
<div class="content-wrapper">    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Access Control</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @include('backend.elements.breadcrumb', array('breadcrumb' => $breadcrumb))
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Access Control</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                @include('backend.elements.notification')
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">User Level</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Level</th>
                                                    <th>Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user_level as $data)
                                                    <tr>
                                                        <td>{{ $data->id }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td><button class="btn btn-primary btn-control" data-id="{{ $data->id }}">Edit</button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="card">
                                    @foreach ($user_level as $data)
                                        <div id="module-{{ $data->id }}" class="card-body hide module">
                                            <h3 class="card-title">{{ $data->name }}</h3>
                                            {{ Form::open(['url' => 'backend/access-control', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="user_level" value="{{ $data->id }}">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Modul</th>
                                                            <th align="center">View</th>
                                                            <th align="center">View + Update</th>
                                                            <th align="center">All</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($module as $data_module)
                                                        @php
                                                            $checked_v = "";
                                                            $checked_vu = "";
                                                            $checked_a = "";
                                                            if (!empty($access_control)) {
                                                                if (isset($access_control[$data->id][$data_module->id]) && $access_control[$data->id][$data_module->id] == "v") {
                                                                    $checked_v = "checked";
                                                                } elseif (isset($access_control[$data->id][$data_module->id]) && $access_control[$data->id][$data_module->id] == "vu") {
                                                                    $checked_vu = "checked";
                                                                } elseif (isset($access_control[$data->id][$data_module->id]) && $access_control[$data->id][$data_module->id] == "a") {
                                                                    $checked_a = "checked";
                                                                }
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $data_module->name }}</td>
                                                            <td>
                                                                <input required="required" type="radio" name="access_{{ $data_module->id }}" value="v" {{ $checked_v }}>
                                                            </td>
                                                            <td>
                                                                <input required="required" type="radio" name="access_{{ $data_module->id }}" value="vu" {{ $checked_vu }}>
                                                            </td>
                                                            <td>
                                                                <input required="required" type="radio" name="access_{{ $data_module->id }}" value="a" {{ $checked_a }}>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                <div class="form-group row">
                                                    <div class="col-sm-5 offset-sm-6 text-right col-xs-12">
                                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                                        <br />
                                                    </div>
                                                </div>
                                            {{ Form::close() }}
                                        </div>
                                    @endforeach
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

@endsection

<!-- JAVASCRIPT -->
@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function () {
		$('.module').addClass('d-none'); // Hide all modules initially
		$('.btn-control').on('click', function (e) {
			e.preventDefault();
			var id = $(this).data('id');
			console.log('Clicked ID:', id);  // Add this line for debugging
			$('.module').addClass('d-none'); // AdminLTE uses 'd-none' for hiding elements
			$('#module-' + id).removeClass('d-none');
		});
	});
</script>
@endsection
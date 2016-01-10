@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>LFF BJJ Competition II</h1> 
	</div>
</div>

<div style="margin-top: 50px;"></div>

<?php
use App\Models\User;   
$user = new User();
$num_users = count($user->all());

$last_id = DB::table('users')->max('id');
$last_user = User::find($last_id);

?>


<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-thumbs-o-up fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<h4>Congratulations to everyone! See you next year!</h4>
					</div>
					{{-- <div class="col-xs-9 text-right">
						<h4>{{(int)$num_users}}</h4>
						<h4>Registered already!</h4>
					</div> --}}
				</div>
			</div>
			<a href="#"></a>
			<div class="panel-footer">
				{{-- <span class="pull-left"></span><a href="/register">Register now</a>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div> --}}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-sun-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<h4>10th of May</h4>
						<h5>Its a Sunday. Bring the family</h5>
					</div>
				</div>
			</div>
			<a href="#"></a>
			<div class="panel-footer">
				<span class="pull-left"></span><a href="/calendarDownload">Set your diary</a>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
	
<br><br>

<div class="row">

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Everybody gets a T-shirt!</h4>
				<p>You get a free t-shirt for your participation in the event.</p>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Kids welcome!</h4>
				<p>We'll have a Bouncing Castle for the Kids and a nice lady to paint their faces.</p>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Brackets</h4>
				<p>The brackets will be done manually by Luiz so dont worry about who you are fighting until the day.</p>
			</div>
		</div>
	</div>
</div>

<br><br>

<div class="row">	
	{{-- <div class="col-lg-3 col-md-offset-1 well">
		<h4>Info</h4>
		<p>Registrations are now closed. See you all on Sunday. Good luck!</p>
	</div> --}}
	<div class="col-lg-12 well">
		<h4>Info</h4>
		<p>We've added a t-shirt size option in the registration so we can get enough of those sizes.</p>
		<p>For those who registered already, we selected a size for you, so please email <a href="mailto:rodrigo@rodderscode.co.uk?subject=T-shirt%20size">Trepeiro</a> if you think its not the right size</p>
	</div>
</div>          


		
@stop
	

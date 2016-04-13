@extends('layouts/main')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1><?=App\Helper::eventData("alterTitle");?></h1> 
	</div>
</div>

<div class="notices">
	<?php if (!empty($data['errors'])): ?>
			<div class="alert alert-danger">
			<?php
				foreach ($data['errors']['messages']->getMessages() as $message) {
					echo $message[0].'<br>';
				}
			?>
			</div>
	<?php endif; ?>
	<?php if (!empty($data['success'])): ?>
			<div class="alert alert-success">
			<?php
				foreach ($data['success']['messages']->getMessages() as $message) {
					echo $message[0].'<br>';
				}
			?>
			</div>
	<?php endif; ?>
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
						<h4>Welcome to the third edition of the London Fight Factory BJJ Cup</h4>
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
						<h4><?=App\Helper::eventData("startDate")->format("l jS F Y");?></h4>
						<h5>Its a Sunday! Bring the family</h5>
					</div>
				</div>
			</div>
			<a href="#"></a>
			<div class="panel-footer">
			</div>
		</div>
	</div>
</div>
	
<br><br>

<div class="row">

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Only the first few get a T-shirt!</h4>
				<p>Hurry up and register and grab your free T-shirt!</p>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Registration</h4>
				<p>Registration will be £20 until <?=App\Helper::eventData("promoUntil")->format("l jS F")?></p>
				<p>After that the price will be £25.</p>
				<p>Registrations close on <?=App\Helper::eventData("registerCutoff")->format("l jS F Y")?></p>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Brackets</h4>
				<p>The brackets will be done manually by Luiz so you will only know who you are fighting on the day.</p>
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
		<p>At this point we have {{(int)$num_users}} fighters ready to roll! Please check and send us an email if you can't see your name on the broken down list.</p>
	</div>
</div>          


		
@stop
	

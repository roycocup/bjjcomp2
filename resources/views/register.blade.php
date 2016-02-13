@extends('layouts/main')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1><?=App\Helper::eventData("title")?></h1>	
	</div>
</div>


<div class="notices">
	<?php if ( !empty($messages) && ($messages->any()) ): ?>
			<div class="alert alert-danger">
			<?php
				foreach ($messages->all() as $message) {
					echo $message.'<br>';
				}
			?>
			</div>
	<?php endif; ?>
</div>	

<?php 
	$now = new DateTime();
	if( $now >= App\Helper::eventData("registerCutoff") ):
?>

<div class="form-group col-md-12">
	<h2>Registrations are now closed...</h2>
</div>
	
<?php else: ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">	
				<h2 class="text-center">Registration</h2>	
			</div>	
		</div>	
	</div>
</div>


<form action="/register" method="post" role="form">

	<div class="form-group col-md-6">
		<label for="email">Email address</label>
		<input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
		<p class="help-block"></p>
		<label for="first_name">First Name</label>
		<input type="text" name="f_name" class="form-control" id="first_name" placeholder="First Name" required>
		<p class="help-block"></p>
		<label for="last_name">Last Name</label>
		<input type="text" name="l_name" class="form-control" id="last_name" placeholder="Last Name" required>
		<p class="help-block"></p>
		<label for="last_name">Nick Name (Whatever Luiz calls you)</label>
		<input type="text" name="nickname" class="form-control" id="nick_name" placeholder="Nickname" required>
		<p class="help-block"></p>
		<label for="t-shirt_size">T-Shirt Size</label>
		<select class="form-control" name='t_shirt_size'>
			<option value="xs">X-Small</option>
			<option value="s">Small</option>
			<option value="m">Medium</option>
			<option value="l">Large</option>
			<option value="xl">X-Large</option>
			<option value="hu">Huge</option>
		</select>
		<p class="help-block"></p>
	</div>

	<div class="form-group col-md-6">
		<label for="dob">Date of Birth</label>
		<input type="text" name="dob" class="form-control" id="dob" placeholder="dd/mm/YYYY" required>
		<p class="help-block"></p>
		<label for="belt">Belt Colour</label>
		<select class="form-control" name='belt'>
			<option value="white">White</option>
			<option value="blue">Blue</option>
			<option value="purple">Purple</option>
			<option value="brown">Brown</option>
			<option value="black">Black</option>
		</select>
		<p class="help-block"></p>
		<label for="gender">Gender</label>
		<select class="form-control" name='gender' id="gender" required>
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		<p class="help-block"></p>
		<div class="men-weights">
			<label for="belt">Weight Category (Men)</label>
			<select class="form-control" name="men-weight">
				<option value="rooster">Rooster (<57.5Kg)</option>
				<option value="s_feather">Super Feather (<64Kg)</option>
				<option value="feather">Feather (<70Kg)</option>
				<option value="light">Light (<76Kg)</option>
				<option value="middle">Middle (<82.3Kg)</option>
				<option value="m_heavy">Medium Heavy (<88.3Kg)</option>
				<option value="heavy">Heavy (<94.3Kg)</option>
				<option value="s_heavy">Super Heavy (<100.5Kg)</option>
				<option value="u_heavy">Ultra Heavy (>100.5Kg)</option>
			</select>
		</div>
		<div class="women-weights">
			<label for="belt">Weight Category (Women)</label>
			<select class="form-control" name='women-weight'>
				<option value="s_feather">Super Feather (<53.5Kg)</option>
				<option value="feather">Feather (<58.5Kg)</option>
				<option value="light">Light (<64Kg)</option>
				<option value="middle">Middle (<69Kg)</option>
				<option value="m_heavy">Medium Heavy (<74Kg)</option>
				<option value="heavy">Heavy (>74Kg)</option>
			</select>
		</div>
		<p class="help-block"></p>
	</div>
	
	<div class="form-group row">		
	</div>	

	<div class="form-group row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-lg btn-primary pull-right">Go to Payment</button>	
		</div>	
	</div>

</form>

<script>
	$(document).ready(function(){
		$('#dob').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange:'-50:-3',
			dateFormat:'dd/mm/yy',
		});

		$('.women-weights').hide();
		$('#gender').on('change', function(){
			if($('#gender').val() == 'male'){
				$('.men-weights').show();
				$('.women-weights').hide();
			} else {
				$('.women-weights').show();
				$('.men-weights').hide();
			}
		});

	});
</script>

<?php endif; ?>

@stop

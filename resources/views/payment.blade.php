@extends('layouts/main')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1><?=App\Helper::eventData("title")?></h1>	
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


<div class="row">
	<div class="col-md-offset-2 col-md-8">
		<h2>Confirm your registration</h2>
		<p>Make your payment via paypal. If you need to edit anything, just hit the back button on your browser.</p>

		<div class="row well">
			<ul>
			<?php foreach ($userData as $key => $value): ?>
				<?php if ($userData['gender'] == 'male' && $key == "women-weight") continue;?>
				<?php if ($userData['gender'] == 'female' && $key == "men-weight") continue;?>
				<li><?=App\Helper::mapRegistrationFieldNames($key)?>: <?=$value?></li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 pull-right">
		<button id="registerConfirm" class="btn btn-primary">Confirm!</button>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<form id="checkout" method="post" action="<?=env("URL")?>/paymentconfirm">
					<h4>Select payment format</h4>
					<div id="payment-form"></div>
					<input class="btn btn-primary" type="submit" value="Make Payment">
				</form>
			</div>
		</div>
	</div>
</div>

<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
<script>
	braintree.setup("<?=$userToken?>", "dropin", {
		container: "payment-form"
	});

	$("#registerConfirm").click(function(event) {
		// TODO: confirm registration here form submition and come back to show modal
		$("#myModal").modal();
	});

</script>

@stop

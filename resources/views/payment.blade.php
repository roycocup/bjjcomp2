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

			<button id="goodToGo" class="btn btn-primary" >Looks good!</button>

			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input name="notify_url" value="http://v2.lffcup.co.uk/notify?user_id=13" type="hidden">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="2L4H4L2GFT2XA">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>

		</div>
	</div>


{{-- hold it

<?php if (env("DEBUG") === false ): ?>

	<h1>PRODUCTION!!!</h1>
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<h2>Confirm your registration</h2>
			<p>Make your payment via paypal. If you need to edit anything, just hit the back button on your browser.</p>

			<div class="row well">
				<ul>
				<?php foreach ($userData as $key => $value): ?>
					<li><?=$key?>: <?=$value?></li>
				<?php endforeach; ?>
				</ul>
			</div>

			<?php if ( new DateTime() < App\Helper::eventData("promoUntil")  ): ?>
		
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<p>Promotional price for registration previous <?=App\Helper::eventData("startDate")->format("l jS F Y");?> of £20</p>
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="CZG6KM37748C4">
				<input name="notify_url" value="http://v2.lffcup.com/notify_url.php?user_id=13" type="hidden">
				<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
			</form>

			<?php else : ?>
		
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="PN5DMW5FL5YCG">
				<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
			</form>

			<?php endif; ?>

		</div>
	</div>

<?php elseif (env("DEBUG")): ?>
	<h1>Debug Mode</h1>
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<h2>Confirm your registration</h2>
			<p>Make your payment via paypal or via bitcoin.</p>

			<div class="row well">
				<ul>
				<?php foreach ($userData as $key => $value): ?>
					<li><?=$key?>: <?=$value?></li>
				<?php endforeach; ?>
				</ul>
			</div>

			<?php if ( new DateTime() < App\Helper::eventData("promoUntil")  ): ?>
			
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="2L4H4L2GFT2XA">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>

			<?php else : ?>
		
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="D4T5UBNGQQFRG">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>

			<?php endif; ?>

		</div>
	</div>

<?php endif; ?>

end of hold --}}

@stop

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
			
			{{-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="cbt" value="Go back to LFF Cup Site">
				<input type="hidden" name="callback_url" value="http://v2.lffcup.co.uk/notify?id=thisiscallback">
				<input type="hidden" name="return" value="<?=env("URL")?>/thankyou?token=<?=$userToken?>">
				<input type="hidden" name="hosted_button_id" value="2L4H4L2GFT2XA">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form> --}}

			{{-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cbt" value="Go back to LFF Cup Site">
				<input type="hidden" name="callback_url" value="<?=env("URL")?>/notify?id=thisiscallback">
				<input type="hidden" name="return" value="<?=env("URL")?>/paymentconfirm?token=<?=$userToken?>">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="NFYDDYRGSJ6RQ">
				<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form> --}}

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

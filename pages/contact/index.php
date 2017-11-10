<?PHP $page_title = "Contact Me"; ?>
<?PHP include("../../_layout/head.php"); ?>
<?PHP include("../../_layout/head1.php"); ?>
<?PHP include("../../_layout/nav1.php"); ?>
<?PHP include("../../_layout/nav2.php"); ?>
<?PHP include("../../_layout/nav3.php"); ?>
<!-- .row -->
<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<h3 class="page-header"><?php _e('main.contact') ?></h3>
			<?php if (Auth::guest()): ?>
				<div class="alert alert-danger"><?php _e('main.logged_only') ?></div>
			<?php else: ?>
				<p class="help-block"><?php _e('main.webmaster_contact_help') ?></p>
				<br>
				<form action="webmasterContact" class="ajax-form">
					<div class="form-group">
						<label for="message"><?php _e('main.message') ?></label>
					   	<textarea class="form-control" name="message" id="message"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary"><?php _e('main.send_message') ?></button>
					</div>
				</form>
			<?php endif ?>
		</div>
	</div>
</div>
<!-- .row -->
<?PHP include("../../_layout/foot.php"); ?>
<?PHP include("../../_layout/foot1.php"); ?>
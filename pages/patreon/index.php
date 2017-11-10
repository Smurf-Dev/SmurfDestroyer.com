<?PHP $page_title = "Patreon"; ?>
<?PHP include("../../_layout/head.php"); ?>
<?PHP include("../../_layout/head1.php"); ?>
<?PHP include("../../_layout/nav1.php"); ?>
<?PHP include("../../_layout/nav2.php"); ?>
<?PHP include("../../_layout/nav3.php"); ?>
<?PHP
if (Auth::check()):
$role_id = Auth::user()->role_id;
$patreonacc = Auth::user()->role_id;
endif
?>
<div class="row">
	<?php if (Auth::guest()): ?>
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4 class="box-title">Warning!</h4>
				<p style="font-size: 16px;">If you are already contributing to my patreon, login in using the button at the top right of this page to see the paid content. THANKS HOMIE.</p>
			</div>
		</div>
    <?php endif ?>
    
    <?php if ( (Auth::check()) && (Auth::check()) ): ?>
		<div class="col-md-12">
			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4 class="box-title">Warning!</h4>
				<p style="font-size: 16px;">If you are already contributing to my patreon, <a href="/members/settings.php?p=connect">click here</a> to connect your Patreon account to your SmurfDestroyer.com account to access the Patreon only content. THANKS HOMIE.</p>
			</div>
		</div>
    <?php endif ?>
    
    <?php if ( (Auth::guest()) || (Auth::check()) ): ?>
	<div class="col-md-12">
		<div class="white-box">
			<div class="box-header with-border">
		  		<h3 class="box-title">Patreon Only Content:</h3>
			</div>
			<div class="box-body">
				<p class="lead">This page is reserved for patreon only content. Can't make free shit fo'ever.</p>
			</div>
	  	</div>
	</div>
	<?php endif ?>
	
	<?php if ((Auth::check()) && ($role_id == 1)): ?>
	<div class="col-md-12">
		<div class="white-box">
			<div class="box-header with-border">
		  		<h3 class="box-title">Patreon Content (Viewing as Admin):</h3>
			</div>
			<div class="box-body">
				<p class="lead">Thanks for being a Patreon homie.</p>
			</div>
	  	</div>
	</div>
	<?php endif ?>
	
	<?PHP if ((Auth::check()) && (isset($patron['attributes']))){ ?>
	<div class="col-md-12">
		<div class="white-box">
			<div class="box-header with-border">
		  		<h3 class="box-title">Patreon Response:</h3>
			</div>
			<div class="box-body">
				<p class="lead">
					<?PHP echo $patron['attributes']['image_url'];?> <br> <?PHP echo $patron['id'];?>
				</p>
			</div>
		</div>
	</div><?PHP } else {} ?>
</div>
<?PHP include("../../_layout/foot.php"); ?>
<?PHP include("../../_layout/foot1.php"); ?>
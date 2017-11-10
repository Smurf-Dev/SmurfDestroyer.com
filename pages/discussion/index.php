<?PHP $page_title = "Discussion"; ?>
<?PHP include("../../_layout/head.php"); ?>
<?PHP include("../../_layout/head1.php"); ?>
<?PHP include("../../_layout/nav1.php"); ?>
<?PHP include("../../_layout/nav2.php"); ?>
<?PHP include("../../_layout/nav3.php"); ?>
<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<h3 class="page-header">Discussion</h3>
			<p>Still in development.</p>
			<?php echo ajax_comments('1', 'Discussion'); ?>
		</div>
	</div>
</div>

<?PHP include("../../_layout/foot.php"); ?>
<?PHP include("../../_layout/foot1.php"); ?>
<?PHP $page_title = "FAQs"; ?>
<?PHP include("../../_layout/head.php"); ?>
<?PHP include("../../_layout/head1.php"); ?>
<?PHP include("../../_layout/nav1.php"); ?>
<?PHP include("../../_layout/nav2.php"); ?>
<?PHP include("../../_layout/nav3.php"); ?>
<!-- /.row -->
<div class="row">
	<div class="col-md-8 col-md-offset-2" align="center">
		<div class="white-box"><h4 class="box-title"><?PHP echo $page_title; ?></h4></div>
		<div class="panel-group" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a class="collapsed font-bold" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Question 1?</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						Answer 1.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed font-bold" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Question 2?</a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						Answer 2.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="font-bold collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Question 3?</a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						Answer 3.
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
					<a class="collapsed font-bold panel-title" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Question 4?</a>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
					<div class="panel-body">
						Answer 4.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .row -->
<?PHP include("../../_layout/foot.php"); ?>
<?PHP include("../../_layout/foot1.php"); ?>
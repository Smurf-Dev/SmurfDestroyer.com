<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<!-- .page title -->
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title"><?PHP echo $page_title; ?></h4>
			</div>
			<!-- /.page title -->
			<!-- .breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<a href="/pages/patreon/" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Paid Content</a>
				<ol class="breadcrumb">
					<li><a href="/">SmurfDestroyer</a></li>
					<?PHP if ($page_title=="Home") { } else { echo ('<li><a>Pages</a></li>'); } ?>
					<li class="active"><?PHP echo $page_title; ?></li>
                </ol>
			</div>
			<!-- /.breadcrumb -->
		</div>
		<!-- .row -->
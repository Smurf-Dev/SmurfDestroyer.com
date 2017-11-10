<!-- Top Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
	<div class="navbar-header">
		<div class="top-left-part">
			<!-- Logo -->
			<a class="logo" href="/">
				<!-- Logo icon image, you can use font-icon also -->
				<b>
					<!--This is dark logo icon--><img src="/bootstrap/dist/img/favicon/favicon-32x32.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="/bootstrap/dist/img/favicon/favicon-32x32.png" alt="home" class="light-logo" />
			 	</b>
				<!-- Logo text image you can use text also --><span class="hidden-xs">
				<!--This is dark logo text--><img src="/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="/bootstrap/dist/img/text-140x25.png" alt="home" class="light-logo" />
			 </span> </a>
		</div>
		<!-- /Logo -->
		<!-- Search input and Toggle icon -->
		<ul class="nav navbar-top-links navbar-left">
			<li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
			<!--li class="dropdown">
				<a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-gmail"></i>
					<div class="notify"><span class="heartbit"></span><span class="point"></span></div>
				</a>
				<ul class="dropdown-menu mailbox animated bounceInDown">
					<li>
						<div class="drop-title">You have 4 new messages</div>
					</li>
					<li>
						<div class="message-center">
							<a href="#">
								<div class="user-img"> <img src="<?PHP //echo $dir; ?>plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
								<div class="mail-contnet">
									<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
							</a>
						</div>
					</li>
					<li>
						<a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
					</li>
				</ul>
				<!-- /.dropdown-messages 
			</li>-->
			<!-- .Task dropdown -->
			<!--li class="dropdown">
				<a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-check-circle"></i>
					<div class="notify"><span class="heartbit"></span><span class="point"></span></div>
				</a>
				<ul class="dropdown-menu dropdown-tasks animated slideInUp">
					<li>
						<a href="javascript:void(0)">
							<div>
								<p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
								<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
								</div>
							</div>
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
					</li>
				</ul>
			</li>
			<!-- .Megamenu --
			<li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Mega</span> <i class="icon-options-vertical"></i></a>
				<ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Header Title</li>
							<li><a href="javascript:void(0)">Link of page</a> </li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Header Title</li>
							<li><a href="javascript:void(0)">Link of page</a> </li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Header Title</li>
							<li><a href="javascript:void(0)">Link of page</a> </li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Header Title</li>
							<li> <a href="javascript:void(0)">Link of page</a> </li>
						</ul>
					</li>
				</ul>
			</li>
			<!-- /.Megamenu -->
		</ul>
		<!-- This is the message dropdown -->
		<ul class="nav navbar-top-links navbar-right pull-right">
			<!-- /.Task dropdown -->
			<!-- /.dropdown -->
			<?php if (Auth::check()): ?>
				<?php if (Auth::userCan('dashboard')): ?>
					<li>
						<a href="/pages/life/" class="nav-btn" data-toggle="tooltip" data-placement="bottom" title="Life">
							Life
						</a>
					</li>
					<li>
						<a href="/members/admin.php" class="nav-btn" data-toggle="tooltip" data-placement="bottom" title="<?php _e('main.admin_dashboard'); ?>">
							<span class="glyphicon glyphicon-cog"></span>
						</a>
					</li>
				<?php endif ?>
				<li class="dropdown" style="padding-right: 25px;">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo Auth::user()->avatar ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo Auth::user()->display_name ?></b><span class="caret"></span></a>
					<ul class="dropdown-menu dropdown-user animated flipInY">
						<li>
							<div class="dw-user-box">
								<div class="u-img"><img src="<?php echo Auth::user()->avatar ?>" alt="user" /></div>
								<div class="u-text"><h4><?php echo Auth::user()->display_name ?></h4>
									<p class="text-muted">fat@doinks.com</p>
									<a target="_blank" href="profile.php?u=<?php echo Auth::user()->id ?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
								</div>
							</div>
						</li>
						<li role="separator" class="divider"></li>
						<li><a href="/members/profile.php?u=<?php echo Auth::user()->id ?>"><i class="ti-user"></i> My Profile</a></li>
						<li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
						<li><a href="#"><i class="ti-email"></i> Inbox</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="/members/settings.php"><i class="ti-settings"></i> Account Settings</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="/members/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			<?php else: ?>
				<li>
					<a class="dropdown-toggle profile-pic" href="/members/signup.php"><b class="hidden-xs">Sign Up</b></a>
				</li>
				<li style="padding-right: 25px;">
					<a class="dropdown-toggle profile-pic" href="/members/login.php"><b class="hidden-xs">Login</b></a>
				</li>
			<?PHP endif ?>
		</ul>
	</div>
	<!-- /.navbar-header -->
	<!-- /.navbar-top-links -->
	<!-- /.navbar-static-side -->
</nav>
<!-- End Top Navigation -->
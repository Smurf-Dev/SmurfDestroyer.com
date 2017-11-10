<<<<<<< HEAD
<?PHP $page_title = "Life"; ?>
<?PHP include("../../_layout/head.php"); ?>
<?PHP include("../../_layout/head1.php"); ?>
<?PHP include("../../_layout/nav1.php"); ?>
<?PHP include("../../_layout/nav2.php"); ?>
<?PHP include("../../_layout/nav3.php"); ?>

<?PHP
if (Auth::userCan('dashboard')) {
	$allow = 1;
}

if (!Auth::userCan('dashboard')) {
	redirect_to(App::url());
}

function getFeed($feed_url) {
	global $d1day, $d1humidity, $d1wind;
	
	$i = 1;
	$content = file_get_contents($feed_url);
	$x = new SimpleXmlElement($content);
	
	echo '<ul class="list-unstyled city-weather-days">';
	
	foreach($x->channel->item as $entry) {		
		$all = $entry->title[0];
		$allexploded = explode(' ', $all);
		
		$daywithsc = $allexploded[0];
		$day = substr(trim($daywithsc), 0, -1);
		
		echo '<li class="col-xs-8 col-sm-4';
		
		if ($i == 1) { $d1day = $day; echo ' active" style="border-left: 0px;"'; } else { echo '" style="border-right: 0px;"'; }
		
		echo '">';
		echo '<span>';
		echo $day;
		echo '</span>';
		
		if (strpos($all1, 'Partly Cloudy') !== false) {
			$icon = 'cloud';
		} elseif (strpos($all1, 'Light Cloud') !== false) {
			$icon = 'cloud';
		} elseif (strpos($all1, 'Sunny Intervals') !== false) {
			$icon = 'day-cloudy';
		} elseif (strpos($all1, 'Sunny') !== false) {
			$icon = 'day-sunny';
		} else {
			$icon = 'cloud';
		}
		
		echo '<i class="wi wi-';
		
		if (empty($icon) == false) { echo $icon; } else { echo "cloud"; }
		
		echo '"></i>';
		echo '<span>';
		
		if (preg_match('#\bMinimum Temperature: (\d+)#', $all, $minmatches)) {
			$mintemp = $minmatches[0];
		}
		
		echo $mintemp;
		
		if (preg_match('#\bMaximum Temperature: (\d+)#', $all, $maxmatches)) {
			echo "<sup>°C</sup>";

			$maxtemp = $maxmatches[0];

			echo "<br />";
			echo $maxtemp;
		}
		
		echo '<sup>°C</sup></span>';
		
		if (($i == 1) && (!preg_match('#\bMaximum Temperature: (\d+)#', $all, $maxmatches))) {
			echo "<br />";
		}
		
		echo '</li>';
		
		if (strpos($all, 'Partly Cloudy') !== false) {
			$desc = 'Partly Cloudy';
		} elseif (strpos($all, 'Light Cloudy') !== false) {
			$desc = 'Light Cloudy';
		} else {
			$desc = 'Undefined';
		}
		
		if ($i == 1):
			$d1temp = $mintemp;
			$d1desc = $desc;
		endif;
		
		$i = $i + 1;
	}
	echo "</ul>";
}

function updateVars($feed_url1) {
	$content1 = file_get_contents($feed_url1);
	$x1 = new SimpleXmlElement($content1);
	
	$entry1 = $x1->channel->item;

	$all1 = $entry1->title[0];
	$allexploded1 = explode(' ', $all1);

	$daywithsc1 = $allexploded1[0];
	$day1 = substr(trim($daywithsc1), 0, -1);

	if (preg_match('#\bMinimum Temperature: (\d+)#', $all1, $minmatches1)) {
		$mintemp1 = $minmatches1[0];
		$mintemp2 = str_replace('Minimum Temperature: ', '', $mintemp1);
	}

	if (strpos($all1, 'Partly Cloudy') !== false) {
		$icon = 'cloud';
	} elseif (strpos($all1, 'Light Cloud') !== false) {
		$icon = 'cloud';
	} elseif (strpos($all1, 'Sunny Intervals') !== false) {
		$icon = 'day-cloudy';
	} elseif (strpos($all1, 'Sunny') !== false) {
		$icon = 'day-sunny';
	} else {
		$icon = 'cloud';
	}
	
	if (preg_match('#\bHumidity: (\d+)#', $all1, $humiditymatches)) {
		$humidity1 = $humiditymatches[0];
		$humidity = str_replace('Humidity: ', '', $vhumidity1);
	}
	
	if (preg_match('#\bWind Speed: (\d+)#', $all1, $windspeedmatches)) {
		$windspeed1 = $windspeedmatches[0];
		$windspeed = str_replace('Wind Speed: ', '', $vwindspeed1);
	}
	
	echo '<span class="di vm"><i class="wi wi-'.$icon.' text-info"></i></span>';
	echo '<div class="di vm"><h1 class="m-b-0 text-info">';
	echo $mintemp2;
	echo '<sup>o</sup>C</h1><h5 class="m-t-0">';
	echo "</h5></div>";
}

function windandhumidity($feed_url2) {
	
	$content2 = file_get_contents($feed_url2);
	$x2 = new SimpleXmlElement($content2);
	
	echo '<li align="center"><i class="wi wi-day-sunny m-r-5"></i>';
	
	$entry2 = $x2->channel->item;

	$all2 = $entry2->title[0];
	$all3 = $entry2->description[0];
	$allexploded2 = explode(' ', $all2);
	
	if (preg_match('#\bHumidity: (\d+)#', $all3, $humiditymatches)) {
		$humidity1 = $humiditymatches[0];
		$humidity = str_replace('Humidity: ', '', $humidity1);
		echo "Humidity: ";
		echo $humidity;
		echo "%";
	}
	
	echo "</li>";
	echo '<li align="center""><i class="wi wi-day-windy m-r-5"></i>';
	
	if (preg_match('#\bWind Speed: (\d+)#', $all3, $windspeedmatches)) {
		$windspeed1 = $windspeedmatches[0];
		$windspeed = str_replace('Wind Speed: ', '', $windspeed1);
		echo "Wind Speed: ";
		echo $windspeed;
		echo " Mph";
	}
	echo "</li>";
}

function getFeed1($feed_url) {
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
	
    foreach($x->channel->item as $entry) {
		
		echo "<div class='col-md-4 col-lg-4 col-xs-12 white-box' align='center'>";

		$day111 = explode(' ',trim($entry->title));
		$description = str_replace(',','<br />',$entry->description);

		echo "<a target='_blank' href='$entry->link' title='$day111[0]'>" . "<h3>" . $day111[0] . "</h3>" . "<br />" . $description . "</a>";
		
		if (!preg_match('#\bMaximum Temperature: (\d+)#', $description, $maxmatches1111)) {
			echo "<br />";
		}
		echo "</div>";
    }
}

if ($allow == 1):
?>

<div class="row">
	<div class="col-md-12 col-lg-12 col-xs-12">
		<div class="white-box">
			<ul style="align-content: center;" class="nav customtab2 nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#home6" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
						<span class="visible-xs"><i class="ti-home"></i></span>
						<span class="hidden-xs">News</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#profile6" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="ti-user"></i></span>
						<span class="hidden-xs">Weather</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#messages6" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="ti-email"></i></span>
						<span class="hidden-xs">Statistics</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#settings6" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="ti-settings"></i></span>
						<span class="hidden-xs">Social Media</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active fade in" id="home6">
				<div class="white-box"><h2 align="center">News:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="box-body">
						<p class="lead">
							...
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="profile6">
				<div class="col-md-12 col-lg-12 white-box"><h2 align="center">Weather Report:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="white-box bg-extralight m-b-0">
						<div class="city-weather-widget">
							<h1>Cambridge, UK</h1>
							<h4><?PHP echo date("l"); ?>, <?PHP echo date("d M Y"); ?> (Last Updated: <?PHP echo date("H:i"); ?>)</h4>
							<div class="row p-t-30">
								<div class="col-sm-6">
									<ul class="side-icon-text">
										<li>
											<?PHP updateVars("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
										</li>
									</ul>
								</div>
								<div class="col-sm-6">
									<ul class="list-icons pull-right">
										<?PHP windandhumidity("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
									</ul>
								</div>
								<div class="col-md-12">
									<div id="ct-city-wth" style="height:50px"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel">
						<div class="row">
							<ul class="list-unstyled city-weather-days">
								<?php getFeed("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12 white-box"><h2 align="center">Detailed Weather Report:</h2></div>
				<?php getFeed1("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
				<div class="clearfix"></div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="messages6">
				<div class="white-box"><h2 align="center">Statistics:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="box-body">
						<p class="lead">
							...
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="settings6">
				<div class="white-box"><h2 align="center">Social Media:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="box-body">
						<p class="lead">
							...
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<script language="javascript">
$(function() {
    $('#mainContent div:not(:first)').hide();
 
    $('ul li a').click(function() {
        $('ul#nav li a').removeClass('selected');
        $(this).addClass('selected');
		
        var href = $(this).attr('href');
        var split = href.split('#');
		
        $('#mainContent div').hide();
        $('#mainContent div#' + split[1]).fadeIn();
		
        return false;
    });
});
</script>
<?PHP endif ?>
<?PHP include("../../_layout/foot.php"); ?>
=======
<?PHP $page_title = "Life"; ?>
<?PHP include("../../_layout/head.php"); ?>
<?PHP include("../../_layout/head1.php"); ?>
<?PHP include("../../_layout/nav1.php"); ?>
<?PHP include("../../_layout/nav2.php"); ?>
<?PHP include("../../_layout/nav3.php"); ?>

<?PHP
if (Auth::userCan('dashboard')) {
	$allow = 1;
}

if (!Auth::userCan('dashboard')) {
	redirect_to(App::url());
}

function getFeed($feed_url) {
	global $d1day, $d1humidity, $d1wind;
	
	$i = 1;
	$content = file_get_contents($feed_url);
	$x = new SimpleXmlElement($content);
	
	echo '<ul class="list-unstyled city-weather-days">';
	
	foreach($x->channel->item as $entry) {		
		$all = $entry->title[0];
		$allexploded = explode(' ', $all);
		
		$daywithsc = $allexploded[0];
		$day = substr(trim($daywithsc), 0, -1);
		
		echo '<li class="col-xs-8 col-sm-4';
		
		if ($i == 1) { $d1day = $day; echo ' active" style="border-left: 0px;"'; } else { echo '" style="border-right: 0px;"'; }
		
		echo '">';
		echo '<span>';
		echo $day;
		echo '</span>';
		
		if (strpos($all1, 'Partly Cloudy') !== false) {
			$icon = 'cloud';
		} elseif (strpos($all1, 'Light Cloud') !== false) {
			$icon = 'cloud';
		} elseif (strpos($all1, 'Sunny Intervals') !== false) {
			$icon = 'day-cloudy';
		} elseif (strpos($all1, 'Sunny') !== false) {
			$icon = 'day-sunny';
		} else {
			$icon = 'cloud';
		}
		
		echo '<i class="wi wi-';
		
		if (empty($icon) == false) { echo $icon; } else { echo "cloud"; }
		
		echo '"></i>';
		echo '<span>';
		
		if (preg_match('#\bMinimum Temperature: (\d+)#', $all, $minmatches)) {
			$mintemp = $minmatches[0];
		}
		
		echo $mintemp;
		
		if (preg_match('#\bMaximum Temperature: (\d+)#', $all, $maxmatches)) {
			echo "<sup>°C</sup>";

			$maxtemp = $maxmatches[0];

			echo "<br />";
			echo $maxtemp;
		}
		
		echo '<sup>°C</sup></span>';
		
		if (($i == 1) && (!preg_match('#\bMaximum Temperature: (\d+)#', $all, $maxmatches))) {
			echo "<br />";
		}
		
		echo '</li>';
		
		if (strpos($all, 'Partly Cloudy') !== false) {
			$desc = 'Partly Cloudy';
		} elseif (strpos($all, 'Light Cloudy') !== false) {
			$desc = 'Light Cloudy';
		} else {
			$desc = 'Undefined';
		}
		
		if ($i == 1):
			$d1temp = $mintemp;
			$d1desc = $desc;
		endif;
		
		$i = $i + 1;
	}
	echo "</ul>";
}

function updateVars($feed_url1) {
	$content1 = file_get_contents($feed_url1);
	$x1 = new SimpleXmlElement($content1);
	
	$entry1 = $x1->channel->item;

	$all1 = $entry1->title[0];
	$allexploded1 = explode(' ', $all1);

	$daywithsc1 = $allexploded1[0];
	$day1 = substr(trim($daywithsc1), 0, -1);

	if (preg_match('#\bMinimum Temperature: (\d+)#', $all1, $minmatches1)) {
		$mintemp1 = $minmatches1[0];
		$mintemp2 = str_replace('Minimum Temperature: ', '', $mintemp1);
	}

	if (strpos($all1, 'Partly Cloudy') !== false) {
		$icon = 'cloud';
	} elseif (strpos($all1, 'Light Cloud') !== false) {
		$icon = 'cloud';
	} elseif (strpos($all1, 'Sunny Intervals') !== false) {
		$icon = 'day-cloudy';
	} elseif (strpos($all1, 'Sunny') !== false) {
		$icon = 'day-sunny';
	} else {
		$icon = 'cloud';
	}
	
	if (preg_match('#\bHumidity: (\d+)#', $all1, $humiditymatches)) {
		$humidity1 = $humiditymatches[0];
		$humidity = str_replace('Humidity: ', '', $vhumidity1);
	}
	
	if (preg_match('#\bWind Speed: (\d+)#', $all1, $windspeedmatches)) {
		$windspeed1 = $windspeedmatches[0];
		$windspeed = str_replace('Wind Speed: ', '', $vwindspeed1);
	}
	
	echo '<span class="di vm"><i class="wi wi-'.$icon.' text-info"></i></span>';
	echo '<div class="di vm"><h1 class="m-b-0 text-info">';
	echo $mintemp2;
	echo '<sup>o</sup>C</h1><h5 class="m-t-0">';
	echo "</h5></div>";
}

function windandhumidity($feed_url2) {
	
	$content2 = file_get_contents($feed_url2);
	$x2 = new SimpleXmlElement($content2);
	
	echo '<li align="center"><i class="wi wi-day-sunny m-r-5"></i>';
	
	$entry2 = $x2->channel->item;

	$all2 = $entry2->title[0];
	$all3 = $entry2->description[0];
	$allexploded2 = explode(' ', $all2);
	
	if (preg_match('#\bHumidity: (\d+)#', $all3, $humiditymatches)) {
		$humidity1 = $humiditymatches[0];
		$humidity = str_replace('Humidity: ', '', $humidity1);
		echo "Humidity: ";
		echo $humidity;
		echo "%";
	}
	
	echo "</li>";
	echo '<li align="center""><i class="wi wi-day-windy m-r-5"></i>';
	
	if (preg_match('#\bWind Speed: (\d+)#', $all3, $windspeedmatches)) {
		$windspeed1 = $windspeedmatches[0];
		$windspeed = str_replace('Wind Speed: ', '', $windspeed1);
		echo "Wind Speed: ";
		echo $windspeed;
		echo " Mph";
	}
	echo "</li>";
}

function getFeed1($feed_url) {
     
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
	
    foreach($x->channel->item as $entry) {
		
		echo "<div class='col-md-4 col-lg-4 col-xs-12 white-box' align='center'>";

		$day111 = explode(' ',trim($entry->title));
		$description = str_replace(',','<br />',$entry->description);

		echo "<a target='_blank' href='$entry->link' title='$day111[0]'>" . "<h3>" . $day111[0] . "</h3>" . "<br />" . $description . "</a>";
		
		if (!preg_match('#\bMaximum Temperature: (\d+)#', $description, $maxmatches1111)) {
			echo "<br />";
		}
		echo "</div>";
    }
}

if ($allow == 1):
?>

<div class="row">
	<div class="col-md-12 col-lg-12 col-xs-12">
		<div class="white-box">
			<ul style="align-content: center;" class="nav customtab2 nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#home6" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
						<span class="visible-xs"><i class="ti-home"></i></span>
						<span class="hidden-xs">News</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#profile6" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="ti-user"></i></span>
						<span class="hidden-xs">Weather</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#messages6" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="ti-email"></i></span>
						<span class="hidden-xs">Statistics</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#settings6" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">
						<span class="visible-xs"><i class="ti-settings"></i></span>
						<span class="hidden-xs">Social Media</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active fade in" id="home6">
				<div class="white-box"><h2 align="center">News:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="box-body">
						<p class="lead">
							...
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="profile6">
				<div class="col-md-12 col-lg-12 white-box"><h2 align="center">Weather Report:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="white-box bg-extralight m-b-0">
						<div class="city-weather-widget">
							<h1>Cambridge, UK</h1>
							<h4><?PHP echo date("l"); ?>, <?PHP echo date("d M Y"); ?> (Last Updated: <?PHP echo date("H:i"); ?>)</h4>
							<div class="row p-t-30">
								<div class="col-sm-6">
									<ul class="side-icon-text">
										<li>
											<?PHP updateVars("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
										</li>
									</ul>
								</div>
								<div class="col-sm-6">
									<ul class="list-icons pull-right">
										<?PHP windandhumidity("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
									</ul>
								</div>
								<div class="col-md-12">
									<div id="ct-city-wth" style="height:50px"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel">
						<div class="row">
							<ul class="list-unstyled city-weather-days">
								<?php getFeed("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-12 white-box"><h2 align="center">Detailed Weather Report:</h2></div>
				<?php getFeed1("http://open.live.bbc.co.uk/weather/feeds/en/cb22/3dayforecast.rss"); ?>
				<div class="clearfix"></div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="messages6">
				<div class="white-box"><h2 align="center">Statistics:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="box-body">
						<p class="lead">
							...
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="settings6">
				<div class="white-box"><h2 align="center">Social Media:</h2></div>
				<div class="col-md-12 col-lg-12 white-box">
					<div class="box-body">
						<p class="lead">
							...
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<script language="javascript">
$(function() {
    $('#mainContent div:not(:first)').hide();
 
    $('ul li a').click(function() {
        $('ul#nav li a').removeClass('selected');
        $(this).addClass('selected');
		
        var href = $(this).attr('href');
        var split = href.split('#');
		
        $('#mainContent div').hide();
        $('#mainContent div#' + split[1]).fadeIn();
		
        return false;
    });
});
</script>
<?PHP endif ?>
<?PHP include("../../_layout/foot.php"); ?>
>>>>>>> 62a16dbf6deb97700a2596aa4bb29d5442e28653
<?PHP include("../../_layout/foot1.php"); ?>
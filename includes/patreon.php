<<<<<<< HEAD
<?PHP //Patreon
	require_once("/home/godlymar/smurfdestroyer.com/includes/patreon/patreon.php");

	use Patreon\API;
	use Patreon\OAuth;

	$client_id = "3a5fd518eb9cf1cd49b7b49aa75606326f43e92e3be97146a93b2b63746dd95f";
	$client_secret = "9311458952838dfe353409a8513e06d8620fbd029fd5cf46a9421590340bd98b";
	$creator_id = "7nlOeUCMmkDnnBK";

	$oauth_client = new Patreon\OAuth($client_id, $client_secret);

	$redirect_uri = "https://www.smurfdestroyer.com/pages/patreon/";

	$tokens = $oauth_client->get_tokens($_GET['code'], $redirect_uri);
	$access_token = $tokens['access_token'];
	$refresh_token = $tokens['refresh_token'];

	$api_client = new Patreon\API($access_token);
	$patron_response = $api_client->fetch_user();
	$patron = $patron_response['data'];
	$included = $patron_response['included'];
	$pledge = null;

	if ($included != null) {
	  foreach ($included as $obj) {
		if ($obj["type"] == "pledge" && $obj["relationships"]["creator"]["data"]["id"] == $creator_id) {
		  $pledge = $obj;
		  break;
		}
	  }
	}

	if (isset($patron['attributes']['image_url']))
	{
		$imgurl = $patron['attributes']['image_url'];
		$fname = $patron['attributes']['first_name'];
		$lname = $patron['attributes']['last_name'];
		$purl = $patron['attributes']['url'];
	}
=======
<?PHP //Patreon
	require_once("/home/godlymar/smurfdestroyer.com/includes/patreon/patreon.php");

	use Patreon\API;
	use Patreon\OAuth;

	$client_id = "3a5fd518eb9cf1cd49b7b49aa75606326f43e92e3be97146a93b2b63746dd95f";
	$client_secret = "9311458952838dfe353409a8513e06d8620fbd029fd5cf46a9421590340bd98b";
	$creator_id = "7nlOeUCMmkDnnBK";

	$oauth_client = new Patreon\OAuth($client_id, $client_secret);

	$redirect_uri = "https://www.smurfdestroyer.com/pages/patreon/";

	$tokens = $oauth_client->get_tokens($_GET['code'], $redirect_uri);
	$access_token = $tokens['access_token'];
	$refresh_token = $tokens['refresh_token'];

	$api_client = new Patreon\API($access_token);
	$patron_response = $api_client->fetch_user();
	$patron = $patron_response['data'];
	$included = $patron_response['included'];
	$pledge = null;

	if ($included != null) {
	  foreach ($included as $obj) {
		if ($obj["type"] == "pledge" && $obj["relationships"]["creator"]["data"]["id"] == $creator_id) {
		  $pledge = $obj;
		  break;
		}
	  }
	}

	if (isset($patron['attributes']['image_url']))
	{
		$imgurl = $patron['attributes']['image_url'];
		$fname = $patron['attributes']['first_name'];
		$lname = $patron['attributes']['last_name'];
		$purl = $patron['attributes']['url'];
	}
>>>>>>> 62a16dbf6deb97700a2596aa4bb29d5442e28653
?>
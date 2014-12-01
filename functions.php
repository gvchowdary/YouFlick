<?php

function displayYoutube()
{

	// This code will execute if the user entered a search query in the form
	// and submitted the form. Otherwise, the page displays the form above.

	if (isset($_GET['q']) && isset($_GET['maxResults'])) {
	
	  // Call set_include_path() as needed to point to your client library.
		set_include_path("./google-api-php-client-master/src/");
		require_once 'Google/Client.php';
		require_once 'Google/Service/YouTube.php';

	  /*
	   * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
	   * Google Developers Console <https://console.developers.google.com/>
	   * Please ensure that you have enabled the YouTube Data API for your project.
	   */
	  $DEVELOPER_KEY = 'AIzaSyALjCfQhKFg3tRHvPCDtsh2fGCjsh4on1I';

	  $client = new Google_Client();
	  $client->setDeveloperKey($DEVELOPER_KEY);

	  // Define an object that will be used to make all API requests.
	  $youtube = new Google_Service_YouTube($client);

	  try {
		// Call the search.list method to retrieve results matching the specified
		// query term.
		$searchResponse = $youtube->search->listSearch('id,snippet', array(
		  'q' => $_GET['q'],
		  'maxResults' => $_GET['maxResults'],
		));

		$query = $_GET['q'];
		
		
		$videos = '';
		$channels = '';
		$playlists = '';

		// Add each result to the appropriate list, and then display the lists of
		// matching videos, channels, and playlists.
		foreach ($searchResponse['items'] as $searchResult) {
		  switch ($searchResult['id']['kind']) {
			case 'youtube#video':
			  $videos .= sprintf('<li>%s (%s)</li>',
				  $searchResult['snippet']['title'], $searchResult['id']['videoId']);
			  break;
			case 'youtube#channel':
			  $channels .= sprintf('<li>%s (%s)</li>',
				  $searchResult['snippet']['title'], $searchResult['id']['channelId']);
			  break;
			
		  }
		}
		echo <<<END
	<div class="row">
		<h3>Videos</h3>
		<ul>$videos</ul>
		<h3>Channels</h3>
		<ul>$channels</ul>
       </div>
END;
		
	  } catch (Google_ServiceException $e) {
		$htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
		  htmlspecialchars($e->getMessage()));
	  } catch (Google_Exception $e) {
		$htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
		  htmlspecialchars($e->getMessage()));
	  }
	}
}

function displayFlickr()
{

	if (isset($_GET['q']) && isset($_GET['maxResults'])) {

		$flickrKey = 'cc142a5c82d556a3886608daea3b336d';
		$flickrSecret = '815f1e2d9eb3228b';
		require_once('phpFlickr.php');
		
		$f = new phpFlickr($flickrKey);
		$recent = $f->photos_search(array("tags"=>$_GET['q'], "tag_mode"=>"any", "per_page" => $_GET['maxResults'], "extras" => "url_sq"));
		$url = array();
		$urls = array();
		if(count($recent['photo']) < 1)
		{
		   echo '<h5>There are no Results Found</h5>';
		}
		else
		{
		foreach ($recent['photo'] as $photo) {
			$urls[] = $f->buildPhotoURL($photo, "Medium");
		}
		
		foreach ($urls as $url) {
			echo '<img src="'. $url .'">';
		}
		}
	}
}

?>
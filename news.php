<!DOCTYPE html>

<html class="page">
<?php include('Meta&Head.html'); ?>
<title>News | Rafael</title>

<body>
    <!-- HEADER -->
    <div class="header" style="
        background-image: url('src/newsHeader.jpg');
        background-position: 40% 20%;
    ">
        
        <?php include('NavigationBar.html'); ?>
        
        <h3><span style="background-color: white;">
                News
        </span></h3>
    </div>

    <!-- MAIN -->
    <div class="main">
        <h1>
            Upcoming Events
        </h1>
        <p1>
            
        <?php

require __DIR__ . '/vendor/autoload.php';

/** if (php_sapi_name() != 'cli') {
*    throw new Exception('This application must be run on the command line.');
*}
*/

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
	
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.kkkkkk
    if ($client->isAccessTokenExpired()) {
        
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            // echo "Open the following link in your browser: <a href='" . $authUrl . "'>Get Verification Code</a></br>";
            // echo "Enter verification code:</br>"
            // $authCode = trim(fgets(STDIN));
            $authCode = "4/IQGuXCBAjlrZNIFIZQSP_qhS0mRdw7sx7HmIarI-su-elNb4dIt1J0c";

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        //file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
    
    //echo "Error: tokenExpired</br>Contact Ethan at ethan.sifferman@gmail.com";
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);

// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => true,
  'timeMin' => date('c'),
);
$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();

if (empty($events)) {
    echo "No upcoming events found.<br>";
} else {
    echo "Upcoming events:<br>";
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }
        try {echo "Summary: " . $event->getSummary()."</br>";} catch (Exception $e) {}
        try {echo "Description: " . $event->getDescription()."</br>";} catch (Exception $e) {}
        try {echo "Location: " . $event->getLocation()."</br>";} catch (Exception $e) {}
        try {echo "<img src='http://drive.google.com/uc?export=view&id=" . $event->getAttachments()[0]->fileId."'></br>";} catch (Exception $e) {}
        try {echo "Date: " . $start."</br>";} catch (Exception $e) {}
        echo "</br>";
    }
}

?>

        </p1>

    </div>

    <div style="padding: 40px"></div>
    
    <!-- FOOTER -->
    <?php include('Footer.html'); ?>
    
</body>

</html>

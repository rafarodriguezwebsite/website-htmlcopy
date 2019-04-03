<?php
require __DIR__ . '/vendor/autoload.php';

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
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

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            // echo "Open the following link in your browser: ".$authUrl."</br>";
            $authCode = "4/IQG3OYZax2SuXV_e1rpHROp2aMRi9uQKTT4oScNVIhLZJBEIIovu8zM";

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
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
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
    echo "No upcoming events found.</br>";
} else {
    foreach ($events as $event) {
        $start = $event->start->dateTime;
        if (empty($start)) {
            $start = $event->start->date;
        }

        echo "
<table border="0" class="Event">
    <tr>
        <th colspan="1" class="Date">
            <a href="home.php">Home</a>
        </th>
        <th colspan="1" class="Picture">
            <a href="home.php">Home</a>
        </th>
        <th colspan="1" class="Summary">
            <a href="home.php">Home</a>
        </th>
        <th colspan="1" class="Location">
            <a href="home.php">Home</a>
        </th>
    </tr>
</table>
    ";

        echo "Summary: " . $event->getSummary()."</br>";
        echo "Description: " . $event->getDescription()."</br>";
        echo "Location: " . $event->getLocation()."</br>";
        echo "<img src='http://drive.google.com/uc?export=view&id=" . $event->getAttachments()[0]->fileId."'></br>";
        echo "Date: " . $start."</br>";
        echo "</br>";
    }
}
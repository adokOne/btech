<?php
    require_once "Google/Client.php";
    require_once "Google/Exception.php";
    require_once "Google/Service/Exception.php";
    require_once "Google/Http/CacheParser.php";
    require_once "Google/IO/Abstract.php";
    require_once "Google/IO/Curl.php";
    require_once "Google/Signer/Abstract.php";
    require_once "Google/Signer/P12.php";
    require_once "Google/Cache/Abstract.php";
    require_once "Google/Cache/File.php";
    require_once "Google/Utils.php";
    require_once "Google/Utils/URITemplate.php";
    require_once "Google/Http/Request.php";
    require_once "Google/Http/REST.php";
    require_once "Google/Service.php";
    require_once "Google/Model.php";
    require_once "Google/Collection.php";
    require_once "Google/Service/Resource.php";
    require_once "Google/Service/Calendar.php";
   # require_once "Google/Service/Event.php";
    
    require_once "Google/Config.php";
    require_once "Google/Auth/Abstract.php";
    require_once "Google/Auth/OAuth2.php";
    require_once "Google/Auth/AssertionCredentials.php";
    //
    $client = new Google_Client();
    $client->setDeveloperKey("1eab2cc2057724e31f428193c106bcdd47196984");
    $client->setApplicationName("your-app-name");
    $client->setClientId("1056209039591-ac84fkmqjtjeir32g9b6lpgabg7i4ur5.apps.googleusercontent.com");
    $client->setAssertionCredentials(
        new Google_Auth_AssertionCredentials(
            "1056209039591-ac84fkmqjtjeir32g9b6lpgabg7i4ur5@developer.gserviceaccount.com",
            array(
                "https://www.googleapis.com/auth/calendar"
            ),
            file_get_contents(dirname(__FILE__). "/adok.p12")
        )
    );
    //
    $service = new Google_Service_Calendar($client);

    //
    $event = new Google_Service_Calendar_Event();

    $event->setSummary('Event 1');
    $event->setLocation('Somewhere');
    $start = new Google_Service_Calendar_EventDateTime();
    $start->setDateTime('2013-10-22T19:00:00.000+01:00');
    $start->setTimeZone('Europe/London');
    $event->setStart($start);
    $end = new Google_Service_Calendar_EventDateTime();
    $end->setDateTime('2013-10-22T19:25:00.000+01:00');
    $end->setTimeZone('Europe/London');
    $event->setEnd($end);
    //
    $calendar_id = "sd7h90sdja97sdg9ahd0sa8bd@group.calendar.google.com";
    //
    $new_event = null;
    //
    try {
        $new_event = $service->events->insert($calendar_id, $event);
        //
        $new_event_id= $new_event->getId();
    } catch (Google_ServiceException $e) {
        syslog(LOG_ERR, $e->getMessage());
    }
    //
    $event = $service->events->get($calendar_id, $new_event->getId());
    //
    if ($event != null) {
        echo "Inserted:";
        echo "EventID=".$event->getId();
        echo "Summary=".$event->getSummary();
        echo "Status=".$event->getStatus();
    }

?>
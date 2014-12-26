    <?php

	require_once('TwitterAPIExchange.php');
 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "763955551-ggo7LtG13hNpwuGggYt1Z18cSnqZ7eBrpR8qS9pI",
'oauth_access_token_secret' => "fHvb7fW6j4wYQL6RZ0G2veYzWQA8X3KrcRngT5UfroCGr",
'consumer_key' => "b186o64Q9Iw4mswnHbdXFkmoN",
'consumer_secret' => "QoDbQ0eFCCuMA8AdkxQmd1mCaM2zEf4ORGHqOZX62dQVpbL2h6");
	
	
$url = "https://api.twitter.com/1.1/statuses/home_timeline.json";
$requestMethod = "GET";



if (isset($_GET['user'])) {$user = $_GET['user'];} else {$user = "Houssemaster";}
$count = 200;
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);


foreach($string as $items)
    {
        echo "Date et heure du tweet: ".$items['created_at']."<br />";
        echo "Tweet: ".htmlentities($items['text'])."<br />";
        echo "Tweete par: ". $items['user']['name']."<br />";
        echo "Profil: ". $items['user']['screen_name']."<br />";
        echo "Abonnées: ". $items['user']['followers_count']."<br />";
        echo "Amis: ". $items['user']['friends_count']."<br />";
        echo "Occurence: ". $items['user']['listed_count']."<br /><hr />";
    }
	
    ?>
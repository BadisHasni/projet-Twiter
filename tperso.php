    <?php
	
	//inclusion de la classe de l'api de twitter 
	require_once('TwitterAPIExchange.php');
 
/** les param�tres d'authentification de l'application**/
$settings = array(
'oauth_access_token' => "763955551-ggo7LtG13hNpwuGggYt1Z18cSnqZ7eBrpR8qS9pI",
'oauth_access_token_secret' => "fHvb7fW6j4wYQL6RZ0G2veYzWQA8X3KrcRngT5UfroCGr",
'consumer_key' => "b186o64Q9Iw4mswnHbdXFkmoN",
'consumer_secret' => "QoDbQ0eFCCuMA8AdkxQmd1mCaM2zEf4ORGHqOZX62dQVpbL2h6");
	
//pr�paration de la focntion qui retourne le profil souhait�
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";


if (isset($_GET['user'])) {$user = $_GET['user'];} 
$count = 200;
//Nom d'utilisateur et nbre de twitter
$getfield = "?screen_name=$user&count=$count";


$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);


foreach($string as $items)
    {
        echo "Date et heure du Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ".htmlentities($items['text'])."<br />";
        echo "Tweete par: ". $items['user']['name']."<br />";
        echo "profil: ". $items['user']['screen_name']."<br />";
        echo "Abonn�es: ". $items['user']['followers_count']."<br />";
        echo "Amis: ". $items['user']['friends_count']."<br />";
        echo "Occurence: ". $items['user']['listed_count']."<br /><hr />";
    }
	
    ?>
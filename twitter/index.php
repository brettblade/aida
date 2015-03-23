<?php
# Load Twitter class
require_once('TwitterOAuth.php');
use Abraham\TwitterOAuth\TwitterOAuth;

# Define constants

define('CONSUMER_KEY', 'ggYCmKSYhTMLiZLvDrcWEfXrH');
define('CONSUMER_SECRET', '4RBKa0Gvjudo8Uxg0fTDH0Dqs9wXmcDyzPg3CNhPp5lOQH9X6J');
define('ACCESS_TOKEN', '97772800-BdJjDtzJN8sMqtRcZzXKA45Y6XUrwOOBm2giTahtw');
define('ACCESS_TOKEN_SECRET', 'EP5P4qFXA16TegtTCsE7i5JMJfNiRqalKEdkCdqBcpgIY');

# Create the connection
$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

?>

<h2>Get Tweets!</h2>
<form action="twitter/index.php" method="POST">
  <label>
      Twitter Handle: <input type="text" name="username">
  </label>
  <label>
      Limit: <input type="number" name="limit" value="10">
  </label>
  <input type="submit" value="Submit" />
</form>

<?php
if (!empty($_POST)) {
    # Load the Tweets
    $tweets = $twitter->get('statuses/user_timeline', array('screen_name' => $_POST["username"], 'exclude_replies' => 'true', 'include_rts' => 'false', 'count' => $_POST["limit"] + 1));
    # Example output
    if(!empty($tweets)) {
        echo "<h2>" . count($tweets) . " Tweet(s) found by " . $_POST["username"] . "</h2><ul>";
        foreach($tweets as $tweet) {
            # Access as an object
            $tweetText = $tweet->text;

            # Make links active
            $tweetText = preg_replace("#(http://|(www.))(([^s<]{4,68})[^s<]*)#", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);

            # Linkify user mentions
            $tweetText = preg_replace("/@(w+)/", '<a href="http://www.twitter.com/$1" target="_blank">@$1</a>', $tweetText);

            # Linkify tags
            $tweetText = preg_replace("/#(w+)/", '<a href="http://search.twitter.com/search?q=$1" target="_blank">#$1</a>', $tweetText);

            # Output
            echo "<li>" . $tweetText . "</li>";
        }
        echo "</ul>";
    } else {
      echo "<h2>Sorry no tweets have been found for " . $_POST["username"] . "</h2>";
    }
}

?>
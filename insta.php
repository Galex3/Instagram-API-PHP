<?php
/* Documentation: https://developers.facebook.com/docs/instagram-basic-display-api */

/* Generate Access Token: https://www.youtube.com/watch?v=X2ndbJAnQKM | Also available on the above documentation */
$access_token = "";

/* Get username, media_url, and permalink from every media post of the access_token's profile */
$json_link = "https://graph.instagram.com/me/media?fields=username,media_url,permalink&access_token={$access_token}";

/* Decode JSON result */
$obj = json_decode(file_get_contents($json_link), true);

/* Gets total number of posts */
$num_posts = count($obj['data']);

/* See JSON content
echo "<pre>";
print_r($obj);
echo "</pre>";
*/

/* Iterate through all posts | Index 0 is the most recent post */
for ($x = 0; $x < $num_posts; $x++) {
    echo "<div style='padding:20px;'>
    <a href='{$obj['data'][$x]['permalink']}' target='_blank'><img src='{$obj['data'][$x]['media_url']}' alt='{$obj['data'][$x]['username']} Instagram'/></a></div>";
}

?>
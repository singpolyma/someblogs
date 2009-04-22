<?php

require_once 'xn-app://someblogs/normalize_url.php';
$_REQUEST['url'] = normalize_url($_REQUEST['url']);

require_once 'is_junkblog.php';
$item = is_junkblog($_REQUEST['url']);

if($_REQUEST['format'] == 'xml') {
   header('Content-Type: application/xml;charset=utf-8');
   echo '<blog>'."\n";
   echo '   <result>'.($item && $item->my->verify ? '1' : '0').'</result>'."\n";
   echo '   <blog_url>'.htmlspecialchars($_REQUEST['url']).'</blog_url>';
   echo '</blog>';
} else {
   if($item)
      echo '<h2>Blog Found!</h2><p>'.htmlspecialchars($_REQUEST['url']).($item->my->verify ? " is a 'junk' blog.  If you think this listing is in error, please contact us using the 'Report This App' feature from the 'Popular' tab of the Ningbar, above." : " has been suggested as a 'junk' blog.  If you think this listing is in error, please vote 'Not Junk' on <a href=\"/\">the main page</a>.").'</p>';
   else
      echo '<h2>Blog Not Found!</h2><p>'.htmlspecialchars($_REQUEST['url'])." is not a 'junk' blog.</p>";
   echo '<br /><p><a href="?url='.$_REQUEST['url'].'&amp;format=xml">Get these results as XML</a></p>';
}//end if-else format

?>
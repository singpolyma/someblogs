<?php

require_once 'xn-app://someblogs/normalize_url.php';

function is_junkblog($url,$strict=false) {

   $url = normalize_url($url);

   $query = XN_Query::create('Content')
         ->filter('owner->relativeUrl','=','someblogs')
         ->filter('type','eic','Website')
         ->filter('my.url','=',$url);
   $items = $query->execute();
   if(count($items)) {
      if($strict === true && !$items[0]->my->verify)
         return false;
      return $items[0];
   }//end if count items

   if($strict)
      return false;

   $page = strip_tags(file_get_contents($url));
   $stoplist = array('drunk','free links','sex','cock','pussy','porn','pr0n','pron','I went','I slept','slept with','my boss','loser','my cat','I love you','this update is');
   foreach($stoplist as $stop) {
      if(stristr($page,' '.$stop.' ')) {
         $dummy = file_get_contents('http://someblogs.ning.com/add.php?xn_auth=no&url='.urlencode($url));
         return ($strict ? false : true);
      }//end if stop
   }//end foreach stoplist

   return false;

}//end function is_junkblog

?>
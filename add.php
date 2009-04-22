<?php

require_once 'xn-app://someblogs/normalize_url.php';
$_REQUEST['url'] = normalize_url($_REQUEST['url']);

   $query = XN_Query::create('Content')
         ->filter('owner','=')
         ->filter('type','eic','Website')
         ->filter('my.url','=',$_REQUEST['url']);
   $items = $query->execute();

if(!count($items)) {

$site = XN_Content::create('Website');
$site->my->set('url',$_REQUEST['url']);
$site->my->set('verify',false);
$site->saveAnonymous();

}//end if ! count items

?>
<h2>Blog Added for Consideration</h2>
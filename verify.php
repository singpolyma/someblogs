<?php

$site = XN_Content::load(intval($_REQUEST['id']));
$site->my->verify = true;
$site->saveAnonymous();

?>
<h2>Blog Verified!</h2>
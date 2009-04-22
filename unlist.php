<?php

$site = XN_Content::load(intval($_REQUEST['id']));
XN_Content::delete($site);

?>
<h2>Blog Unlisted!</h2>
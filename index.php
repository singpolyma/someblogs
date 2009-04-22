<p style="margin-top:20px;">Some Blogs is a search engine for listing less-than-interesting blogs.  This includes personal blogs, sexblogs, and any blogs that are just plain dumb.  Why?  So that we can filter them from our search results on other engines of course!</p>
<?php
$query = XN_Query::create('Content')
         ->filter('owner','=')
         ->filter('type','eic','Website')
         ->filter('my.verify','=',true);
$items = $query->execute();

echo '<p style="margin-top:20px;">Current Indexing '.count($items).' "Junkblogs"</p>';

?>

<fieldset style="float:right;">
<form method="get" action="add.php">
<h2>Suggest a Blog</h2>
<dl>
   <dt>'Junk' Blog URL</dt> <dd><input type="text" name="url" /></dd>
   <dt></dt> <dd><input type="submit" value="Suggest" /></dd>
</dl>
</form>
</fieldset>

<fieldset>
<form method="get" action="search.php">
<h2>Search 'Junk' Blogs</h2>
<dl>
   <dt>'Junk' Blog URL</dt> <dd><input type="text" name="url" /></dd>
   <dt></dt> <dd><input type="submit" value="Search" /></dd>
</dl>
</form>
</fieldset>


<?php

$query = XN_Query::create('Content')
         ->filter('owner','=')
         ->filter('type','eic','Website')
         ->filter('my.verify','=',false)
         ->order('createdDate','desc',XN_Attribute::NUMBER);
$items = $query->execute();

if(count($items)) {
   echo '<h2>Recently Suggested Blogs</h2>'."\n";
   echo '<ul>'."\n";

   foreach($items as $item) {
      echo '   <li>'.$item->my->h('url').' - <a href="/verify.php?id='.$item->id.'">Verify</a> - <a href="/unlist.php?id='.$item->id.'">Unlist</a></li>'."\n";
   }//end foreach

   echo '</ul>'."\n";
}//end if count items

?>
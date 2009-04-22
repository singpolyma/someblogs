<h2>APIs</h2>
<p>
There are two ways that you can access the SomeBlogs database from other apps.  If your app is not on Ning you can use the XML api.  Use http://someblogs.ning.com/search.php?xn_auth=no&amp;url=URL&amp;format=xml to get the data.
<br /><br />
If you are on Ning use the component:
<br /><br />
require_once 'xn-app://someblogs/is_junkblog.php';
$abool = is_junkblog('URL');
<br /><br />
The component has the added benefit of trying to automatically classify blogs that are not in the database already.  If the auto-classifier finds it to be a personal blog / sexblog / etc it will add it for consideration in the database and return true.  If you only want it to return true if the URL is verified in the database pass true as an optional second parameter.
</p>
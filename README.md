<h1>Installation</h1>

<p>To install the blog, you will need to execute multiple console commands, but before you do this, you must configure the database connection in config/db.php, then go to the working directory and run these commands:</p>
<br>
<pre>
<code>
composer install
php yii migrate
</code>
</pre>
<br>
<p>This commands download vendor and performs migration. You can also generate posts and categories by running the following commands</p>
<br>
<pre>
<code>
php yii generate-category -c=3
php yii generate-post -c=20
</code>
</pre>
<br>
<p>Admin panel is located at /admin</p>

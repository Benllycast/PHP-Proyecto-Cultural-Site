<?php
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// create a new user and set data (but not the id)
$user = new JunctionUser();

$user->setEmail("foo@bar.com");
$user->setPassword("password");
$user->setDate(time());

// have Junction save the user to the database
$junction->save($user);

echo "New user saved to database with id = " . $user->getId();
?>
<hr />
<code>
<pre>
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// create a new user and set data (but not the id)
$user = new JunctionUser();

$user->setEmail("foo@bar.com");
$user->setPassword("password");
$user->setDate(time());

// have Junction save the user to the database
$junction->save($user);

echo "New user saved to database with id = " . $user->getId();
</pre>
</code>
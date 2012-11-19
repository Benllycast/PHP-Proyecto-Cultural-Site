<?php
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// fetch all of the users from the database
$clause = $junction->createQuery("Password = ?");
$clause->bind(0, "password");
$users = $junction->loadWhere($clause);

$updated = 0;
// step through each user and update their date and passwords
foreach ($users as $user) {
	$updated++;
	$user->setDate(time());
	$user->setPassword("newPassword");
	// save the changes
	$junction->save($user);
}

echo "Updated " . $updated . " users setting password to 'newPassword'";
?>
<hr />
<code>
<pre>
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// fetch all of the users from the database
$clause = $junction->createQuery("Password = ?");
$clause->bind(0, "password");
$users = $junction->loadWhere($clause);

$updated = 0;
// step through each user and update their date and passwords
foreach ($users as $user) {
	$updated++;
	$user->setDate(time());
	$user->setPassword("newPassword");
	// save the changes
	$junction->save($user);
}

echo "Updated " . $updated . " users setting password to 'newPassword'";
</pre>
</code>
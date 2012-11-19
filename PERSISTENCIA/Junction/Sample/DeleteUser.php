<?php
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// delete user's with password = newPassword (see UpdateUser script)
$clause = $junction->createQuery("password = ?");
$clause->bind(0, "newPassword");
$deleted = $junction->deleteWhere($clause);

echo "Number of users deleted: " . $deleted;
?>
<hr />
<code>
<pre>
// require dependencies
require("Domain/JunctionUser.php");
require("../Junction.php");

// create a new Junction session for the user object
$junction = Junction::construct("JunctionUser");

// delete user's with password = newPassword (see UpdateUser script)
$clause = $junction->createQuery("password = ?");
$clause->bind(0, "newPassword");
$deleted = $junction->deleteWhere($clause);

echo "Number of users deleted: " . $deleted;
</pre>
</code>
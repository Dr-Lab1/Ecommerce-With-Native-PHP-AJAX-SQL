<?php

/* Système */
define('DS', DIRECTORY_SEPARATOR);
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

/* View */
define("Header", ROOT.DS."view".DS."header.php");
define("Footer", ROOT.DS."view".DS."footer.php");

/* Route */
define("Index", ".".DS."index.php");
define("Products", ".".DS."products.php");
define("Dashboard", ".".DS."dashboard.php");
define("Add", ".".DS."add.php");
define("Update", ".".DS."update.php");


/* Model */
define("Database", ROOT."model".DS."database.php");

?>
<?php

/* Système */
define('DS', DIRECTORY_SEPARATOR);
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

/* View */
define("Header", ROOT.DS."view".DS."header.php");
define("Footer", ROOT.DS."view".DS."footer.php");

/* Model */
define("Database", ROOT."model".DS."database.php");

?>
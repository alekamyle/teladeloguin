<?php

session_start();

session_unset();

session_destroy();

hearder("Location: index.php");

exit();

?>
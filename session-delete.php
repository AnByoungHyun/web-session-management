<?php
	session_start();
	session_destroy();
	header("Location: /session-check.php");
	exit;
?>

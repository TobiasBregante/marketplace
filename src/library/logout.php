<?php
	session_start();
	session_destroy();
	header('Location: ?q=0');
?>
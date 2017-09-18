<?php
	//ferme la session et la connexion FTP
	require_once '../../index.php';
	global $CL;
	session_unset();
	session_destroy();
	$CL->Close();
	header('location: ../../index.php');
?>
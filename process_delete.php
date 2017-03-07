<?php
include_once('common.php');

			$id = $_GET['id'];
			deleteDetail($id);
			header("location:index.php");

?>
<?php

$conn = new mysqli("localhost","root","","scpartner");

if($conn->connect_error)
{
	 die("Connection Not Established");
}

?>
<?php 

include 'db.php';

$query_ic = 	"SELECT * from ic ORDER BY name";
$query_ce = 	"SELECT * from ce ORDER BY name";
$query_ced =	"SELECT * from ced ORDER BY name";
$query_cgb =	"SELECT * from cgb ORDER BY name";
$query_ct = 	"SELECT * from ct ORDER BY name";
$query_cas =	"SELECT * from cas ORDER BY name";
$query_saec =	"SELECT * from saec ORDER BY name";

$result_ic = mysqli_query($conn, $query_ic);

$result_ce = mysqli_query($conn, $query_ce);

$result_ced = mysqli_query($conn, $query_ced);

$result_cgb = mysqli_query($conn, $query_cgb);

$result_ct = mysqli_query($conn, $query_ct);

$result_cas = mysqli_query($conn, $query_cas);

$result_saec = mysqli_query($conn, $query_saec);

 ?>
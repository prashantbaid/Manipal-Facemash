<?php 
session_start();
$winid=0;
$loseid=0;
include('functions.php');
if($_GET['lid']==1 && $_GET['rid']==0) {
 	$winid= $_SESSION['left'];
 	$loseid=$_SESSION['right']; 
 }
else if($_GET['rid']==1 && $_GET['lid']==0) {
	$winid= $_SESSION['right'];
	$loseid=$_SESSION['left'];
}
else  {
	header("Location:index.php");
}
$winid=intval($winid);
$loseid=intval($loseid);
$file="data.xml";
$data= new SimpleXMLElement($file, null, true);
$winner=intval($data->score->$winid);
$loser=intval($data->score->$loseid);
$exp_winner=expected($loser,$winner);
$new_win=win($winner,$exp_winner);
$exp_loser=expected($winner,$loser);
$new_lose=loss($loser,$exp_loser);
$data->score->$winid=$new_win;
$data->score->$loseid=$new_lose;
file_put_contents($file, $data->asXML(), LOCK_EX);
header("Location: index.php");
?>

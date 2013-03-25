<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MIT Facemash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MIT Facemash">
    <meta name="author" content="Anonymous">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <?php
$file="data.xml";
$result= new SimpleXMLElement($file, null, true);
?>
    <script>
    function openlink(link) {
      window.open(link);
    }
    function chkrank() {
      window.open("top10.php");
    }
    </script>
<style>

body {
  background-color: #f5f5f5;
  padding-top: 10px;
        padding-bottom: 40px;
}
table {
	border-collapse:collapse;
	opacity: 0.8;
	
}
table, th, td
{
border: 5px solid black;
text-align:center;
margin: 0 auto;

}
td , th{
	
	padding:15px;
	width: 80px;
}
th {
	color: red;
}
img {
	height:100px;
	width:100px;
}
            .container-narrow {
        margin: 0 auto;
        max-width: 900px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }
            .jumbotron {
        margin: 30px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 64px;
        line-height: 1;
        color:#b94a48;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }
      #link {
      	padding-top:30px;
      	padding-bottom:30px;
      }
</style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div id="container-narrow"> 
	  <div class="jumbotron">
        <h1>Top 10 Hottest</h1>
      </div> 
	<table border="1">
	<tr>
	<th>Picture</th>
	<th>Score</th>
	<th>Rank</th>
	</tr>
	
	<?php $userarray=array(); $scorearray=array(); 
	for($i=0; $i<$result->count; $i++) {
		$userarray[]=$result->uid[$i];
		$scorearray[]=$result->score[$i];
	}
		arsort($scorearray, SORT_NUMERIC);	
		for($i=0; $i<10; $i++) { ?>
	<tr> 
	<td><img src="http://websismit.manipal.edu/websis/control/img/?imgId=<?php echo $userarray[key($scorearray)];?>"/></td>
	<td><?php echo round($scorearray[key($scorearray)]);?></td>
	<td><?php echo $i+1; ?></td>
	</tr>
	<?php next($scorearray);} file_put_contents($file, $result->asXML());?>
	</tr>
	</table>
<hr>
<center>
<div class="btn-group">
  <button class="btn" onclick="openlink('index.php')">Home</button>
  <button class="btn" onclick="openlink('uglylist.php')">Top 10 Hottest</button>
  <button class="btn" onclick="openlink('rank.php')">Check your Rank</button>
  <button class="btn" onclick="openlink('about.html')">FAQs</button>
</center>
</div>

	</div>
</body>
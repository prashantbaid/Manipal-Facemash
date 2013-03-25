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
        <script>
    function openlink(link) {
      window.open(link);
    }
    function chkrank() {
      window.open("top10.php");
    }
    </script>
    <style>
    #ugly {
    	height: 100px;
    	width: 100px;
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
        font-size: 36px;
        line-height: 1;
        padding-bottom: 50px;
     
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }
      #link {
      	padding-top:30px;
      	padding-bottom:30px;
      }
            body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      #red{
      	color:red;
      	font-style: italic;
      }

</style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
		<body>
			<div class="container-narrow">
				<div class="jumbotron">
        <h1>Enter your imgId to get your score and rank</h1>
		<form name="score" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
			<input type="text" name="imgid" class="input-block-level" placeholder="Enter your imgId"/>
		</br>
		<button type="submit" class="btn btn-large btn-primary">Get Rank</button>
		</form>

			<?php
	$file="data.xml";
$result= new SimpleXMLElement($file, null, true); 
	$userarray=array(); $scorearray=array(); 
	for($i=0; $i<$result->count; $i++) {
		$userarray[]=$result->uid[$i];
		$scorearray[]=$result->score[$i];
	}
		arsort($scorearray, SORT_NUMERIC);	
		if (isset($_POST["imgid"])) {
		for($i=0; $i<$result->count; $i++) {
			if($_POST["imgid"]==$userarray[key($scorearray)]) { 
				?>
				<p><img src="http://websismit.manipal.edu/websis/control/img/?imgId=<?php echo $userarray[key($scorearray)];?>" id="ugly"/></p>
					<p><b>Your score is: <i><?php
				echo round($scorearray[key($scorearray)]);?>.</i></p><p>Rank: You are
				<span id="red">
				<?php 
				$x= $i+1;
				if($x==1)
					echo "the ";
				else if($x%10==1)
					echo $x."st";
				else if($x%10==2)
					echo $x."nd";
				else if($x%10==3)echo $x."rd";
				else echo $x."th";
				?></span> most hottest person in Manipal.</b></br><i>(Out of 5221 pictures)</p><?php
				file_put_contents($file, $result->asXML());
				break;
		   	}
		   	next($scorearray);
		} 
	}?>
</br></br></br></br>
<h1>How to get your imgId?</h1>
<p class="lead">Log in to your <a href="http://websismit.manipal.edu/websis/control/main">Websismit Portal</a>. Right click on your display picture. Select open image in new tab. You will see something like this in your address bar.</p>
    <p><img src="picid.png"/></p>
    <p class="lead">Now copy the imgId and paste it in the above text box</p>
    <p><img src="dummies.png"/></p> 
</div>
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
</html>
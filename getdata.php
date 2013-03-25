<!-- documentation:
Here I am checking for the pics that exist and that do not exist for a given range of picid's in websis database. I am using the onerror function to check whether image exists or not. If the picture does not exist, I am storing it in an array, so that I do not include those pics in my database. --><html>
<head>
<script>
var i=0;
imarray=new Array();
function imerr(imid) {
	//add picid's of pictures that do not exist
	imarray[i]=imid;
	console.log(imid);
	i++;
}
function redundant() {
	
	for(var j=0;j<imarray.length;j++)
		ptext.innerHTML+=imarray[j]+',';
		console.log(imarray.length);
}
</script>
</head>
<body>
<button onclick="redundant()">Click</button>
	<p id="ptext"></p>

<?php 
$j=0;
for($i=20120; $i<21663; $i++) {
        $input[$j]=$i;
    	$filename="http://websismit.manipal.edu/websis/control/img/?imgId="."P".$input[$j];
    	$idname='p'+$input[$j];
?>
    	<img src="<?php echo $filename; ?>" onerror="imerr(<?php echo $input[$j];?>)" id="<?php echo $idname;?>"/>
    	<?php $j++; } ?>
    
    	?>
</body>
</html>
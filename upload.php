<?php

$targetdir = './uploads/';
$filename = $_FILES['file']['name'];
$targetfile = $targetdir.$filename;
$loads = shell_exec("sudo docker ps | wc -l");
$matched = preg_match('/[a-zA-Z0-9]{10}_2018\d{4}_[0-9]{1,2}.zip/', $filename, $matches);

if ($matched){
	
	if (file_exists($targetfile)){
		$newname = substr($filename,0,(strlen($filename)-4)); # get filename without suffix
		header("location:./log/$newname.txt");
	}
	
	elseif (intval($loads)>=9) {
		echo "<script> alert('System busy! Please try again later!') </script>";
		echo '<script> window.location.href = "./index.html"; </script>';
	}

	else {
		$flag = move_uploaded_file($_FILES['file']['tmp_name'], $targetfile);
		if ($flag){
			$newname = substr($filename,0,(strlen($filename)-4)); # get filename without suffix
			$output = shell_exec("sudo python run.py $targetfile > ./log/$newname.txt 2>&1 &");
		} else {
			echo "Upload failed! Please try again!";
		}
	}
	
} else {
	echo "<script> alert('Filename format incorrect! Please check and try again!') </script>";
	echo '<script> window.location.href = "./index.html"; </script>';
}
?>

<body bgcolor="#fbfaf8">
    <div class="main">
	
		<p>	Calculating results... </p>
		
		<p> <?php echo "Results for <a style='color:#ff5f20'> {$_FILES['file']['name']} </a> is:"; ?> </p>
		
		<p>	<?php echo "<a style='color:#ff5f20'> File uploaded successfully! Please check the leaderboard later.  </a>"; ?> </p>
		
		<p>	Ranking list may have been updated. Please remember to save your score.	</p>
		
		<p>	<a href='index.html' style='color:#ff5f20' align='center'><strong> Return to Ranking Page </strong></a>	</p>
		
    </div>
	
	<div class='header'><img src="./static/tbsi.png" height="auto" width="500px"/></div>
	<div class='footer'> Powered by kongyanye </div>
	
</body>

<style type="text/css">

	.main{
		text-align: left;
		border-radius: 10px;
		width: 450px;
		height: 450px;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%,-50%);
		font-size: 20;
		font-family: Georgia;
		background-color: #fbfaf8;
		padding:0 2em;
		border-style:solid;
		border-color:#7ea4ff;
		color: #ff5f20;
		color: #7ea4ff;
		color: black;
	}

	.header{
		position:fixed; 
		top:20px; 
		width:100%; 
		text-align:center;
	}
	
	.footer{
		position:fixed; 
		bottom:10px; 
		width:100%; 
		text-align:center;
	}

</style>
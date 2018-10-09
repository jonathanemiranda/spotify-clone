<?php include("inc/header.php");
if (isset($_GET['id'])) {
	$albumID = $_GET['id'];
}
else{
	header("Location: index.php");
}


$album = new Album($con, $albumID);
$artist = $album->getArtistName(); 

?>

<div class="entityInfo"> 
	<div class="leftSection">
		<img src="<?php echo $album->getArtwork();?>">
	</div>
	<div class="rightSection">
		<h2><?php echo $album->getTitle();?></h2>
		<p>by <?php echo $artist->getName();?></p>
		<p><?php echo $album->getSongCount();?> songs</p>
	</div>

</div>





<?php include("inc/footer.php");?>
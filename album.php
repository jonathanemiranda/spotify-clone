<?php include("inc/header.php");
if (isset($_GET['id'])) {
	$albumID = $_GET['id'];
}
else{
	header("Location: index.php");
}


$album = new Album($con, $albumID);

$artist = $album->getArtistName(); 

echo $album->getTitle() . "</br>";
echo $artist->getName();

?>







<?php include("inc/footer.php");?>
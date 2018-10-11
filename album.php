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
<div class="trackListContainer">
	<ul class="trackList">
		<?php
			$songIDArray = $album->getSongIDs();
			$i = 1; 
			foreach ($songIDArray as $songID) {
				$albumSong = new Song($con, $songID);
				$albumArtist = $albumSong->getArtistName();
				echo "<li class='trackListRow'> 
					<div class='trackCount'>
						<img class='play' src='inc/assets/img/icons/play-white.png'>
						<span class='trackNumber'>$i</span>
					</div>
					<div class='trackInfo'>
						<span class='trackName'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
					</div>
					<div class='trackOptions'>
						<img class='optionsButton' src='inc/assets/img/icons/more.png'>
					</div>
					<div class='trackDuration'>
						<span class='duration'>" . $albumSong->getDuration() . "</span>
					</div>
				</li>";
				$i++;
			}

		?>
	</ul>	
</div>




<?php include("inc/footer.php");?>
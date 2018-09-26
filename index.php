<?php include("inc/header.php");?>
					
<h1 class="pageHeadingBig">You Might Also Like</h1>
<div class="gridViewConatiner">
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 3");
		while ($row = mysqli_fetch_array($albumQuery)) {
			echo "<div class='gridViewItem'>
					<a href='album.php?id=" .$row['id'] . "'>
						<img src='" . $row['artwork_path'] . "'>
						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</a>
				</div>
			";


		}
	?>
</div>


<?php include("inc/footer.php");?>
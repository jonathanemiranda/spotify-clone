<?php
	/**
	 * 
	 */
	class Album{

		private $con;
		private $id;
		private $title;
		private $artistID;
		private $genreID;
		private $artworkPath;



		function __construct($con, $id)
		{
			$this->id = $id;
			$this->con = $con;
			$albumQuery = mysqli_query($this->con, "SELECT * FROM albums WHERE id = '$this->id'");
			$album = mysqli_fetch_array($albumQuery);

			$this->title = $album['title'];
			$this->artistID = $album['artist_id'];
			$this->genreID = $album['genre_id'];
			$this->artworkPath = $album['artwork_path'];
		}

		public function getTitle(){
			return $this->title;
		}

		public function getArtistName(){
			return new Artist($this->con, $this->artistID);
		}

		public function getGenre(){
			return $this->genreID;
		}

		public function getArtwork(){
			return $this->artworkPath;
		}

	}


?>
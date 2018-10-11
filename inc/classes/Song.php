<?php
	/**
	 * 
	 */
	class Song{

		private $con;
		private $id;
		private $mysqliData;
		private $title;
		private $artistID;
		private $albumID;
		private $genreID;
		private $duration;
		private $path;



		function __construct($con, $id)
		{
			$this->id = $id;
			$this->con = $con;
			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id = '$this->id'");
			$this->mysqliData = mysqli_fetch_array($query);
			$this->title = $this->mysqliData['title'];
			$this->artistID = $this->mysqliData['artist_id'];
			$this->albumID = $this->mysqliData['album_id'];
			$this->genreID = $this->mysqliData['genre_id'];
			$this->duration = $this->mysqliData['duration'];
			$this->path = $this->mysqliData['path'];

		}

		public function getTitle(){
			return $this->title;
		}

		public function getArtistName(){
			return new Artist($this->con, $this->artistID);
		}

		public function getAlbumName(){
			return new Album($this->con, $this->albumID);
		}

		public function getGenre(){
			return $this->genreID;
		}

		public function getDuration(){
			return $this->duration;
		}

		public function getPath(){
			return $this->path;
		}


	}


?>
<?php

class Counter {

	public $url = null; //URL stub user is on

	public $hitCount = null; //Count for pre/post visit record
	public $newCount = null; //Count for pre/post visit record

	public function __construct() {

		$url = $_SERVER['REQUEST_URI'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sqlCount = "SELECT count FROM page_views WHERE page = '" . $url . "'";
		$st = $conn->prepare( $sqlCount );
		$st->execute();
		$hitCount = $st->fetch();
		if (empty($hitCount)) {
			//if $hitcount is null, we's gonna do shit
			$sqlCreate = "INSERT INTO page_views VALUES(1,'" . $url . "')";
			// INSERT INTO page_views VALUES(0,'index.php')
			$st = $conn->prepare( $sqlCreate );
			$st->execute();
			echo "1";
		} else {
			$newCount = $hitCount['count'] + 1;
			$sqlUpdate = "UPDATE page_views SET count = " . $newCount . " WHERE page = '" . $url . "'"; 	
			$st = $conn->prepare( $sqlUpdate );
			$st->execute();
			echo $newCount;
		}
		$conn = null;
	}

}

?>

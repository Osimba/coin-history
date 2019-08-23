<?php
include('Dbh.class.php');

class LA extends Dbh {

	public function getAllCoins() {

		$conn = $this->connect();
		$coinRow = array();

		//Pull data from database
		try {

			$stmt = $conn->prepare("SELECT * FROM la_class");
			$stmt->execute();


			while($row = $stmt->fetch()) {

				$coinRow['era'] = $row['era'];
				$coinRow['civilization'] = $row['civilization'];
				$coinRow['time_issued'] = $row['time_issued'];
				$coinRow['BC'] = $row['BC'];
				$coinRow['metal_composition'] = $row['metal_composition'];
				$coinRow['denomination'] = $row['denomination'];
				$coinRow['historical_event'] = $row['historical_event'];
				$coinRow['ruler'] = $row['ruler'];
				$coinRow['image'] = $row['image'];
				
				return $coinRow;
			}
			
			
		} catch (Exception $e) {
			echo "Unable to get data from database: " . $e->getMessage();
		}
	}


	
}
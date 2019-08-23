<?php
require_once('Dbh.class.php');

class Ancient extends Dbh {

	public function getAllCoins() {

		$conn = $this->connect();
		$coinRow = array();

		//Pull data from database
		try {

			$stmt = $conn->prepare("SELECT * FROM ancient_class");
			$stmt->execute();

			$i = 0;


			while($row = $stmt->fetch()) {

				$coinRow[$i]['era'] = $row['era'];
				$coinRow[$i]['civilization'] = $row['civilization'];
				$coinRow[$i]['time_issued'] = $row['time_issued'];
				$coinRow[$i]['metal_composition'] = $row['metal_composition'];
				$coinRow[$i]['denomination'] = $row['denomination'];
				$coinRow[$i]['historical_event'] = $row['historical_event'];
				$coinRow[$i]['ruler'] = $row['ruler'];
				$coinRow[$i]['image'] = $row['image'];
				//$coinRow[$i]['image_front'] = $row['image_front'];
				//$coinRow[$i]['image_back'] = $row['image_back'];
				
				$i++;
			}

			return $coinRow;
			
			
		} catch (Exception $e) {
			echo "Unable to get data from database: " . $e->getMessage();
		}
	}



	public function getCoinCol($column) {

		$conn = $this->connect();
		$coinRow = array();

		try {
			
			$stmt = $conn->prepare("SELECT DISTINCT " . $column . " FROM ancient_class ORDER BY " . $column);
			$stmt->execute();

			$i = 0;

			while($row = $stmt->fetch()) {

				$coinRow[$i][$column] = $row[$column];

				$i++;
				
			}
			return $coinRow;
			
		} catch (Exception $e) {
			echo "Unable to get data from database: " . $e->getMessage();
		}
	}

	public function queryCoins($sql) {

		$conn = $this->connect();
		$coinRow = array();

		try {

			$stmt = $conn->prepare($sql);
			$stmt->execute();

			$i = 0;

			while($row = $stmt->fetch()) {

				$coinRow[$i]['era'] = $row['era'];
				$coinRow[$i]['civilization'] = $row['civilization'];
				$coinRow[$i]['time_issued'] = $row['time_issued'];
				$coinRow[$i]['metal_composition'] = $row['metal_composition'];
				$coinRow[$i]['denomination'] = $row['denomination'];
				$coinRow[$i]['historical_event'] = $row['historical_event'];
				$coinRow[$i]['ruler'] = $row['ruler'];
				$coinRow[$i]['image'] = $row['image'];

				$i++;
				
			}
			if ($coinRow != null) 
				return $coinRow;
			else return;
			
		} catch (Exception $e) {
			echo "Unable to get data from database: " . $e->getMessage();
		}
	}

	

	
}
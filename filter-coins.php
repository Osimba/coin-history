<?php
	include_once('includes/Ancient.class.php');
      
	$ancientObj = new Ancient;



	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$results = array();

		$sql = "SELECT * FROM ancient_class WHERE era !=''";

		if(isset($_POST['era'])) {
			$era = implode("','", $_POST['era']);
			$sql .= "AND era IN('" . $era . "')";
		}
		if(isset($_POST['civilization'])) {
			$civilization = implode("','", $_POST['civilization']);
			$sql .= "AND civilization IN('" . $civilization . "')";
		}
		if(isset($_POST['time_issued'])) {
			$time_issued = implode("','", $_POST['time_issued']);
			$sql .= "AND time_issued IN('" . $time_issued . "')";
		}
		if(isset($_POST['metal_composition'])) {
			$metal_composition = implode("','", $_POST['metal_composition']);
			$sql .= "AND metal_composition IN('" . $metal_composition . "')";
		}
		if(isset($_POST['denomination'])) {
			$denomination = implode("','", $_POST['denomination']);
			$sql .= "AND denomination IN('" . $denomination . "')";
		}
		if(isset($_POST['historical_event'])) {
			$historical_event = implode("','", $_POST['historical_event']);
			$sql .= "AND historical_event IN('" . $historical_event . "')";
		}
		if(isset($_POST['ruler'])) {
			$ruler = implode("','", $_POST['ruler']);
			$sql .= "AND ruler IN('" . $ruler . "')";
		}

		$results = $ancientObj->queryCoins($sql);
		$output = '';

		if(empty($results)) $results = array();

		if(count($results) > 0) {
			foreach($results as $row) {
			$output .= '<div class="col-md-4 mb-2">
							<div class="card-deck">
								<div class="card border-secondary">
									<img src="' . $row['image'] . '" class="card-img-top">
									<div class="card-body">
										<p class="cart-title"><strong>Era: </strong>' . $row['era'] . '</p>
										<p class="cart-title"><strong>Civilization: </strong>' . $row['civilization'] . '</p>
										<p class="cart-title"><strong>Time Issued: </strong>' . $row['time_issued'] . '</p>
										<p class="cart-title"><strong>Metal Composition: </strong>' . $row['metal_composition'] . '</p>
										<p class="cart-title"><strong>Denomination: </strong>' . $row['denomination'] . '</p>
										<p class="cart-title"><strong>Historical Event: </strong>' . $row['historical_event'] . '</p>
										<p class="cart-title"><strong>Ruler: </strong>' . $row['ruler'] . '</p>

									</div>	
								</div>
							</div>	
						</div>';
			}
		} else {
			$output = "<h3>No Coins were found.</h3>";
		}

		echo $output;

	} 



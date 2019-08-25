<?php
	include('includes/Dbh.class.php');
	include('includes/Ancient.class.php');

	$ancientObj = new Ancient;

	
	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!--CSS Style Sheets -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

	<main id="coin_filter_page" class="container">
		<h1>Coins and History</h1>

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					<h5>Filter Coins</h5>
					<hr>
					<h6 class="text-info">Select Era</h6>
					<ul class="list-group">
						<?php /* Get filter items for each category depending on what is listed in the database*/
						 	$result = $ancientObj->getCoinCol('era');
						 	foreach($result as $row => $value) {
						?>

						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input coin_check" value="<?= $value['era']; ?>" id="era"><?= $value['era']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>

					<h6 class="text-info">Select Civilization</h6>
					<ul class="list-group">
						<?php
						 	$result = $ancientObj->getCoinCol('civilization');
						 	foreach($result as $row => $value) {
						?>

						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input coin_check" value="<?= $value['civilization']; ?>" id="civilization"><?= $value['civilization']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>



					<h6 class="text-info">Select Time Issued</h6>
					<ul class="list-group">
						<?php
						 	$result = $ancientObj->getCoinCol('time_issued');
						 	foreach($result as $row => $value) {
						?>

						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input coin_check" value="<?= $value['time_issued']; ?>" id="time_issued"><?= $value['time_issued']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>

					<h6 class="text-info">Select Metal Composition</h6>
					<ul class="list-group">
						<?php
						 	$result = $ancientObj->getCoinCol('metal_composition');
						 	foreach($result as $row => $value) {
						?>

						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input coin_check" value="<?= $value['metal_composition']; ?>" id="metal_composition"><?= $value['metal_composition']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>

					<h6 class="text-info">Select Denomination</h6>
					<ul class="list-group">
						<?php
						 	$result = $ancientObj->getCoinCol('denomination');
						 	foreach($result as $row => $value) {
						?>

						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input coin_check" value="<?= $value['denomination']; ?>" id="denomination"><?= $value['denomination']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>


					<h6 class="text-info">Select Historical Event</h6>
					<ul class="list-group">
						<?php
						 	$result = $ancientObj->getCoinCol('historical_event');
						 	foreach($result as $row => $value) {
						?>

						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input coin_check" value="<?= $value['historical_event']; ?>" id="historical_event"><?= $value['historical_event']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>

					<h6 class="text-info">Select Ruler</h6>
					<ul class="list-group">
						<?php
						 	$result = $ancientObj->getCoinCol('ruler');
						 	foreach($result as $row=>$value) {
						?>

						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input coin_check" value="<?= $value['ruler']; ?>" id="ruler"><?= $value['ruler']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>



				</div>
				<div class="col-lg-9">
					<h5 class="text-center" id="textChange">Coin List</h5>
					<hr>
					<div class="text-center">
						<img src="images/loader.gif" id="loader" width="200px" style="display: none;">
					</div>
					<div class="row" id="result">
						
						<?php 
							$coinResults = $ancientObj->getAllCoins();
							foreach($coinResults as $coinRow) {
						?>

						<div class="col-md-4 mb-2">
							<div class="card-deck">
								<div class="card border-secondary">
									<img src="<?= $coinRow['image']; ?>" class="card-img-top">
									<div class="card-body">
										<p class="cart-title"><strong>Era:</strong> <?= $coinRow['era']; ?></p>
										<p class="cart-title"><strong>Civilization:</strong> <?= $coinRow['civilization']; ?></p>
										<p class="cart-title"><strong>Time Issued:</strong> <?= $coinRow['time_issued']; ?></p>
										<p class="cart-title"><strong>Metal Composition:</strong> <?= $coinRow['metal_composition']; ?></p>
										<p class="cart-title"><strong>Denomination:</strong> <?= $coinRow['denomination']; ?></p>
										<p class="cart-title"><strong>Historical Event:</strong> <?= $coinRow['historical_event']; ?></p>
										<p class="cart-title"><strong>Ruler:</strong> <?= $coinRow['ruler']; ?></p>

									</div>	
								</div>
							</div>	
						</div>
								
						<?php } ?>
					</div>
					

				</div>		
			</div>
		</div>

		

	</main>



		
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// object will contain all the checked categories
			var coinFilterInfo = {era: [], civilization: [], time_issued: [], metal_composition: [], denomination: [], historical_event: [], ruler: []};

			$(".coin_check:checked").each(function() {
				getChecked(this);
				$("#loader").show();

			});

			$(".coin_check").change(function() {
				getChecked(this);    
			});

			/**
			 * Param: item - represents the clicked element
			 * Checked if the clicked category has been checked
			 * If checked, will add it to the array of categories to filter for
			 * If it is unchecked, will remove it from the array
			 */

			function getChecked(item) {

				var value = $(item).val();
    			var id = $(item).attr('id');

    			if(item.checked) {
    	
			    	if(coinFilterInfo[id].indexOf(value) === -1) {
			    		coinFilterInfo[id].push(value);
			    	}
			    } else {
			    	var i = coinFilterInfo[id].indexOf(value);
			    	if(i != -1) {
			    		coinFilterInfo[id].splice(i, 1);
			    	}
			    }

			    // Sends the data using AJAX POST method
			    $.ajax({
					method: "POST",
					url: "filter-coins.php",
					data: {
							era: coinFilterInfo['era'],
							civilization: coinFilterInfo['civilization'],
							time_issued: coinFilterInfo['time_issued'],
							metal_composition: coinFilterInfo['metal_composition'],
							denomination: coinFilterInfo['denomination'],
							historical_event: coinFilterInfo['historical_event'],
							ruler: coinFilterInfo['ruler']
				       		},
					success: function(response) {
						$("#result").html(response);
						$("#loader").hide();

					}
				});

			}


		
		});
	</script>
	<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


<?php
function sumup($amount){
	$sum = 0;
	for($i = 0; $i <= $amount;$i++){
		$sum += $i;
	}	
	return $sum;
}
?>
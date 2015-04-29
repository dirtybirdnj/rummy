<?php
include_once('deck.php');
include_once('rummy.php');
	
if($_POST){

	if($_POST['action'] == 'newgame'){
		
		$game = new rummy();		
		$deck = $game->dealCards();
		outputJSON($deck);
		
		
	}

} else {
	
	echo "<pre>";	
	$game = new rummy();
	
	$deck = $game->dealCards();
	
	var_dump($deck);	
	echo "</pre>";	
	
}

function outputJSON($data){

	header('Content-Type: application/json');
	echo json_encode($data);	
	
	
}
?>
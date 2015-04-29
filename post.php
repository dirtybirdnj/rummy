<?php
include_once('deck.php');
include_once('rummy.php');
	
if($_POST){

	if($_POST['action'] == 'newgame'){
		
		
		
	}

}
	
echo "<pre>";	
$game = new rummy();

$deck = $game->dealCards();

var_dump($deck);	
echo "</pre>";	



?>
<?php
include_once('deck.php');
include_once('rummy.php');
	
if($_POST){
	
	session_start();

	if($_POST['action'] == 'newgame'){
		
		$game = new rummy();		
		$deck = $game->dealCards();
		
		$_SESSION['discard'] = $deck['discard'];
		$_SESSION['stack'] = $deck['stack'];		
		$_SESSION['p1'] = $deck['p1'];		
		$_SESSION['p2'] = $deck['p2'];				

		outputJSON($deck);
			
	}
	
	if($_POST['action'] == 'discard'){
		
		$player = $_POST['player'];
		$card = $_POST['card'];
		$hand = $_SESSION[$player];
		$discard = $_SESSION['discard'];
		$stack = $_SESSION['stack'];
		
		//Add the card to the top of the discard pile
		array_unshift($discard,$card);
				
		//Remove card from players hand
		foreach($hand as $key => $val){ if($val == $card) unset($hand[$key]); }
		
		unset($hand[$card]);
		
		//Take the top stack card, put in players hand
		$new_card = array_shift($stack);
		$hand[] = $new_card;
		
		//Re-sort hand
		$game = new rummy();
		$sorted_hand = $game->sortHand($hand);
		
		//If the stack is empty, add the discard pile back in
		if(count($stack) == 0){
			
			//Not sure if shuffling the deck is necessary here... but we can so why not?
			$stack = $game->shuffleDeck($discard);
			$discard = array();
			
		}
		
		$_SESSION['discard'] = $discard;
		$_SESSION['stack'] = $stack;
		$_SESSION[$player] = $hand;
		
		
		$output['hand'] = $sorted_hand;
		$output['threeOfAKind'] = $game->detectThreeOfAKind($sorted_hand);
		$output['fourCardRun'] = $game->detectFourCardRun($sorted_hand);
		
		outputJSON($output);
		
	}

} else {
	
	echo "<pre>";	
	$game = new rummy();
	
	//$deck = $game->dealCards();
	//var_dump($deck);	
	
	//Testing out 3 of a kind detecting
	//$hand = array('AD','AC','AH','2C','3D','JC','2D');
	
	//Testing out 4 card run detection
	//$hand = array('AD','2D','3D','4D','JC','QC','KD');
	//$hand = array('AD','2D','3D','4D','5D','QC','KD');	
	$hand = array('AD','2D','3D','4D','5D','6D','KD');	

	
	var_dump($game->sortHand($hand));
	
	echo "</pre>";	
	
}

function outputJSON($data){

	header('Content-Type: application/json');
	echo json_encode($data);	
	
	
}
?>
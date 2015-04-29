<?php

class deck {
	
	public $num_cards = 52;
	public $suits = array('H','D','C','S');
	public $faces = array('A','2','3','4','5','6','7','8','9','10','J','Q','K');	

	public function generateDeck(){
		
		$deck = array();
		
		foreach($this->faces as $face){
			
			foreach($this->suits as $suit){
				
				$card = "$face$suit";
				$deck[] = $card;
				
			}			
			
		}
		
		return $deck;
		
	}
		
	//shuffling functionality broken out into its own function so that more advanced shuffling can be
	//implemented if necessary
	public function shuffleDeck($deck){
		
		shuffle($deck);
		return $deck;
		
	}	
	
	
	
}
	
?>
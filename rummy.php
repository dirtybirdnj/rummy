<?php
	
class rummy extends deck{

	public function dealCards(){
		
		$rummy = new deck;
		$unshuffled_deck = $rummy->generateDeck();	
		$deck = $rummy->shuffleDeck($unshuffled_deck);
		
		$p1_cards = array();
		$p2_cards = array();
		$stack = array();
		$discard = array();
		
		$i = 1;
		foreach($deck as $card){
				
			if(count($p1_cards) >= 7 && count($p2_cards >= 7)){

				if(count($stack) < 37){ $stack[] = $card; }
				else { $discard[] = $card; }
				
			} else {
				
				if($i % 2 == 0){ $p1_cards[] = $card; }
				else{ $p2_cards[] = $card; }				
				
			}
				
			$i = $i + 1;

			
		}
		
		$shuffled_cards['p1'] = $p1_cards;
		$shuffled_cards['p2'] = $p2_cards;
		$shuffled_cards['discard'] = $discard;
		$shuffled_cards['stack'] = $stack;		
		
		return $shuffled_cards;
		
	}
	
	
}	

	
?>	
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
		
		$i = 0;
		foreach($deck as $card){
		
			while(count($p1_cards) < 6 && count($p2_cards) < 6){
				//if(count($p1_cards) <= 7){ $p1_cards[] = $card; }
				if($i % 2 == 0){ $p1_cards[] = $card; }
				else{ $p2_cards[] = $card; }
				
			}
		
			if(count($p1_cards) == 7 && count($p2_cards == 7)){
				
				if(count($discard) + count($p1_cards) + count($p2_cards) == 51){ $discard[] = $card; } 
				else { $stack[] = $card; }
				
			}
				
			$i = $i + 1;

			
		}
		
		$shuffled_cards['p1'] = $p1_cards;
		$shuffled_cards['p2'] = $p2_cards;		
		
		return $shuffled_cards;
		
	}
	
	
}	

	
?>	
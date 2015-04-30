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
		
		$shuffled_cards['p1'] = $this->sortHand($p1_cards);
		$shuffled_cards['p2'] = $p2_cards;
		$shuffled_cards['discard'] = $discard;
		$shuffled_cards['stack'] = $stack;		
		
		return $shuffled_cards;
		
	}
	
	public function sortHand($cards){
		
		$hearts = array();
		$clubs = array();
		$diamonds = array();
		$spades = array();
		
		$hand = array();
		
		//sort cards by face
		foreach($cards as $card){

			//$suit = substr($card,1,1);
			preg_match('/(((?:[1]?)(?:[0-9,J,Q,K,A]))([H,C,D,S]{1}))/',$card,$cardValues);
			
			
			//var_dump($card);
			//var_dump($suit);
			//var_dump($cardValues);
		
			if($cardValues[3] == 'H') $hearts[] = $card;
			if($cardValues[3] == 'C') $clubs[] = $card;
			if($cardValues[3] == 'D') $diamonds[] = $card;			
			if($cardValues[3] == 'S') $spades[] = $card;

		}
		
		//$hand[] = $hearts;
		//$hand[] = $clubs;
		//$hand[] = $diamonds;
		//$hand[] = $spades;
		
		$hand = array_merge($hearts,$clubs,$diamonds,$spades);
		
		$orderedHand = $this->orderFaceCards($hand);
		
		return $orderedHand;						
		
		
		
	}
	
	private function orderFaceCards($cards){
		
		sort($cards);
		
		
		return $cards;
		
	}
	
	
}	

	
?>	
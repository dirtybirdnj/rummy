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
		$shuffled_cards['p2'] = $this->sortHand($p2_cards);
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

			$cardValues = $this->getCardValues($card);
			
			if(count($cardValues)  > 0){

				if($cardValues[3] == 'H') $hearts[] = $card;
				if($cardValues[3] == 'C') $clubs[] = $card;
				if($cardValues[3] == 'D') $diamonds[] = $card;			
				if($cardValues[3] == 'S') $spades[] = $card;

			}

		}
		
		//Make sure aces are first in each card order

		$hearts = $this->orderFaceCards($hearts);		
		$clubs = $this->orderFaceCards($clubs);
		$diamonds = $this->orderFaceCards($diamonds);		
		$spades = $this->orderFaceCards($spades);		
		$hand = array_merge($hearts,$clubs,$diamonds,$spades);
		
		return $hand;						
		
			
	}
	
	
	private function getCardValues($card){

		//0 - Full Card Value
		//1 - Card Number 
		//2 - Card Suit

		preg_match('/(((?:[1]?)(?:[0-9,J,Q,K,A]))([H,C,D,S]{1}))/',$card,$values);		
		return $values;
			
	}
		
	private function orderFaceCards($cards){
		
		$sortCards = array();
		$ace = false;
		$jack = false;
		$queen = false;
		$king = false;
		
		foreach($cards as $card){
						
			$cardValues = $this->getCardValues($card);
			if($cardValues[2] == 'A'){ $ace = $card; }			
			else if($cardValues[2] == 'J'){ $jack = $card; }
			else if($cardValues[2] == 'Q'){ $queen = $card; }		
			else if($cardValues[2] == 'K'){ $king = $card; }
			else { $sortCards[] = $card; }
			
		}
		
		//"Natural" sort... very useful here!
		natsort($sortCards);
		
		if($ace) array_unshift($sortCards,$ace);
		if($jack) $sortCards[] = $jack;
		if($queen) $sortCards[] = $queen;		
		if($king) $sortCards[] = $king;	
		
		
		//After cards have been ordered, search for victory conditions
		//$cardSequence = $this->getCardSequence($sortCards);
		//var_dump($cardSequence);			
		
		return $sortCards;
		
	}
	
	private function detectThreeOfAKind($hand){
		
		
	}
	
	private function detectFourCardRun($hand){
		
		
	}
	
	//Returns an array of integer values that correspond to the order of a deck
	private function getCardSequence($hand){
		
		$deckOrder = array(
			'A' => 0,
			'2' => 1,
			'3' => 2,
			'4' => 3,
			'5' => 4,
			'6' => 5,
			'7' => 6,
			'8' => 7,
			'9' => 8,
			'10' => 9,
			'J' => 10,
			'Q' => 11,
			'K' => 12,
			
		);
		
		$handOrder = array();
		
		foreach($hand as $card){ 
		
			$cardVals = $this->getCardValues($card);			
			$handOrder[] = $deckOrder[$cardVals[2]];
			
		}
		
		return $handOrder;
		
	}
	
	
}	

	
?>	
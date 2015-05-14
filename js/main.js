var root = location.protocol + '//' + location.host + '/rummy/';

var stack = Array();
var discard = Array();
var p1Hand = Array();
var p2Hand = Array();

var activePlayer = 'p1';


$(function() {
       
    $('#startGame').click(function(){ startGame(); });
    
	$('.playerHand').on('click', '.btnDiscard',function(event){

		var player = $(event.target).closest('.playerHand').attr('data-player');
		var card = $(event.target).parent().attr('data-card');
		$('#' + activePlayer + 'Cards btnDiscard');
		discardCard(player,card);		
    
	});	    
    
});



function startGame(){
		
	var url = root + 'post.php';
	
	//console.log(url);
	
	$.post(url,{ action: "newgame"},"json").done(function(data){
		
		$('#startGameControls').slideUp();
		displayNewGame(data);
				
		$('#p2Indicator').toggleClass('indicatorFaded');
		$('#p2Cards .btn').prop('disabled','disabled');
		$('#cardDisplay').slideDown();
		
	}).fail(function(data){
		
		console.log('error');
		console.log(data);
		
	});
	
}

function displayNewGame(data){
	
	$('#p1Cards').empty();
	$('#p2Cards').empty();	
	
	displayHand('p1',data.p1);
	displayHand('p2',data.p2);
	
	$('#discardPile').html(displayCard(data.discard[0],false));
	
	p1Hand = data.p1;
	p2Hand = data.p2;	
	discard = data.discard;
	stack = data.stack;
	
}

function displayHand(player,hand){
	
	//$('#' + player + 'Cards').empty();
	$.each(hand,function(index,card){ $('#' + player + 'Cards').append(displayCard(card,true)); });	

}


//Removes a card from the players hand and places it in discard, makes a POST request to get the next card in the stack
function discardCard(player,card){
		
	url = root + 'post.php';
	$.post(url,{'action' : 'discard','player' : player, 'card': card},function(data){
	
		removeDisplayCards(player);		
		displayHand(player,data.hand);
		$('#discardPile').html(displayCard(card,false));
		toggleActivePlayer();		

		
		
	}).fail(function(data){
		
		console.log('error');
		console.log(data);
		
	});
	
}

function displayCard(card,discardBtn){
	
	//console.log(card);
	
	//http://en.wikipedia.org/wiki/Suit_(cards)
	//♥ U+2665 (&hearts;)	♦ U+2666 (&diams;)	♣ U+2663 (&clubs;)	♠ U+2660 (&spades;)
	
	//Set Card Display Color
	var suit = card.substr(card.length -1);
	var card_color = '';
	if(suit == 'H' || suit == 'D'){ 
		
		card_color = 'red'; 
		if(suit == 'H') card_display = card.replace('H','&hearts;');
		else var card_display = card.replace('D','&diams;');	
	
	} else { 
	
		card_color = 'black'; 
		if(suit == 'C') var card_display = card.replace('C','&clubs;');
		else var card_display = card.replace('S','&spades;');			
	
	}
	
	//Replace text face indicator with Unicode Symbols

	var output = '<div class="cardContainer" data-card="' + card + '"><p class="card ' + card_color + '">' + card_display + '</p>';
	if(discardBtn) output += '<input class="btnDiscard btn" value="Discard">';	
	output+= '</div>';
	
	return output;
	
}

function removeDisplayCards(player){
	
	$('#' + player + 'Cards').html('');
	
}



function toggleActivePlayer(){

	//Deactivate current player buttons
	$('#' + activePlayer + 'Cards .btnDiscard').prop('disabled',true);
	
	if(activePlayer == 'p1') { activePlayer = 'p2'; }
	else { activePlayer = 'p1'; };

	//Activate newly active player buttons
	$('#' + activePlayer + 'Cards .btnDiscard').prop('disabled',false);
	
	$('#p1Indicator').toggleClass('indicatorFaded');
	$('#p2Indicator').toggleClass('indicatorFaded');		
	
}

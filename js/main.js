var root = location.protocol + '//' + location.host + '/rummy/challenge-mat-gilbert/';

var stack = Array();
var discard = Array();
var p1Hand = Array();
var p2Hand = Array();

$(function() {
       
    $('#startGame').click(function(){ startGame(); });
    
});

function discardCard(player,card){
	
	
}

function startGame(){
		
	var url = root + 'post.php';
	
	//console.log(url);
	
	$.post(url,{ action: "newgame"},"json").done(function(data){
		
		$('#startGameControls').slideUp();
		displayNewGame(data);
				
		$('#p2Indicator').toggleClass('indicatorFaded');
		$('#p2Cards .btn').attr('disabled','disabled');
		$('#cardDisplay').slideDown();
		
		$('.btnDiscard').on("click",function(event){
		   
		   	console.log('discard'); 
		    
		});		
		
	}).fail(function(data){
		
		console.log('error');
		console.log(data);
		
	});
	
}

//Removes a card from the players hand and places it in discard, makes a POST request to get the next card in the stack
function discardCard(player,card){
	
	
	
}

function displayHand(player,hand){
	
	//$.each(hand,function(index,card){ $('#p' + player + 'Cards').append('<div class="cardContainer" data-card="' + card + '"><p class="card">' + card + '</p><input class="btnDiscard btn" value="Discard"></div>'); });
	$.each(hand,function(index,card){ $('#p' + player + 'Cards').append(displayCard(card)); });	


	
}

function displayCard(card){
	
	//http://en.wikipedia.org/wiki/Suit_(cards)
	//♥ U+2665 (&hearts;)	♦ U+2666 (&diams;)	♣ U+2663 (&clubs;)	♠ U+2660 (&spades;)
	
	//Set Card Display Color
	var suit = card.substr(card.length -1);
	var card_color = '';
	if(suit == 'H' || suit == 'D'){ 

		console.log('red suit');
		
		card_color = 'red'; 
		if(suit == 'H') card_display = card.replace('H','&hearts;');
		else var card_display = card.replace('D','&diams;');	
	
	} else { 
	
		card_color = 'black'; 
		if(suit == 'C') var card_display = card.replace('C','&clubs;');
		else var card_display = card.replace('S','&spades;');			
	
	}
	
	//Replace text face indicator with Unicode Symbols

	
	var output = '<div class="cardContainer" data-card="' + card + '"><p class="card ' + card_color + '">' + card_display + '</p><input class="btnDiscard btn" value="Discard"></div>';
	
	return output;
	
}


function displayNewGame(data){
	
	$('#p1Cards').empty();
	$('#p2Cards').empty();	
	
	displayHand(1,data.p1);
	displayHand(2,data.p2);
	
	p1Hand = data.p1;
	p2Hand = data.p2;	
	discard = data.discard;
	stack = data.stack;
	
}
var root = location.protocol + '//' + location.host + '/rummy/challenge-mat-gilbert/';

var stack = Array();
var discard = Array();
var p1Hand = Array();
var p2Hand = Array();

$(function() {
       
    $('#startGame').click(function(){ startGame(); });
    
    $('.cardContainer .btn').click(function(event){
	   
	    
	    
    });
    
});

function startGame(){
		
	var url = root + 'post.php';
	
	console.log(url);
	
	$.post(url,{ action: "newgame"},"json").done(function(data){
		
		$('#startGameControls').slideUp();
		displayNewGame(data);
		
		$('#p2Indicator').toggleClass('indicatorFaded');
		$('#p2Cards .btn').attr('disabled','disabled');
		$('#cardDisplay').slideDown();
		
	}).fail(function(data){
		
		console.log('error');
		console.log(data);
		
	});
	
}

function displayHand(player,hand){
	
	$.each(hand,function(index,card){ $('#p' + player + 'Cards').append('<div class="cardContainer" data-card="' + card + '"><p class="card">' + card + '</p><input class="btnDiscard btn btn-primary" value="Discard"></div>'); });	
	
}


function displayNewGame(data){
	
	$('#p1Cards').empty();
	$('#p2Cards').empty();	
	
	console.log('displaying new game');
	console.log(data);
	
	displayHand(1,data.p1);
	displayHand(2,data.p2);
	
	p1Hand = data.p1;
	p2Hand = data.p2;	
	discard = data.discard;
	stack = data.stack;
	
}
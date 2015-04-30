var root = location.protocol + '//' + location.host + '/rummy/challenge-mat-gilbert/';

$(function() {
       
    $('#startGame').click(function(){ startGame(); });
    
    
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


function displayNewGame(data){
	
	$('#p1Cards').empty();
	$('#p2Cards').empty();	
	
	console.log('displaying new game');
	console.log(data);
	
	$.each(data.p1,function(index,card){ $('#p1Cards').append('<div class="cardContainer" data-card="' + card + '"><p class="card">' + card + '</p><input class="btnDiscard btn btn-primary" value="Discard"></div>'); });
	$.each(data.p2,function(index,card){ $('#p2Cards').append('<div class="cardContainer" data-card="' + card + '"><p class="card">' + card + '</p><input class="btnDiscard btn btn-primary" value="Discard"></div>'); });
	
}
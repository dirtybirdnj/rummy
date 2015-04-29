var root = location.protocol + '//' + location.host + '/rummy/challenge-mat-gilbert/';

$(function() {
       
    $('#startGame').click(function(){ startGame(); });
    
    
});

function startGame(){
		
	var url = root + 'post.php';
	
	console.log(url);
	
	$.post(url,{ action: "newgame"},"json").done(function(data){
		
		displayNewGame(data);
		
	}).fail(function(data){
		
		console.log('error');
		console.log(data);
		
	});
	
}

function displayNewGame(data){
	
	$('#p1_cards').empty();
	$('#p2_cards').empty();	
	
	console.log('displaying new game');
	console.log(data);
	
	$.each(data.p1,function(index,card){ $('#p1_cards').append('<p class="card">' + card + '</p>'); });
	$.each(data.p2,function(index,card){ $('#p2_cards').append('<p class="card">' + card + '</p>'); });
	
}
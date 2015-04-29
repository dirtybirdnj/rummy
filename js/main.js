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
	
	console.log('displaying new game');
	console.log(data);
	
}
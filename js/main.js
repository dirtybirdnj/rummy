var root = location.protocol + '//' + location.host + '/rummy/challenge-mat-gilbert/';

$(function() {
   
   	alert(root);
   
    console.log( "ready!" );
    
    $('#startGame').click(function(){ startGame(); });
    
    
});

function startGame(){
	var url = root + 'post.php';
	$.post(url,{'action' : 'newgame'},function(data){
		
		displayNewGame(data);
		
	},'json');
	
}

function displayNewGame(data){
	
	console.log(data);
	
}
// setTimeout(function () {
// 	$('#image').css('height', '800px');
// }, 3000);

var name="Aizada";
var email ="";



var car = {
	"color": "green",
	"volume" : 12,
	"engine": "V16",
	"sum": function(){
		console.log(4*5);
	}

}

 $('document').ready(function(){

 	
	$('#last-posts-button').click(function(event){
		event.preventDefault();
		$('#last-posts-body').toggle();
		console.log(clicked);
		


	});

 });

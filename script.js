
	$(document).ready(function(){
	
	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 20) {
			$('#return-to-top').fadeIn(200);
		} else {
			$('#return-to-top').fadeOut(200);
		}
	});
	
	$('#return-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	$('#loggin-button').click(function(e){
		e.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();

		$.ajax({

			method : POST,
			url : "ajax.php",
			data : {
					 "email" : email,
					 "password" : password
			},
			success : function(response){


			}

		}).fail( function(xhr)){
			console.log(xhr.responseText);
		});

	});

});



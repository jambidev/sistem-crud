$(document).ready(function () {
	$('.questions').scrollTop($('.last').offset().top);	// when document is loaded .questions scrolls to the end
	$('.questions').scrollTo($('.question:first-child'), 500, {margin : true}); // it scrolls to top to show that a lot of questions exists 
	$('.no').click(function () { // when no button clicks
		var $t = $(this), 
		    $scrollElm = $t.parent().parent().next(); // gets the parent next element
		$('.questions').scrollTo($scrollElm, 500, {margin:true} ); // scroll .question to the parent next element
	} )
	$('.yes').click(function () { // when yes button is clicked
		var $t = $(this);
		var data = $t.parent().parent().attr('data-ans'); // gets the answer text
		var ans = data.split('||'); // split them to three pieces ans[0]=url & ans[1]=button text & ans[2]=description
		$('.last').find('.q').html(ans[2]); //replace .last text with the answer description provided
		$('#target').children('a').attr('href', ans[0]).html(ans[1]); // set the answer provided link
		$('.home').fadeOut(500); // hide deflut "go to home page" button
		$('.hidden').fadeIn(500);	//fade in hidden ones (created answer elements )
		$('.questions').scrollTo($('.last'), 500, {margin: true}); // scroll the .questions to the last item
	});
	$('.top').click(function () { // scrolls .questions to top
		var $p = $('.questions .question:first-child');
		$('.questions').scrollTo($p, 500, {margin:true});
	})
});
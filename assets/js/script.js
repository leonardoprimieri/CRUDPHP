$(function(){

	$('.modal_ajax').on('click', function(e){
		e.preventDefault();

		$('.modal_body').show();

		var link = $(this).attr('href');

		$.ajax({
			url:link,
			type:'GET',
			success:function(html){
				$('.modal_content').html(html);
			}
		});

		


	});

	$('#btn').on('click', function(){
		$('.modal_body').hide();
	})
});
$(function() {

	$('.check_all').click(function(){
			$(".check_group").find('input[type="checkbox"]').prop('checked',true);
	});

	$('.uncheck_all').click(function(){
			$(".check_group").find('input[type="checkbox"]').prop('checked',false);
	});
});
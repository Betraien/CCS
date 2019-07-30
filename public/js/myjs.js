
$('input[name=SelectType]').click(function(){

var option = $(this).val();
  
$.ajax({
	url: 'ThirdParty/list_third_party', // this must be single quotation to pass the variables and get response
	type: 'post',
	data: {
		option,
		'_token': $('meta[name="csrf-token"]').attr('content') // since we are using laravel this must be added in ajax requests
	},
	
	dataType: 'text',
	success: function(result){
		console.log(result);
 
		$('div[name=result]').append(result);
 
		//alert(result);

	}, error: function(e){
		alert(e.Message);
	}
   });
  
});
function search(){
	var str = $('#url')[0].value;
	$.post("imageGetter.php",{ url: str},
		function(data){
    //リクエストが成功した際に実行する関数
    var jsonObj = JSON.parse(data);
    $.each(jsonObj, function(key, value) {
    	console.log(key + ': ' + value);
			//console.log($('<img>'),{src : value});
			$('#image').append('<img src="'+value+'" />');
		});
  }
  );
}
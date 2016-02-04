var req = new XMLHttpRequest();
req.onreadystatechange=function(){
	console.log(req.readyState);
	if (req.readyState==4 && req.status==200){
		alert(req.responseText);
	}
}
req.open( "POST", "imageGetter.php", true );
req.send( 'url=http://pad.gungho.jp/member/' );
<?php
	//画像リソース
	@$url = $_GET['url'];
	if($url==null){
		@$url = $_POST['url'];
	}
	if($url==null){
		$url = 'パズドラ';
	}
$url = 'http://search.yahoo.co.jp/search?p='.urlencode($str);
	//ファイルソースを文字列として所得
	$file_content = file_get_contents($url);
	//画像パスの正規表現検索
	preg_match_all('/<img.*src\s*=\s*[\"|\'](.*?)[\"|\'].*>/i', $file_content, $img_list);
	//表示します
	$imgs = [];
	for ($i = 0 ; $i < count($img_list[1]); $i++) {
  	if(substr($img_list[1][$i], 0, 4)=="http"){
  		$imgs[] = $img_list[1][$i];
  	}else if(substr($img_list[1][$i], 0, 4)=="../"){
  		$url_split = preg_split('/\//', $url);
			$imgs[] = $url.$img_list[1][$i];
  	}else {
  		$imgs[] = $url.$img_list[1][$i];
  	}
	}
	echo json_encode($imgs);
?>
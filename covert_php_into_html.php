<?php
// foreach ($argv as $key => $value) {
// 	echo $value.PHP_EOL;
// }
$dir_path = $argv[1];
if(is_dir($dir_path)){
	if(!is_dir($dir_path.'html')){
		if(!mkdir($dir_path.'html')){
			echo "can't make directory.".PHP_EOL;
			exit;
		}
	}
	if($dir_handle = opendir($dir_path)){
		while (($file = readdir($dir_handle)) !== false) {
			$filepath = $dir_path.$file;
			$file_info = pathinfo($filepath);
			if(array_key_exists('extension', $file_info) && $file_info['extension'] == "php"){
				// $php_file[] = $filepath;
				// echo '========================'.PHP_EOL;
				// var_dump($filepath);
				// echo '========================'.PHP_EOL;
				// echo PHP_EOL;
				ob_start();
				require_once($filepath);
				$content = ob_get_clean();
				// file_put_contents($dir_path.'html/'.$file_info['filename'].'.html',$content);
				// var_dump(preg_quote(addslashes($content))).PHP_EOL;
				// echo '========================'.PHP_EOL;
				// $content = preg_quote(addslashes($content));
				// $content2 = preg_replace($content, 'html', '*php*');
				$content2 = str_replace('.php','.html',$content);
				file_put_contents($dir_path.'html/'.$file_info['filename'].'.html',$content2);
				echo $dir_path.'html/'.$file_info['filename'].'.html'.PHP_EOL;
			}
		}
	}
	closedir($dir_handle);
}


function convertHtml(){}

 ?>

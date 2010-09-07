 <?php
 /*
======================================================
$str    字符
$start  字符截取位置
$len    截取字符的数
======================================================
*/
//此文件UTF-8格式
/**
 * 支持utf8中文字符截取
 * @author  肖飞(arthurxf@gmail.com)
 * @param  string $text    待处理字符串
 * @param  int $start      从第几位截断
 * @param  int $sublen    截断几个字符
 * @param  string $code    字符串编码
 * @param  string $ellipsis    附加省略字符
 * @return  string
 */
function csubstr($string, $start = 0,$sublen=12, $code = 'UTF-8',$ellipsis='...'){
	if($code == 'UTF-8'){
		$pa = "/[\x01-\x7f]&#124;[\xc2-\xdf][\x80-\xbf]&#124;\xe0[\xa0-\xbf][\x80-\xbf]&#124;[\xe1-\xef][\x80-\xbf][\x80-\xbf]&#124;\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]&#124;[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
		preg_match_all($pa, $string, $t_string);
		
		if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)).$ellipsis;
		return join('', array_slice($t_string[0], $start, $sublen));
	}else{
		$start = $start*2;
		$sublen = $sublen*2;
		$strlen = strlen($string);
		$tmpstr = '';
		for($i=0; $i<$strlen; $i++){
			if($i>=$start && $i<($start+$sublen)){
				if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);
				else $tmpstr.= substr($string, $i, 1);
			}
			if(ord(substr($string, $i, 1))>129) $i++;
		}
		if(strlen($tmpstr)<$strlen ) $tmpstr.= $ellipsis;
		return $tmpstr;
	}
}
 ?>
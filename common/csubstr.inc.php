 <?php
 /*
======================================================
$str    �ַ�
$start  �ַ���ȡλ��
$len    ��ȡ�ַ�����
======================================================
*/
//���ļ�UTF-8��ʽ
/**
 * ֧��utf8�����ַ���ȡ
 * @author  Ф��(arthurxf@gmail.com)
 * @param  string $text    �������ַ���
 * @param  int $start      �ӵڼ�λ�ض�
 * @param  int $sublen    �ضϼ����ַ�
 * @param  string $code    �ַ�������
 * @param  string $ellipsis    ����ʡ���ַ�
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
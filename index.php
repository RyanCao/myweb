<?php
/*********************************************
*
* filename	: index.php
* author	: ryancao
* time		: 2010/9/7
*********************************************/
include_once("common/common.php");	

//���ｫ����������Ų���
$strQuery = "SELECT article_id, article_link, article_info,article_time,article_title,article_author FROM tech_list ORDER BY article_id DESC";
//=========@@@@help 3. ����$db->query($strQuery)����һ�����ݲ�ѯ=================================================

$db->query($strQuery);

$i = NUM;
//=========@@@@help 4. $db->next_record()��ȡ���ݿ��ѯ����ֵ����һ�У�ע������query()�������ݼ��ĵ�һ����¼��ǰһ����¼��===========

while($db->next_record() && $i > 0)
{
//=========@@@@ 5. csubstr()������ʹ�õ�һ�����Ľ�ȡ===========================================================

$array[] = array(
	"article_title"=> $db->f("article_title"),
	"article_link"=>$db->f("article_link"), 
	"article_info"=>$db->f("article_info"),
	"article_time"=> date('Y-m-d H:i:s',$db->f("article_time")*1000 ) ,
	"article_author"=>$db->f("article_author")
	);
$i--;
}
$smarty->assign("articles", $array);
unset($array);

//=========@@@@ 6. $db->free(): �ͷŵ�ǰ�Ĳ�ѯ������Դ

$db->free();

//���벢��ʾλ��./templates�µ�index.tplģ��
$smarty->display("index.tpl");

?>
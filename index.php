<?php
/*********************************************
*
* filename	: index.php
* author	: ryancao
* time		: 2010/9/7
*********************************************/
include_once("common/common.php");	

//这里将处理国内新闻部分
$strQuery = "SELECT article_id, article_link, article_info,article_time,article_title,article_author FROM tech_list ORDER BY article_id DESC";
//=========@@@@help 3. 调用$db->query($strQuery)进行一次数据查询=================================================

$db->query($strQuery);

$i = NUM;
//=========@@@@help 4. $db->next_record()读取数据库查询返回值的下一行（注：调用query()返回数据集的第一条记录的前一个记录）===========

while($db->next_record() && $i > 0)
{
//=========@@@@ 5. csubstr()是我们使用的一个中文截取===========================================================

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

//=========@@@@ 6. $db->free(): 释放当前的查询返回资源

$db->free();

//编译并显示位于./templates下的index.tpl模板
$smarty->display("index.tpl");

?>
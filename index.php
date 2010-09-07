<?php
/*********************************************
*
* filename	: index.php
* author	: ryancao
* time		: 2010/9/7
*********************************************/

include_once("./common/Smarty.class.php");			//include  smarty
//======= @@@@help 1.这里是将DB_Sql类文件包含进来，下面一行是将一个中文截取类包含到当前页==============================
include_once("./common/database.inc.php");			//include db.class
include_once("./common/csubstr.inc.php"); //包含中文截取类
//=======================================
define("NUM", 5); //定义每次显示的新闻条数

$smarty = new Smarty(); //建立smarty实例对象$smarty
$smarty->templates_dir = "./templates"; //设置模板目录
$smarty->compile_dir ="./templates_c"; //设置编译目录
$smarty->cache_dir = "./cache"; //设置缓存目录
$smarty->caching = false; //这里是调试时设为false,发布时请使用true
$smarty->left_delimiter = "<{"; //设置左边界符
$smarty->right_delimiter = "}>"; //设置右边界符

//=========@@@@help 2.实例化一个类，并设置类的Host, Database, User, Password属性, 最后connect数据库=========================
$db = new DB_Sql(); //实例化一个DB类
$db->Host = "localhost"; // 数据库主机名
$db->Database = "news"; //数据库名称
$db->User = "root"; //用户名
$db->Password = "123"; //密码

$db->connect(); //进行数据库连接

//这里将处理国内新闻部分
$strQuery = "SELECT iNewsID, vcNewsTitle FROM tb_news_ch ORDER BY iNewsID DESC";

//=========@@@@help 3. 调用$db->query($strQuery)进行一次数据查询=================================================
$db->query($strQuery);
$i = NUM;

//=========@@@@help 4. $db->next_record()读取数据库查询返回值的下一行（注：调用query()返回数据集的第一条记录的前一个记录）===========

while($db->next_record() && $i > 0)
{

//=========@@@@ 5. csubstr()是我们使用的一个中文截取===========================================================

$array[] = array("newsID"=>$db->f("iNewsID"),
"newsTitle"=>$db->f("vcNewsTitle"));

$i--;
}
$smarty->assign("News_CH", $array);
unset($array);

//=========@@@@ 6. $db->free(): 释放当前的查询返回资源

$db->free();


//这里处理国际新闻部分
$strQuery = "SELECT iNewsID, vcNewsTitle FROM tb_news_in ORDER BY iNewsID DESC";
$db->query($strQuery);
$i = NUM;
while($db->next_record() && $i > 0)
{
$array[] = array("newsID"=>$db->f("iNewsID"),
"newsTitle"=>$db->f("vcNewsTitle"));

$i--;
}
$smarty->assign("News_IN", $array);
unset($array);
$db->free();


//这里将处理娱乐新闻部分
$strQuery = "SELECT iNewsID, vcNewsTitle FROM tb_news_mu ORDER BY iNewsID DESC";
$db->query($strQuery);
$i = NUM;
while($db->next_record() && $i > 0)
{
$array[] = array("newsID"=>$db->f("iNewsID"),
"newsTitle"=>$db->f("vcNewsTitle"));

$i--;
}
$smarty->assign("News_MU", $array);
unset($array);
$db->free();


//编译并显示位于./templates下的index.tpl模板
$smarty->display("index.tpl");

?>
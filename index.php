<?php
/*********************************************
*
* �ļ����� index.php
* �� �ã� ��ʾʵ������
*
* �� �ߣ� ��ʦ��
* Email�� teacherli@163.com

* �� ���� forest
*********************************************/
include_once("./comm/Smarty.class.php"); //����smarty���ļ�
//======= @@@@help 1.�����ǽ�DB_Sql���ļ���������������һ���ǽ�һ�����Ľ�ȡ���������ǰҳ==============================
include_once("./comm/db_mysql.inc.php"); //�������ݿ������
include_once("./comm/csubstr.inc"); //�������Ľ�ȡ��
//=======================================
define("NUM", 5); //����ÿ����ʾ����������

$smarty = new Smarty(); //����smartyʵ������$smarty
$smarty->templates_dir = "./templates"; //����ģ��Ŀ¼
$smarty->compile_dir ="./templates_c"; //���ñ���Ŀ¼
$smarty->cache_dir = "./cache"; //���û���Ŀ¼
$smarty->caching = false; //�����ǵ���ʱ��Ϊfalse,����ʱ��ʹ��true
$smarty->left_delimiter = "<{"; //������߽��
$smarty->right_delimiter = "}>"; //�����ұ߽��

//=========@@@@help 2.ʵ����һ���࣬���������Host, Database, User, Password����, ���connect���ݿ�=========================
$db = new DB_Sql(); //ʵ����һ��DB��
$db->Host = "localhost"; // ���ݿ�������
$db->Database = "news"; //���ݿ�����
$db->User = "root"; //�û���
$db->Password = ""; //����

$db->connet(); //�������ݿ�����

//���ｫ�����������Ų���
$strQuery = "SELECT iNewsID, vcNewsTitle FROM tb_news_ch ORDER BY iNewsID DESC";

//=========@@@@help 3. ����$db->query($strQuery)����һ�����ݲ�ѯ=================================================
$db->query($strQuery);
$i = NUM;

//=========@@@@help 4. $db->next_record()��ȡ���ݿ��ѯ����ֵ����һ�У�ע������query()�������ݼ��ĵ�һ����¼��ǰһ����¼��===========

while($db->next_record() && $i > 0)
{

//=========@@@@ 5. csubstr()������ʹ�õ�һ�����Ľ�ȡ===========================================================

$array[] = array("NewsID"=>csubstr($db->f("iNewsID"), 0, 20),
"NewsTitle"=>csubstr($db->f("vcNewsTitle"), 0, 20));

$i--;
}
$smarty->assign("News_CH", $array);
unset($array);

//=========@@@@ 6. $db->free(): �ͷŵ�ǰ�Ĳ�ѯ������Դ

$db->free();


//���ﴦ���������Ų���
$strQuery = "SELECT iNewsID, vcNewsTitle FROM tb_news_in ORDER BY iNewsID DESC";
$db->query($strQuery);
$i = NUM;
while($db->next_record() && $i > 0)
{
$array[] = array("NewsID"=>csubstr($db->f("iNewsID"), 0, 20),
"NewsTitle"=>csubstr($db->f("vcNewsTitle"), 0, 20));

$i--;
}
$smarty->assign("News_IN", $array);
unset($array);
$db->free();


//���ｫ�����������Ų���
$strQuery = "SELECT iNewsID, vcNewsTitle FROM tb_news_mu ORDER BY iNewsID DESC";
$db->query($strQuery);
$i = NUM;
while($db->next_record() && $i > 0)
{
$array[] = array("NewsID"=>csubstr($db->f("iNewsID"), 0, 20),
"NewsTitle"=>csubstr($db->f("vcNewsTitle"), 0, 20));

$i--;
}
$smarty->assign("News_MU", $array);
unset($array);
$db->free();


//���벢��ʾλ��./templates�µ�index.tplģ��
$smarty->display("index.tpl");

?>
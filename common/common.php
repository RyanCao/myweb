<?php
@header('content-Type: text/html; charset=gb2312');

$dbcharset = 'gb2312';

include_once("Smarty.class.php");			//include  smarty
//======= @@@@help 1.�����ǽ�DB_Sql���ļ���������������һ���ǽ�һ�����Ľ�ȡ���������ǰҳ==============================
include_once("database.inc.php");			//include db.class
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
$db->Database = "techflash"; //���ݿ�����
$db->User = "root"; //�û���
$db->Password = "123"; //����
$db->connect(); //�������ݿ�����

//����Mysql����
mysql_query("set names ".$dbcharset) ;

?>
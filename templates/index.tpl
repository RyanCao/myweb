<{* �@ʾ��smarty׃���R���Y����*���������֞��]ጃ��� *}>
<{include file="header.tpl"}><{*����^*}>

database1:<hr>
<{section name=loop loop=$News_CH}>
ID��<{$News_CH[loop].newsID}><br>
TITLE��<{$News_CH[loop].newsTitle}><br><hr>
<{sectionelse}>
�����𣬛]���κ���ݔ�룡
<{/section}>

database2:<hr>
<{section name=loop loop=$News_IN}>
ID��<{$News_IN[loop].newsID}><br>
TITLE��<{$News_IN[loop].newsTitle}><br><hr>
<{sectionelse}>
�����𣬛]���κ���ݔ�룡
<{/section}>

database3:<hr>
<{section name=loop loop=$News_MU}>
ID��<{$News_MU[loop].newsID}><br>
TITLE��<{$News_MU[loop].newsTitle}><br><hr>
<{sectionelse}>
�����𣬛]���κ���ݔ�룡
<{/section}>

<{include file="foot.tpl"}><{*���β*}>


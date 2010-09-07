<{* 顯示是smarty變量識符裏的用*包含的文字為註釋內容 *}>
<{include file="header.tpl"}><{*頁面頭*}>

database1:<hr>
<{section name=loop loop=$News_CH}>
ID：<{$News_CH[loop].newsID}><br>
TITLE：<{$News_CH[loop].newsTitle}><br><hr>
<{sectionelse}>
對不起，沒有任何新聞輸入！
<{/section}>

database2:<hr>
<{section name=loop loop=$News_IN}>
ID：<{$News_IN[loop].newsID}><br>
TITLE：<{$News_IN[loop].newsTitle}><br><hr>
<{sectionelse}>
對不起，沒有任何新聞輸入！
<{/section}>

database3:<hr>
<{section name=loop loop=$News_MU}>
ID：<{$News_MU[loop].newsID}><br>
TITLE：<{$News_MU[loop].newsTitle}><br><hr>
<{sectionelse}>
對不起，沒有任何新聞輸入！
<{/section}>

<{include file="foot.tpl"}><{*頁面尾*}>


<{* 顯示是smarty變量識符裏的用*包含的文字為註釋內容 *}>
<{include file="header.tpl"}><{*頁面頭*}>

<{section name=loop loop=$articles}>
<div id="article_bg">
<div id="article_title">标题：<a href=<{$articles[loop].article_link}> > <{$articles[loop].article_title}> </a></div>
<div id="article_info">简介：<{$articles[loop].article_info}></div>
<div>
<span id="article_time">发表时间：<{$articles[loop].article_time}> </span> 
<span id="article_author">作者：<{$articles[loop].article_author}></span></div>
</div>
<{sectionelse}>
對不起，沒有任何新聞輸入！
<{/section}>

<{include file="foot.tpl"}><{*頁面尾*}>


<{* �@ʾ��smarty׃���R���Y����*���������֞��]ጃ��� *}>
<{include file="header.tpl"}><{*����^*}>

<{section name=loop loop=$articles}>
<div id="article_bg">
<div id="article_title">���⣺<a href=<{$articles[loop].article_link}> > <{$articles[loop].article_title}> </a></div>
<div id="article_info">��飺<{$articles[loop].article_info}></div>
<div>
<span id="article_time">����ʱ�䣺<{$articles[loop].article_time}> </span> 
<span id="article_author">���ߣ�<{$articles[loop].article_author}></span></div>
</div>
<{sectionelse}>
�����𣬛]���κ���ݔ�룡
<{/section}>

<{include file="foot.tpl"}><{*���β*}>


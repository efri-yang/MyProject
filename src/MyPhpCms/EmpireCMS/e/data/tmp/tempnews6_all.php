<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$grpagetitle?> - Powered by EmpireCMS</title>
<meta name="Keywords" content="<?=$ecms_gr[keyboard]?>" />
<meta name="description" content="<?=$grpagetitle?>" />
<link href="/MyProject/src/MyPhpCms/EmpireCMS/skin/default/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/MyProject/src/MyPhpCms/EmpireCMS/skin/default/js/tabs.js"></script>
</head>
<body class="showpage">
<!-- 页头 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="top">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="63%"> 
<!-- 登录 -->
<script>
document.write('<script src="/MyProject/src/MyPhpCms/EmpireCMS/e/member/login/loginjs.php?t='+Math.random()+'"><'+'/script>');
</script>
</td>
<td align="right">
<a onclick="window.external.addFavorite(location.href,document.title)" href="#ecms">加入收藏</a> | <a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('/MyProject/src/MyPhpCms/EmpireCMS/')" href="#ecms">设为首页</a> | <a href="/MyProject/src/MyPhpCms/EmpireCMS/e/member/cp/">会员中心</a> | <a href="/MyProject/src/MyPhpCms/EmpireCMS/e/DoInfo/">我要投稿</a> | <a href="/MyProject/src/MyPhpCms/EmpireCMS/e/web/?type=rss2&classid=<?=$ecms_gr[classid]?>" target="_blank">RSS<img src="/MyProject/src/MyPhpCms/EmpireCMS/skin/default/images/rss.gif" border="0" hspace="2" /></a>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="10">
<tr valign="middle">
<td width="240" align="center"><a href="/MyProject/src/MyPhpCms/EmpireCMS/"><img src="/MyProject/src/MyPhpCms/EmpireCMS/skin/default/images/logo.gif" width="200" height="65" border="0" /></a></td>
<td align="center"><a href="http://www.phome.net/OpenSource/" target="_blank"><img src="/MyProject/src/MyPhpCms/EmpireCMS/skin/default/images/opensource.gif" width="100%" height="70" border="0" /></a></td>
</tr>
</table>
<!-- 导航tab选项卡 -->
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" class="nav">
  <tr> 
    <td class="nav_global"><ul>
        <li class="curr" id="tabnav_btn_0" onmouseover="tabit(this)"><a href="/MyProject/src/MyPhpCms/EmpireCMS/">首页</a></li>
        <? @sys_ShowClassByTemp('0',12,0,0);?> </ul></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
	<tr valign="top">
		<td class="main"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="position">
				<tr>
					<td>您当前的位置：<?=$grurl?></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><table width="100%" border="0" cellpadding="3" cellspacing="2">
						<tr>
							<td width="16%"><div align="center">[影片名称]</div></td>
							<td width="45%"><strong><?=$ecms_gr[title]?></strong></td>
							<td width="39%" rowspan="10" align="center" valign="top" bgcolor="#F4F9FD" class="photo"><a href="<?=empty($ecms_gr[titlepic])?$public_r[newsurl].'e/data/images/notimg.gif':$ecms_gr[titlepic]?>" title="查看原图" target="_blank"><img src="<?=empty($ecms_gr[titlepic])?$public_r[newsurl].'e/data/images/notimg.gif':$ecms_gr[titlepic]?>" width="205" height="278" border="0" align="top" /></a></td>
						</tr>
						<tr>
							<td bgcolor="#F4F9FD"><div align="center">[领衔主演]</div></td>
							<td bgcolor="#F4F9FD"><?=$ecms_gr[player]?></td>
						</tr>
						<tr>
							<td><div align="center">[影片类型]</div></td>
							<td><?=$ecms_gr[movietype]?></td>
						</tr>
						<tr>
							<td bgcolor="#F4F9FD"><div align="center">[带宽要求]</div></td>
							<td bgcolor="#F4F9FD"><?=$ecms_gr[playdk]?></td>
						</tr>
						<tr>
							<td><div align="center">
									<p>[影片长度]</p>
							</div></td>
							<td><?=$ecms_gr[playtime]?></td>
						</tr>
						<tr>
							<td bgcolor="#F4F9FD"><div align="center">[文件大小]</div></td>
							<td bgcolor="#F4F9FD"><?=$ecms_gr[filesize]?></td>
						</tr>
						<tr>
							<td><div align="center">[推荐级别]</div></td>
							<td><img src="/MyProject/src/MyPhpCms/EmpireCMS/e/data/images/<?=$ecms_gr[star]?>star.gif" border="0" /></td>
						</tr>
						<tr>
							<td bgcolor="#F4F9FD"><div align="center">[上传时间]</div></td>
							<td bgcolor="#F4F9FD"><?=$ecms_gr[movietime]?></td>
						</tr>
						<tr>
							<td><div align="center">[下载次数]</div></td>
							<td><script src="/MyProject/src/MyPhpCms/EmpireCMS/e/public/ViewClick/?classid=<?=$ecms_gr[classid]?>&amp;id=<?=$ecms_gr[id]?>&amp;down=1"></script></td>
						</tr>
						<tr>
							<td bgcolor="#F4F9FD"><div align="center">[文件格式]</div></td>
							<td bgcolor="#F4F9FD"><?=$ecms_gr[filetype]?></td>
						</tr>
						<tr>
							<td><div align="center">[在线观看]</div></td>
							<td colspan="2"><?=ReturnOnlinepathHtml($ecms_gr)?></td>
						</tr>
						<tr>
							<td bgcolor="#F4F9FD"><div align="center">[下载影片]</div></td>
							<td colspan="2" bgcolor="#F4F9FD"><?=ReturnDownSoftHtml($ecms_gr)?></td>
						</tr>
						<tr>
							<td><div align="center">[下载帮助]</div></td>
							<td colspan="2"><img src="/MyProject/src/MyPhpCms/EmpireCMS/e/data/images/gonggao.gif" border="0" /><a href="/MyProject/src/MyPhpCms/EmpireCMS/e/pl/?classid=<?=$ecms_gr[classid]?>&amp;id=<?=$ecms_gr[id]?>">发表评论</a> <img src="/MyProject/src/MyPhpCms/EmpireCMS/e/data/images/gonggao.gif" border="0" /><a href="/MyProject/src/MyPhpCms/EmpireCMS/e/member/fava/add/?classid=<?=$ecms_gr[classid]?>&amp;id=<?=$ecms_gr[id]?>">加入收藏夹</a> <img src="/MyProject/src/MyPhpCms/EmpireCMS/e/data/images/gonggao.gif" border="0" /><a href="/MyProject/src/MyPhpCms/EmpireCMS/e/public/report/?classid=<?=$ecms_gr[classid]?>&amp;id=<?=$ecms_gr[id]?>" target="_blank">错误报告</a></td>
						</tr>
						<tr>
							<td bgcolor="#F4F9FD"><div align="center">[影片介绍]</div></td>
							<td colspan="2" bgcolor="#F4F9FD">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="3" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4" style="table-layout:  fixed;  word-wrap:  break-word">
									<tr>
										<td><?=nl2br($ecms_gr[moviesay])?></td>
									</tr>
							</table></td>
						</tr>
					</table></td>
				</tr>
			</table>
			<script>
		  function CheckPl(obj)
		  {
		  if(obj.saytext.value=="")
		  {
		  alert("您没什么话要说吗？");
		  obj.saytext.focus();
		  return false;
		  }
		  return true;
		  }
		  </script><form action="/MyProject/src/MyPhpCms/EmpireCMS/e/pl/doaction.php" method="post" name="saypl" id="saypl" onsubmit="return CheckPl(document.saypl)">
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="plpost">

<tr>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="title">
<tr>
<td><strong>发表评论</strong></td>
<td align="right"><a href="/MyProject/src/MyPhpCms/EmpireCMS/e/pl/?classid=<?=$ecms_gr[classid]?>&amp;id=<?=$ecms_gr[id]?>">共有<span><script type="text/javascript" src="/MyProject/src/MyPhpCms/EmpireCMS/e/public/ViewClick/?classid=<?=$ecms_gr[classid]?>&id=<?=$ecms_gr[id]?>&down=2"></script></span>条评论</a></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellpadding="0" cellspacing="2">
<tr>
<td width="56%" align="left">用户名:
<input name="username" type="text" class="inputText" id="username" value="" size="16" /></td>
<td width="44%" align="left">密码:
<input name="password" type="password" class="inputText" id="password" value="" size="16" /></td>
</tr>
<tr>
<td align="left">验证码:
<input name="key" type="text" class="inputText" size="10" />
<img src="/MyProject/src/MyPhpCms/EmpireCMS/e/ShowKey/?v=pl" align="absmiddle" name="plKeyImg" id="plKeyImg" onclick="plKeyImg.src='/MyProject/src/MyPhpCms/EmpireCMS/e/ShowKey/?v=pl&t='+Math.random()" title="看不清楚,点击刷新" /> </td>
<td align="left"><input name="nomember" type="checkbox" id="nomember" value="1" checked="checked" />
匿名发表</td>
</tr>
</table>
<textarea name="saytext" rows="6" id="saytext"></textarea><input name="imageField" type="image" src="/MyProject/src/MyPhpCms/EmpireCMS/e/data/images/postpl.gif"/>
<input name="id" type="hidden" id="id" value="<?=$ecms_gr[id]?>" />
<input name="classid" type="hidden" id="classid" value="<?=$ecms_gr[classid]?>" />
<input name="enews" type="hidden" id="enews" value="AddPl" />
<input name="repid" type="hidden" id="repid" value="0" />
<input type="hidden" name="ecmsfrom" value="<?=$grtitleurl?>"></td>
</tr>
</table>
</td>
</tr>
</table></form></td>
		<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
				<tr>
					<td><strong>影视推荐</strong></td>
				</tr>
			</table>
				<table width="100%" border="0" cellspacing="8" cellpadding="0" class="box">
					<tr>
						<td><? @sys_GetClassNewsPic('selfinfo',2,4,128,90,1,20,2);?> </td>
					</tr>
				</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
					<tr>
						<td><strong>最后更新</strong></td>
					</tr>
				</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
					<tr>
						<td><ul>
              <script src='/MyProject/src/MyPhpCms/EmpireCMS/d/js/class/class<?=$ecms_gr[classid]?>_newnews.js'></script></ul></td>
					</tr>
				</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
					<tr>
						<td><strong>热门点击</strong></td>
					</tr>
				</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
					<tr>
						<td><ul>
              <script src='/MyProject/src/MyPhpCms/EmpireCMS/d/js/class/class<?=$ecms_gr[classid]?>_hotnews.js'></script></ul></td>
					</tr>
			</table></td>
	</tr>
</table>
<!-- 页脚 -->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="search">
<form action="/MyProject/src/MyPhpCms/EmpireCMS/e/search/index.php" method="post" name="searchform" id="searchform">
<table border="0" cellspacing="6" cellpadding="0">
<tr>
<td><strong>站内搜索：</strong>
<input name="keyboard" type="text" size="32" id="keyboard" class="inputText" />
<input type="hidden" name="show" value="title" />
<input type="hidden" name="tempid" value="1" />
<select name="tbname">
<option value="news">新闻</option>
<option value="download">下载</option>
<option value="photo">图库</option>
<option value="flash">FLASH</option>
<option value="movie">电影</option>
<option value="shop">商品</option>
<option value="article">文章</option>
<option value="info">分类信息</option>
</select>
</td>
<td><input type="image" class="inputSub" src="/MyProject/src/MyPhpCms/EmpireCMS/skin/default/images/search.gif" />
</td>
<td><a href="/MyProject/src/MyPhpCms/EmpireCMS/search/" target="_blank">高级搜索</a></td>
</tr>
</table>
</form>
</td>
</tr>
<tr>
<td>
	<table width="100%" border="0" cellpadding="0" cellspacing="4" class="copyright">
        <tr> 
          <td align="center"><a href="/MyProject/src/MyPhpCms/EmpireCMS/">网站首页</a> | <a href="#">关于我们</a> 
            | <a href="#">服务条款</a> | <a href="#">广告服务</a> | <a href="#">联系我们</a> 
            | <a href="#">网站地图</a> | <a href="#">免责声明</a> | <a href="/MyProject/src/MyPhpCms/EmpireCMS/e/wap/" target="_blank">WAP</a></td>
        </tr>
        <tr> 
          <td align="center">Powered by <strong><a href="http://www.phome.net" target="_blank">EmpireCMS</a></strong> 
            <strong><font color="#FF9900">7.2</font></strong>&nbsp; &copy; 2002-2015 
            <a href="http://www.digod.com" target="_blank">EmpireSoft Inc.</a></td>
        </tr>
	</table>
</td>
</tr>
</table> <?='<script src="'.$public_r[newsurl].'e/public/onclick/?enews=donews&classid='.$ecms_gr[classid].'&id='.$ecms_gr[id].'"></script>'?>
</body>
</html>
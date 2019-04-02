<?php
	$ua = $_SERVER['HTTP_USER_AGENT'];
//    $ip = $_SERVER["REMOTE_ADDR"];  无cdn获取用户真实ip

//使用cdn以后获取用户真实ip
 
function GetClientIP(){
 
 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
 
 if($ip != ""){
 
  $arr = explode(",",$ip);
 
  return $arr[0];
 
 }else{
 
  return $_SERVER["REMOTE_ADDR"];
 
 }
 
}
?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <meta http-equiv="Content-Language" content="zh-cn">
  <meta name="apple-mobile-web-app-capable" content="no"/>
  <meta name="apple-touch-fullscreen" content="yes"/>
  <meta name="format-detection" content="telephone=no,email=no"/>
  <meta name="apple-mobile-web-app-status-bar-style" content="white">
	<title>在线User Agent-IP信息查看工具</title>
	<meta name="generator" content="EverEdit" />
	<meta name="keywords" content="User Agent信息,UA信息,教书先生,教书先生博客,IP查看,服务器IP查看" />
	<meta name="description" content="在线User Agent-IP信息查看工具方便的查看您当前访问网页的UA信息。" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="https://q2.qlogo.cn/headimg_dl?spec=100&dst_uin=599928887">
	<link rel="stylesheet" href="./layui/css/layui.css">
	<link rel="stylesheet" href="./static/style.css?v=1.1">
</head>
<body>
<div class="body">
  
    <h1 class="mod-title">在线User Agent-IP查看</h1>
	<!--内容部分-->

				<table class="layui-table layui-form" lay-even="" lay-skin="nob">
				  <tbody>
				    <tr>
				      	<td width="75%">
						   	<input id="ip" type="text" required="" lay-verify="required" placeholder="请输入 IP 或 域名" autocomplete="off" class="layui-input" data-cip-id="url">
					    </td>
					    <td width="25%">
					      <select name="" lay-verify="required" id="type">
					        <option value="default">查询接口</option>
					        <option value="ipip">IPIP.NET</option>
					        <option value="taobao">淘宝</option>
					       <!-- <option value="sina">新浪</option>-->
					        <option value="geoip">GeoIP</option>
					     <!--   <option value="all">全部</option> -->
					      </select>
					    </td>
				      	<td width="10%"><button type="submit" class="layui-btn layui-btn" id="btn">查 询</button></td>
				    </tr>
				  </tbody>
				</table> 
				<div id = "loading"><center><img src="./static/loading_new.gif" alt="" width = "20%"></center></div>
				<div id="myip">
					<table class="layui-table">
					  <thead>
					    <tr>
					      	<th colspan = '2'><center><h2>您的信息如下</h2></center></th>
					    </tr> 
					  </thead>
					  <tbody>
					    <tr>
					      	<td>内网IP</td>
					      	<td><code id = "localip"></code></td>
					    </tr>
					    <tr>
					      	<td>公网IP</td>
					      	<td><code id = "getip"><?php echo GetClientIP(); ?></code></td>
					    </tr>
					    <tr>
					      	<td>地区/运营商</td>
					      	<td id = "mylocation"></td>
					    </tr>
					    <tr>
					      	<td>User Agent</td>
					      	<td><?php echo $ua; ?></td>
					    </tr>
					  </tbody>
					</table>
				</div>
				<!--返回IP查询结果-->
				<div id = "ipinfo">
					<h1 style = "text-align:center;">来自 <span id = "api"></span> 的数据</h1>
					<table class="layui-table">
					  <colgroup>
					    <col width="150">
					    <col width="150">
						<col width="150">   
					    <col width="150">
						<col width="150">
						<col>
					  </colgroup>
					  <thead>
					    <tr>
					      <th>IP</th>
					      <th>国家</th>
					      <th>省</th>
					      <th>市</th>
					      <th class = "layui-hide-xs">区/县</th>
					      <th>运营商</th>
					    </tr> 
					  </thead>
					  <tbody>
					    <tr>
					      <td id = "reip"></td>
					      <td id = "country"></td>
					      <td id = "region"></td>
					      <td id = "city"></td>
					      <td id = "county" class = "layui-hide-xs"></td>
					      <td id = "isp"></td>
					    </tr>
					  </tbody>
					</table>
				</div>
				<!--返回IP查询结果END-->
				<!--返回全部查询结果-->
				<div id = "allinfo">
					<h1 style = "text-align:center;"> <code id = "allip"></code> 查询结果</h1>
					<table class="layui-table">
					  <colgroup>
					    <col width="150">
						<col>
					  </colgroup>
					  <thead>
					    <tr>
					      <th>数据来源</th>
					      <th>地区/运营商</th>
					    </tr> 
					  </thead>
					  <tbody>
					    <tr>
					      	<td>IPIP.NET</td>
					      	<td id = "ipip"></td>
					    </tr>
					    <tr>
					      	<td>淘宝</td>
					      	<td id = "taobao"></td>
					    </tr>
					    <tr>
					      	<td>新浪</td>
					      	<td id = "sina"></td>
					    </tr>
					    <tr>
					      	<td>GeoIP</td>
					      	<td id = "geoip"></td>
					    </tr>
					     <tr>
					      	<td>纯真IP</td>
					      	<td id = "qqwry"></td>
					    </tr>
					  </tbody>
					</table>
				</div>
				<!--返回全部查询结果END-->
	<!--内容部分END-->
  <p class="db"> <a style="text-decoration:none;display: flex;justify-content: center;color: #4a4744;margin-top: 20px;" href="https://www.12580sky.com" target="_blank">点击下载本程序</a></p>
</div>
  
  <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="./layui/layui.js"></script>
	<script src = "./static/embed.js?v=1.6"></script>
  <script>
layui.use('element', function(){
  var element = layui.element;
  element.on('nav(demo)', function(elem){
    //console.log(elem)
    layer.msg(elem.text());
  });
});
</script>
<!--小高教学网www.12580sky.com-->
</body>
</html>
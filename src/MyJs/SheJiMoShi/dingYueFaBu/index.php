
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录注册</title>
	<script type="text/javascript" src="../commom/js/jquery1.9.0.js"></script>
	<link rel="stylesheet" type="text/css" href="../commom/css/base.css">
</head>
<body>
	
	<div class="header" id="J_header">
		<img src="../commom/images/loading.gif" />
	</div>

	<div class="address" id="J_address">
		<img src="../commom/images/loading.gif" />
	</div>

	<script type="text/javascript">
		$(function(){
		var Event={
			clientList:[],
			listen:function(key,fn){
				if(!this.clientList[key]){
					this.clientList[key]=[];
				}
				this.clientList[key].push(fn);
			},
			trigger:function(){
				
				var key=Array.prototype.shift.call(arguments)
				var fns=this.clientList[key];

				if(!fns || !fns.length){
					return false;
				}
				for(var i=0,fn;fn=fns[i++];){
					fn.apply(this,arguments);
				}
			}
		}
		var installEvent=function(obj){
			for(var i in Event){
				obj[i]=Event[i];
			}
		}
		var loginObj=[];
		installEvent(loginObj);

		var header=(function(){
			 loginObj.listen("name1",function(data){
			 		header.setText(data)
			 });
			 return {
			 	setText:function(data){
			 		$("#J_header").find("img").remove();
			 
				 		
				 		if(!data.nologin){
				 			$("#J_header").append('<div class="item">欢迎您！'+data.username+'</div>');
				 		}else{
				 			$("#J_header").append('<div class="tip"><a href="login.html">登陆</a> | 注册 </div>');
				 		}
			 
			 		
			 	}
			 }
		})();

		var address=(function(){
			 loginObj.listen("name1",function(data){
			 		address.setText(data)
			 });
			 return {
			 	setText:function(data){
			 		$("#J_address").find("img").remove();
			 		if(!data.nologin){
				 		$("#J_address").append('<div class="item">'+data.username+'</div>');
				 	}else{
						$("#J_address").append('<div class="item">暂无消息</div>');
				 	}
			 	}
			 }
		})();
		
		$.ajax({
			url:"do.php",
			type:"post",
			dataType:"json",
			success:function(data){
				loginObj.trigger("name1",data);
			}
		});
		
		
	})

	</script>
</body>
</html>
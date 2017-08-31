<?php
	session_start();
	include("./libs/mysql.func.php");
	
	if(isset($_SESSION["id"])){
		$userId=$_SESSION["id"];
		$sql="select * from user where id='$userId'";
		$result=$mysqli->query($sql);
		if($result->num_rows){
			$row=$result->fetch_array();
		}
	}

	$tid=$_GET["id"];

	$sqlR="select theme.id,theme.title,titem.id, titem.title as itit, count(*) as nums from theme inner join titem on theme.id=titem.tid inner join votelist on theme.id=votelist.tid and titem.id=votelist.iid where theme.id='$tid' GROUP by votelist.iid";

	$resultR=$mysqli->query($sqlR);

	
	$rowOne=$resultR->fetch_assoc();
	$resultR->data_seek(0);
	

	while ($rowR=$resultR->fetch_assoc()) {
		$itemTit[]="'".$rowR["itit"]."'";
		$itemNum[]="'".$rowR["nums"]."'";
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="./styles/base.css">
    <script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.css">
    <script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">


    <script type="text/javascript" src="./js/echarts.min.js"></script>
</head>
<body>
	
	<?php include("./tpl/header.php"); ?>
	<div class="container">
		<div id="mainchart" style="width: 100%; height: 600px"></div>
	</div>
	<?php include("./tpl/footer.php"); ?>
    
 <script type="text/javascript">
		var dom = document.getElementById("mainchart");
		var myChart = echarts.init(dom);
		var app = {};
		option = null;
		option = {
		    title: {
		        text:"<?php echo $rowOne['title'];?>"
		    },
		    tooltip: {},
		    legend: {
		        data:['结果']
		    },
		    xAxis: {
		        data: [<?php echo implode(",",$itemTit); ?>]
		    },
		    yAxis: {},
		    series: [{
		        name: '结果',
		        type: 'bar',
		        data: [<?php echo implode(",",$itemNum); ?>]
		    }]
		};;
		if (option && typeof option === "object") {
		    myChart.setOption(option, true);
		}
       </script>


</body>
</html>
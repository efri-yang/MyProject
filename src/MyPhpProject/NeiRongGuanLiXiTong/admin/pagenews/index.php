<?php
session_start();
include "../../config.php";
include ROOT_PATH . "/include/mysqli.php";
include ROOT_PATH . "/admin/common/session.php";
include ROOT_PATH . "/admin/common/common.func.php";
include ROOT_PATH . "/admin/common/classtree.func.php";

$sql       = "select * from mc_article";
$result    = $mysqli->query($sql);
$resultNum = $result->num_rows;

$pageNum      = $_REQUEST["page"] ? $_REQUEST["page"] : 1;
$pageView     = 5;
$pageEveryNum = 5;
$pageTotal    = ceil($resultNum / $pageEveryNum);
$pageOffset   = ($pageView - 1) / 2;

$sql     = "select * from mc_article order by id desc limit " . $pageEveryNum * ($pageNum - 1) . "," . $pageEveryNum;
$result  = $mysqli->query($sql);
$results = resultToArray($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include ROOT_PATH . '/admin/template/scriptstyle.php'?>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH; ?>/admin/static/css/page-news.css">
</head>
<body>
	<?php include ROOT_PATH . '/admin/template/header_top.php'?>

	<div class="coms-layout-wrap">
		<?php
include ROOT_PATH . '/admin/template/layoutAside.php';
?>
		<div class="coms-layout-main">
			<div class="container">
		<div class="news-mbx-box clearfix">
			<div class="mbx-item">
                <a href="../index.php">首页</a>  >
                <span>信息管理</span>
            </div>
			<div class="handle-item fr">
				<a href="editNews.php?action=create" class="btn btn-success">添加信息</a>
			</div>
		</div>
		<?php
if ($pageTotal) {
    ?>
		<div class="news-list-wrap">
			<table class="news-list-tbl">
				<thead>
					<tr>
						<th width="5%"><input type="checkbox" /></th>
						<th width="35%">标题</th>
						<th width="15%">分类目录</th>
						<th width="15%">发布者</th>
						<th width="15%">发布时间</th>
						<th width="15%">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php
foreach ($results as $key => $value) {
        ?>
						<tr>
							<td class="align-c"><input type="checkbox" name="newsid" value="<?php echo $value['id'] ?>" /></td>
							<td><a href="#"><?php echo $value['title']; ?></a></td>
							<td class="align-c">前端开发</td>
							<td class="align-c"></td>
							<td class="align-c"><?php echo $value['publictime']; ?></td>
							<td>
								<div class="handle align-c">
									<a href="editNews.php?action=edit&id=<?php echo $value['id']; ?>">修改</a>

									<a href="delNews.php?id=<?php echo $value['id']; ?>">删除</a>
								</div>
							</td>
						</tr>
				<?php
}
    ?>


				</tbody>
			</table>

			<?php

    /**
     * 如果页数不够 那么  全部显示
     * 如果页数够，那么  拿当前页做判断
     *         1234567
     *           12345... 点击1
     *           12345...  点击2
     *            12345...  点击3
     *              ...23456... 点击4
     *                ...34567 点击 5
     *                    ...34567 点击 6
     */

    $pageStart = 1;
    $pageEnd   = $pageTotal;

    $pageStr = '<div class="pagination-box">';

    if ($pageNum <= 1) {
        $pageStr .= "<span class='first disabled page'>首页</span>";
        $pageStr .= "<span class='prev disabled page'>上一页</span>";
    } else {
        $pageStr .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=1" class="first">首页</a>';
        $pageStr .= "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($pageNum - 1) . "' class='prev'>上一页</a>";
    }

    if ($pageTotal > $pageView) {
        if ($pageNum > ($pageOffset + 1)) {
            $pageStr .= "<span>...</span>";
        }

        if ($pageNum > $pageOffset) {
            $pageStart = $pageNum - $pageOffset;
            $pageEnd   = (($pageNum + $pageOffset) > $pageTotal) ? $pageTotal : ($pageNum + $pageOffset);
        } else {
            $pageStart = 1;
            $pageEnd   = $pageView;
        }

        if (($pageNum + $pageOffset) > $pageTotal) {
            $pageStart = $pageStart - ($pageNum + $pageOffset - $pageEnd);
            $pageEnd   = $pageTotal;
        }
    }
    for ($i = $pageStart; $i <= $pageEnd; $i++) {
        if ($pageNum == $i) {
            $pageStr .= "<span class='current page'>{$i}</span>";
        } else {
            $pageStr .= "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $i . "'>{$i}</a>";
        }
    }

    if ($pageTotal > $pageView && $pageTotal > ($pageNum + $pageOffset)) {
        $pageStr .= "<span class='page'>...</span>";
    }

    if ($pageNum >= $pageTotal) {
        $pageStr .= "<span class='next disabled page'>下一页</span>";
        $pageStr .= "<span class='last disabled page'>尾页</span>";

    } else {

        $pageStr .= "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . ($pageNum + 1) . "' class='next'>下一页</a>";
        $pageStr .= "<a href='" . $_SERVER['PHP_SELF'] . "?page=" . $totalPage . "' class='last'>尾页</a>";
    }
    $pageStr .= "<span>共" . $pageTotal . "页</span>";
    $pageStr .= "<form class='pageform' action='index.php' method='post'>";
    $pageStr .= "<span>到 <input type='text' size='2' name='page'>页</span><input type='submit' value='确定' />";
    $pageStr .= "</form>";
    $pageStr .= "</div>";

    echo $pageStr;
} else {
    ?>
					<div class="news-nodata-box">
						<p class="tip-1">暂时没有新闻！</p>
						<p class="align-c"><a class="btn btn-success" href="editNews.php?action=create">添加新闻</a></p>
					</div>
			<?php
}

?>
		</div>
	</div>

		</div>
	</div>
</body>
</html>
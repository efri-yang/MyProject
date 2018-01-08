$str. ='<ul>'
$emptyholer = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", 0);
foreach($data as $k => $v) {
    $str. = "<li><a href='index.php’>文章管理</a>";
    if (count($v['sub'])) {
        //dispalyAside($v['sub'],$pid=$[‘id’]=2,1,$str=”<ul><li><a href='index.php’>文章管理</a>”)
        $str = function() {
            $str. ='<ul>'//<ul><li><a href='index.php’>文章管理</a><ul>
                $emptyholer = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", 1);
            foreach($data as $k => $v) {
                $str. = "<li><a href='index.php’>文章列表</a>";
                //<ul><li><a href='index.php’>文章管理</a><ul><li><a href='index.php’>文章列表</a>
                if (count($v['sub'])) {
                    //$v['sub']=array(sub=[国外文章，国内文章])

                    //dispalyAside($v[‘sub],$pid=$[‘id’]=3,1,$str=”<ul><li><a href='index.php’>文章管理</a><ul><li><a href='index.php’>文章列表</a>”)
                    $str = function() {
                        $str. ='<ul>'
                            //<ul><li><a href='index.php’>文章管理</a><ul><li><a href='index.php’>文章列表</a><ul>
                            $emptyholer = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", 2);
	                        foreach($data as $k => $v) {
	                            $str. = "<li><a href='index.php’>国内文章</a>";
	                            $str. = "</li>";
	                        }
	                        $str. = "</ul>";
	                        Return $str
                        //<ul><li><a href='index.php’>文章管理</a>
                        //<ul><li><a href='index.php’>文章列表</a><ul><li><a href='index.php’>国内文章</a></li><li><a href='index.php’>国外文章</a></li></ul>

                    }()


                }
                $str. = '<li>' //上面返回的str 加载 li


            }
            $str. ='<ul>'
                //<ul><li><a href='index.php’>文章管理</a>
                //<ul><li><a href='index.php’>文章列表</a>ul><li><a href='index.php’>国内文章</a></li><li><a href='index.php’>国内文章</a></li></ul><li><ul>


        }()
        $str. = '<li>'

    }
    $str. ='<ul>'

}
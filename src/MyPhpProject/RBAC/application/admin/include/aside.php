<?php
	$sql="select user_role.rid,perssion.id,perssion.pid,perssion.name,perssion.fname,perssion.status,perssion.aside from user_role inner join perssion_role on user_role.rid=perssion_role.rid inner join perssion on perssion_role.pid=perssion.id   where uid='$userId' and perssion.aside=1";
	$result=$mysqli->query($sql);
	while ($row=$result->fetch_assoc()) {
        $resArr[]=$row;
    }
    $tree=new Tree();
    $asideData=$tree->hTree($resArr);
    function dispalyAside($data,$className='homeIndex',$pid=0,$step=0,$str=""){
        $str.="<ul>";
        $emptyholer=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$step);
        foreach ($data as $k => $v) {
            $subLen=count($v["sub"]);
            $current=($v['fname']==$className) ? 'current' :"";
            $arrowElem=$subLen ? "<b class='arrow'>></b>" :'';
            $str.="<li class='".$current."'><a href='".$v["fname"]."php'>".$emptyholer.$v["name"].$arrowElem."</a>";
            if($subLen){
                $str=dispalyAside($v["sub"],$className,$v['id'],$step+1,$str);
            }
            $str.="</li>";
        }
        $str.="</ul>";
        return $str;
    }
?>

<style type="text/css">
    .aside-nav-list > ul li a b{
        padding:5px 10px;
        background:red;  
    }
</style>
<script type="text/javascript">
    $(function(){
        $(".aside-nav-list").find("li.current").parents("li").addClass("active");

        $(".aside-nav-list").find(".arrow").on("click",function(event){
            event.stopPropagation();
            var $this=$(this);
            var $parent= $this.parent().parent("li");
            if($parent.hasClass('current')){
                $parent.removeClass('current');
            }else{
                $parent.addClass('current');
            }
            return false;
        })
    })
</script>
<?php
	$a = array(
    array('id' => 1, 'pid' => 0, 'name' => '第一级'),
    array('id' => 2, 'pid' => 1, 'name' => '第二级'),
    array('id' => 3, 'pid' => 2, 'name' => '第三级'),
    array('id' => 4, 'pid' => 3, 'name' => '第四级'),
    array('id' => 5, 'pid' => 3, 'name' => '第四级'),
    array('id' => 6, 'pid' => 3, 'name' => '第四级'),
);
 
function breadcrumbs(&$arr, $id)
{
    foreach ($arr as $row)
    {
        if ($row['id'] == $id)
        {
            $tmp[] = $row['name'];
            if (!empty($row['pid']))
            {
                $tmp = array_merge(breadcrumbs($arr, $row['pid']), $tmp);
            }
        }
    }
    if (is_array($tmp) && !empty($tmp))
    {
        return $tmp;
    }
    else
    {
        return array();
    }
}
 
$arr = breadcrumbs($a, 5);
$str = implode(' / ', $arr);
echo $str;
?>
<?php
namespace app\admin\common;
class Tree2 {
    static public function sort($arr, $cols) {
        //子分类排序
        foreach ($arr as $k => &$v) {
            if (!empty($v['sub'])) {
                $v['sub'] = self::sort($v['sub'], $cols);
            }
            $sort[$k] = $v[$cols];
        }
        if (isset($sort)) {
            array_multisort($sort, SORT_DESC, $arr);
        }

        return $arr;
    }
    /**
     * 横向分类树
     */
    static public function hTree($arr, $pid = 0) {
        foreach ($arr as $k => $v) {
            if ($v['pid'] == $pid) {
                $data[$v['id']] = $v;
                $data[$v['id']]['sub'] = self::hTree($arr, $v['id']);
            }
        }
        return isset($data) ? $data : array();
    }
    /**
     * 纵向分类树
     */
    static public function vTree($arr, $pid = 0) {
        foreach ($arr as $k => $v) {
            if ($v['pid'] == $pid) {
                $data[$v['id']] = $v;
                $data += self::vTree($arr, $v['id']);
            }
        }
        return isset($data) ? $data : array();
    }
}
?>
<?php
// +----------------------------------------------------------------------
// | Yzncms [ 御宅男工作室 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2007 http://yzncms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 御宅男 <530765310@qq.com>
// +----------------------------------------------------------------------
class content_output
{
    //信息ID
    public $id = 0;
    //栏目ID
    public $catid = 0;
    //模型ID
    public $modelid = 0;
    //字段信息
    public $fields = array();
    //模型缓存
    public $model = array();
    //数据
    protected $data = array();
    //最近错误信息
    protected $error = '';
    // 数据表名（不包含表前缀）
    protected $tablename = '';

    public function __construct($modelid)
    {
        $this->model = cache('Model');
        if ($modelid) {
            $this->setModelid($modelid);
        }
    }

    /**
     * 初始化
     * @param type $modelid
     * @return boolean
     */
    public function setModelid($modelid)
    {
        if (empty($modelid)) {
            return false;
        }
        $this->modelid = $modelid;
        if (empty($this->model[$this->modelid])) {
            return false;
        }
        $modelField = cache('ModelField');
        $this->fields = $modelField[$this->modelid];
        $this->tablename = trim($this->model[$this->modelid]['tablename']);
    }

    /**
     * 数据处理
     * @param type $data
     * @return type
     */
    public function get($data)
    {
        $this->data = $data;
        $this->catid = $data['catid'];
        $this->id = $data['id'];
        $info = array();
        foreach ($this->fields as $fieldInfo) {
            $field = $fieldInfo['field'];
            if (!isset($this->data[$field])) {
                continue;
            }
            //字段类型
            $func = $fieldInfo['formtype'];
            //字段内容
            $value = $this->data[$field];
            $result = method_exists($this, $func) ? $this->$func($field, $value) : $value;
            if ($result !== false) {
                $info[$field] = $result;
            }
        }
        return array_merge($this->data, $info);
    }

    
/**
 * 获取 日期时间字段类型 内容
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function datetime($field, $value)
{
    $setting = unserialize($this->fields[$field]['setting']);
    if ($setting['fieldtype'] == 'date' || $setting['fieldtype'] == 'datetime') {
        return $value;
    } else {
        $format_txt = $setting['format'];
    }
    if (strlen($format_txt) < 6) {
        $isdatetime = 0;
    } else {
        $isdatetime = 1;
    }
    if (empty($value)) {
        $value = time();
    }
    $value = date($format_txt, $value);
    return $value;
}

/**
 * 输出来源字段
 * @staticvar array $copyfrom_array
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return array
 */
function copyfrom($field, $value)
{
    static $copyfrom_array;
    $copyfrom_array = array();
    if ($value && strpos($value, '|') !== false) {
        $arr = explode('|', $value);
        $value = $arr[0];
        $value_data = $arr[1];
    }
    if ($value_data) {
        $copyfrom_link = $copyfrom_array[$value_data];
        if (!empty($copyfrom_array)) {
            $imgstr = '';
            if ($value == '') {
                $value = $copyfrom_link['siteurl'];
            }

            if ($copyfrom_link['thumb']) {
                $imgstr = "<a href='{$copyfrom_link['siteurl']}' target='_blank'><img src='{$copyfrom_link['thumb']}' height='15'></a> ";
            }

            return $imgstr . "<a href='$value' target='_blank' style='color:#AAA'>{$copyfrom_link['sitename']}</a>";
        }
    } else {
        return $value;
    }
}

/**
 * 关键字获取时处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return array 返回数组
 */
function keyword($field, $value)
{
    if ($value == '') {
        return '';
    }
    //对关键字进行处理，返回数组
    if (strpos($value, ',') === false) {
        $value = explode(' ', $value);
    } else {
        $value = explode(',', $value);
    }
    return $value;
}


}

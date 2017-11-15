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

class content_input
{
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
    //处理后的数据
    protected $infoData = array();
    //内容模型对象
    protected $ContentModel = null;
    //最近错误信息
    protected $error = '';
    // 数据表名（不包含表前缀）
    protected $tablename = '';

    /**
     * 构造函数
     * @param type $modelid 模型ID
     * @param type $Action 传入this
     */
    public function __construct($modelid)
    {
        $this->model = cache("Model");
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
     * 数据入库前处理
     * @param type $data
     * @param type $type 状态1插入数据，2更新数据，3包含以上两种
     * @return boolean|string
     */
    public function get($data, $type = 3)
    {
        //数据
        $this->data = $data;
        $info = array();
        foreach ($data as $field => $value) {
            //字段类型
            $func = $this->fields[$field]['formtype'];
            //检测对应字段方法是否存在，存在则执行此方法，并传入字段名和字段值
            if (method_exists($this, $func)) {
                $value = $this->$func($field, $value);
            }

            //主表附表数据分离
            if ($this->fields[$field]['issystem']) {
                $info['system'][$field] = $value;
            } else {
                $info['model'][$field] = $value;
            }
        }
        return $info;
    }

    

/**
 * 多行文本框
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function textarea($field, $value) {
    $setting = unserialize($this->fields[$field]['setting']);
    if (!$setting['enablehtml']) {
        $value = strip_tags($value);
    }
    return $value;
}

/**
 * 编辑器获取内容
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function editor($field, $value) {
    /*$setting = unserialize($this->fields[$field]['setting']);
    $isadmin = 0;
    //是否保存远程图片
    $enablesaveimage = (int) $setting['enablesaveimage'];
    if (defined("IN_ADMIN") && IN_ADMIN) {
        $isadmin = 1;
    }
    if ($enablesaveimage) {
        $Attachment = service('Attachment', array(
            "module" => $this->catid ? 'Content' : MODULE_NAME,
            "catid" => $this->catid? : 0,
            "isadmin" => $isadmin,
        ));
        //下载远程图片
        $value = $Attachment->download($value);
    }*/
    return $value;
}


/**
 * 标题字段类型数据获取
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return int
 */
function title($field, $value) {
    return \util\Input::forTag($value);
}


/**
 * 选项字段类型获取数据
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return boolean|string 字段配置
 */
function box($field, $value) {
    $setting = unserialize($this->fields[$field]['setting']);
    if ($setting['boxtype'] == 'checkbox') {
        if (!is_array($value) || empty($value))
            return false;
        //删除添加的默认值
        array_shift($value);
        $value = implode(',', $value);
        return $value;
    } elseif ($setting['boxtype'] == 'multiple') {
        if (is_array($value) && count($value) > 0) {
            $value = implode(',', $value);
            return $value;
        }
    } else {
        return $value;
    }
}


/**
 * 关键字字段类型数据获取
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return int
 */
function keyword($field, $value) {
    if ($value == '') {
        return $value;
    }
    return \util\Input::forTag($value);
}

/**
 * 获取Tags内容
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return type
 */
function tags($field, $value) {
    return trim($value);
}


/**
 * 获取字段来源处理
 * @param type $field
 * @param string $value
 * @return string
 */
function copyfrom($field, $value) {
    return \util\Input::forTag($value);
}

/**
 * 推荐位字段类型数据获取
 * @param type $field 字段名
 * @param type $value 字段内容
 * @return int
 */
function posid($field, $value)
{
    if (empty($value) || !is_array($value)) {
        return 0;
    }
    $number = count($value);
    $value = $number == 1 ? 0 : 1;
    return $value;
}


}

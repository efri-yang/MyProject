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
use think\Url;

class content_form
{

    //validate表单验证
    public $formValidateRules, $formValidateMessages, $formJavascript;
    //栏目ID
    public $catid = 0;
    //栏目缓存
    public $categorys = array();
    //模型ID
    public $modelid = 0;
    //字段信息
    public $fields = array();
    //模型缓存
    protected $model = array();
    //数据
    protected $data = array();
    //最近错误信息
    protected $error = '';
    // 数据表名（不包含表前缀）
    protected $tablename = '';

    /**
     * 构造函数
     * @param type $modelid 模型ID
     * @param type $catid 栏目id
     */
    public function __construct($modelid, $catid)
    {
        $this->model = cache("Model");
        if ($modelid) {
            $this->setModelid($modelid, $catid);
        }
    }

    /**
     * 初始化
     * @param type $modelid
     * @return boolean
     */
    public function setModelid($modelid, $catid)
    {
        if (empty($modelid)) {
            return false;
        }
        $this->modelid = $modelid;
        if (empty($this->model[$this->modelid])) {
            return false;
        }
        $modelField = cache('ModelField');
        $this->catid = $catid;
        $this->fields = $modelField[$this->modelid];
        $this->tablename = trim($this->model[$this->modelid]['tablename']);
    }

    /**
     * 魔术方法，获取配置
     * @param type $name
     * @return type
     */
    public function __get($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : (isset($this->$name) ? $this->$name : null);
    }

    /**
     *  魔术方法，设置options参数
     * @param type $name
     * @param type $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * 获取模型字段信息
     * @param type $data
     * @return type
     */
    public function get($data = array())
    {
        $this->data = $data;
        $info = array();
        foreach ($this->fields as $fieldInfo) {
            $field = $fieldInfo['field']; //字段名
            //判断是否后台
            if (defined('IN_ADMIN') && IN_ADMIN) {
                //判断是否内部字段，如果是，跳过
                if ($fieldInfo['iscore']) {
                    continue;
                }
            } else {
                //判断是否内部字段或者，是否禁止前台投稿字段
                if ($fieldInfo['iscore']) {
                    continue;
                }
                //是否在前台投稿中显示
                if (!$fieldInfo['isadd']) {
                    continue;
                }
            }
            //字段类型
            $func = $fieldInfo['formtype'];
            //判断对应方法是否存在，不存在跳出本次循环
            if (!method_exists($this, $func)) {
                continue;
            }
            $value = isset($this->data[$field]) ? $this->data[$field] : '';
            //如果是分页类型字段
            if ($func == 'pages' && isset($this->data['maxcharperpage'])) {
                $value = $this->data['paginationtype'] . '|' . $this->data['maxcharperpage'];
            }
            //取得表单HTML代码 传入参数 字段名 字段值 字段信息
            $form = $this->$func($field, $value, $fieldInfo);
            if ($form !== false) {
                $star = $fieldInfo['minlength'] || $fieldInfo['pattern'] ? 1 : 0;
                $fieldConfg = array(
                    'name' => $fieldInfo['name'],
                    'tips' => $fieldInfo['tips'],
                    'form' => $form,
                    'star' => $star,
                    'isomnipotent' => $fieldInfo['isomnipotent'],
                    'formtype' => $fieldInfo['formtype'],
                );
                //作为基本信息
                if ($fieldInfo['isbase']) {
                    $info['base'][$field] = $fieldConfg;
                } else {
                    $info['senior'][$field] = $fieldConfg;
                }
            }
        }
        return $info;
    }

    /**
     * 转换为validate表单验证相关的json数据
     * @param type $ValidateRules
     */
    public function ValidateRulesJson($ValidateRules, $suang = false)
    {
        foreach ($ValidateRules as $formname => $value) {
            $va = array();
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    //如果作为消息，消息内容需要加引号，不然会JS报错，是否验证不需要
                    if ($suang) {
                        $va[] = "$k:'$v'";
                    } else {
                        $va[] = "$k:$v";
                    }
                }
            }
            $va = "{" . implode(",", $va) . "}";
            $formValidateRules[] = "'$formname':$va";
        }
        $formValidateRules = "{" . implode(",", $formValidateRules) . "}";
        return $formValidateRules;
    }

    

/**
 * 单行文本框字段类型表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function text($field, $value, $fieldinfo) {
    //扩展配置
    $setting = unserialize($fieldinfo['setting']);
    $size = $setting['size'] ? "style=\"width:{$setting['size']}px;\"" : '';
    if (empty($value)) {
        $value = $setting['defaultvalue'];
    }
    //文本框类型
    $type = $setting['ispassword'] ? 'password' : 'text';
    //错误提示
    $errortips = $fieldinfo['errortips'];
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    return '<input type="' . $type . '" name="info[' . $field . ']" id="' . $field . '" ' . $size . ' value="' . $value . '" class="input" ' . $fieldinfo['formattribute'] . ' ' . $fieldinfo['css'] . '>';
}
/**
 * 多行文本框 表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return string
 */
function textarea($field, $value, $fieldinfo) {
    //扩展配置
    $setting = unserialize($fieldinfo['setting']);
    if(!$value) $value = $setting['defaultvalue'];
    //错误提示
    $errortips = $fieldinfo['errortips'];
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    $str = "<textarea name='info[{$field}]' id='{$field}' style='width:{$setting['width']}%;height:{$setting['height']}px;' {$fieldinfo['formattribute']} {$fieldinfo['css']}";
    //长度处理
    if ($fieldinfo['maxlength']) {
        $str .= " onkeyup=\"strlen_verify(this, '{$field}_len', {$fieldinfo['maxlength']})\"";
    }
    $str .= ">{$value}</textarea>";
    if ($fieldinfo['maxlength'])
        $str .= '还可以输入<B><span id="' . $field . '_len">' . $fieldinfo['maxlength'] . '</span></B>个字符！ ';

    return $str;
}
/**
 * 编辑器字段 表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function editor($field, $value, $fieldinfo) {
    $setting = unserialize($fieldinfo['setting']);
    //是否禁用分页和子标题 基本没用。。。
    $disabled_page = isset($disabled_page) ? $disabled_page : 0;
    //编辑器高度
    $height = $setting['height'];
    if (empty($setting['height'])) {
        $height = 300;
    }
    if (defined('IN_ADMIN') && IN_ADMIN) {
        //是否允许上传
        $allowupload = 1;
        //编辑器类型，简洁型还是标准型
        $toolbar = $setting['toolbar'];
    } else {
        //获取当前登陆会员组id
        $groupid = cookie('groupid');
        if (isModuleInstall('Member')) {
            $Member_group = cache("Member_group");
            //是否允许上传
            $allowupload = $Member_group[$groupid]['allowattachment'] ? 1 : 0;
        } else {
            $allowupload = 0;
        }
        //编辑器类型，简洁型还是标准型
        $toolbar = $setting['mbtoolbar'] ? $setting['mbtoolbar'] : "basic";
    }

    //内容
    if (empty($value)) {
        $value = $setting['defaultvalue'] ? $setting['defaultvalue'] : '<p></p>';
    }
    if ($setting['minlength'] || $fieldinfo['pattern']) {
        $allow_empty = '';
    }
    //模块
    $module = '';
    $form = \util\Form::editor($field, $toolbar, $module, $this->catid, $allowupload, $allowupload, '', 10, $height, $disabled_page);
    //javascript
    $this->formJavascript .= "
            //增加编辑器验证规则
            jQuery.validator.addMethod('editor{$field}',function(){
                return " . ($fieldinfo['minlength'] ? "editor{$field}.getContent();" : "true") . "
            });
    ";
    //错误提示
    $errortips = $this->fields[$field]['errortips'];
    //20130428 由于没有设置必须输入时，ajax提交会造成获取不到编辑器的值。所以这里强制进行验证，使其触发编辑器的sync()方法
    // if ($minlength){
    //验证规则
    $this->formValidateRules['info[' . $field . ']'] = array("editor$field" => "true");
    //验证不通过提示
    $this->formValidateMessages['info[' . $field . ']'] = array("editor$field" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    // }
    return "<div id='{$field}_tip'></div>" . '<script type="text/plain" style="width:100%;" id="' . $field . '" name="info[' . $field . ']">' . $value . '</script>' . $form;
}

/**
 * 栏目字段
 * @param type $field 字段名
 * @param type $value 字段值
 * @param type $fieldinfo 该字段的配置信息
 * @return type
 */
function catid($field, $value, $fieldinfo) {
    //值不存在则值等于栏目ID
    if(!$value) $value = $this->catid;
    $publish_str = '';
    if (defined("IN_ADMIN") && IN_ADMIN) {
        $publish_str = "<a href='javascript:;' onclick=\"omnipotent('selectid','" . Url::build("Content/Content/public_othors", array("catid" => $this->catid)) . "','同时发布到其他栏目',1);return false;\" style='color:#B5BFBB'>[同时发布到其他栏目]</a>
            <ul class='three_list cc' id='add_othors_text'></ul>";
    }
    $publish_str = '<input type="hidden" name="info[' . $field . ']" value="' . $value . '"/>' . getCategory($value, 'catname') . $publish_str;
    return $publish_str;
}
/**
 * 标题字段，表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return string
 */
function title($field, $value, $fieldinfo)
{
    //取得标题样式
    $style_arr = explode(';', $this->data['style']);
    //取得标题颜色
    $style_color = $style_arr[0];
    //是否粗体
    $style_font_weight = $style_arr[1] ? $style_arr[1] : '';
    //组合成CSS样式
    $style = 'color:' . $this->data['style'];
    //错误提示
    $errortips = $fieldinfo['errortips'];
    //是否进行最小长度验证
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : "标题不能为空！");
    }
    $str = '<input type="text" style="width:400px;' . ($style_color ? 'color:' . $style_color . ';' : '') . ($style_font_weight ? 'font-weight:' . $style_font_weight . ';' : '') . '" name="info[' . $field . ']" id="' . $field . '" value="' . \util\Input::forTag($value) . '" style="' . $style . '" class="input input_hd J_title_color" placeholder="请输入标题" onkeyup="strlen_verify(this, \'' . $field . '_len\', ' . $fieldinfo['maxlength'] . ')" />
                <input type="hidden" name="style_font_weight" id="style_font_weight" value="' . $style_font_weight . '">';
    //后台的情况下
    if (defined('IN_ADMIN') && IN_ADMIN) {
        $str .= '<input type="button" class="btn btn-primary" id="check_title_alt" value="标题检测" onclick="$.get(\'' . Url::build('Content/Content/public_check_title', array('catid' => $this->catid)) . '\', {data:$(\'#title\').val()}, function(data){if(data.status==false) {$(\'#check_title_alt\').val(\'标题重复\');$(\'#check_title_alt\').css(\'background-color\',\'#ec4758\');} else if(data.status==true) {$(\'#check_title_alt\').val(\'标题不重复\');$(\'#check_title_alt\').css(\'background-color\',\'#1a7bb9\')}},\'json\')" style="width:85px;"/>
        <span class="color_pick J_color_pick"><em style="background:' . $style_color . ';" class="J_bg"></em></span>
        <input type="hidden" name="style_color" id="style_color" class="J_hidden_color" value="' . $style_color . '">
        <img src="' . __STATIC__ . '/admin/images/icon/bold.png" width="10" height="10" onclick="input_font_bold()" style="cursor:hand"/>';
    }

    $str .= ' <span>还可输入<B><span id="title_len">' . $fieldinfo['maxlength'] . '</span></B> 个字符</span>';
    return $str;
}


/**
 * 选项字段类型表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function box($field, $value, $fieldinfo) {
    //错误提示
    $errortips = $fieldinfo['errortips'];
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    //扩展配置
    $setting = unserialize($fieldinfo['setting']);
    if (is_null($value) || $value == ''){
        $value = $setting['defaultvalue'];
    }
    $options = explode("\n", $setting['options']);
    foreach ($options as $_k) {
        $v = explode("|", $_k);
        $k = trim($v[1]);
        $option[$k] = $v[0];
    }
    $values = explode(',', $value);
    $value = array();
    foreach ($values as $_k) {
        if ($_k != '')
            $value[] = $_k;
    }
    $value = implode(',', $value);
    switch ($setting['boxtype']) {
        case 'radio':
            $string = \util\Form::radio($option, $value, "name='info[$field]' {$fieldinfo['formattribute']}", $setting['width'], $field);
            break;

        case 'checkbox':
            $string = \util\Form::checkbox($option, $value, "name='info[$field][]' {$fieldinfo['formattribute']}", 1, $setting['width'], $field);
            break;

        case 'select':
            $string = \util\Form::select($option, $value, "name='info[$field]' id='$field' {$fieldinfo['formattribute']}");
            break;

        case 'multiple':
            $string = \util\Form::select($option, $value, "name='info[$field][]' id='$field ' size=2 multiple='multiple' style='height:60px;' {$fieldinfo['formattribute']}");
            break;
    }
    return $string;
}

/**
 * 图片字段表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function image($field, $value, $fieldinfo) {
    //错误提示
    $errortips = $fieldinfo['errortips'];
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    $setting = unserialize($fieldinfo['setting']);
    $width = $setting['width'] ? $setting['width'] : 180;
    $html = '';
    //图片裁减功能只在后台使用
    if (defined('IN_ADMIN') && IN_ADMIN) {
        $html = " <input type=\"button\" class=\"btn\" onclick=\"crop_cut_" . $field . "($('#$field').val());return false;\" value=\"裁减图片\">
            <input type=\"button\"  class=\"btn\" onclick=\"$('#" . $field . "_preview').attr('src','" . __STATIC__ . "/admin/images/icon/upload-pic.png');$('#" . $field . "').val('');return false;\" value=\"取消图片\"><script type=\"text/javascript\">
            function crop_cut_" . $field . "(id){
	if ( id =='' || id == undefined ) {
                      isalert('请先上传缩略图！');
                      return false;
                    }
                    var catid = $('input[name=\"info[catid]\"]').val();
                    if(catid == '' ){
                        isalert('请选择栏目ID！');
                        return false;
                    }
                    Wind.use('artDialog','iframeTools',function(){
                      art.dialog.open('index.php?a=public_imagescrop&m=Content&g=Content&catid='+catid+'&picurl='+encodeURIComponent(id)+'&input=$field&preview=" . ($setting['show_type'] && defined('IN_ADMIN') ? $field . "_preview" : '') . "', {
                        title:'裁减图片',
                        id:'crop',
                        ok: function () {
                            var iframe = this.iframe.contentWindow;
                            if (!iframe.document.body) {
                                 alert('iframe还没加载完毕呢');
                                 return false;
                            }
                            iframe.uploadfile();
                            return false;
                        },
                        cancel: true
                      });
                    });
            };
</script>";
    }
    //模块
    $module = request()->module();
    //生成上传附件验证
    $authkey = upload_key("1,{$setting['upload_allowext']},{$setting['isselectimage']},{$setting['images_width']},{$setting['images_height']},{$setting['watermark']}");
    //图片模式
    if ($setting['show_type']) {
        $preview_img = $value ? $value : __STATIC__ . '/admin/images/icon/upload-pic.png';
        return "<div  style=\"text-align: center;\"><input type='hidden' name='info[$field]' id='$field' value='$value'>
			<a href='javascript:void(0);' onclick=\"flashupload('{$field}_images', '附件上传','{$field}',thumb_images,'1,{$setting['upload_allowext']},{$setting['isselectimage']},{$setting['images_width']},{$setting['images_height']},{$setting['watermark']}','{$module}','$this->catid','$authkey');return false;\">
			<img src='$preview_img' id='{$field}_preview' width='135' height='113' style='cursor:hand' /></a>
                       <br/> " . $html . "
                   </div>";
    } else {
        //文本框模式
        return "<input type='text' name='info[$field]' id='$field' value='$value' style='width:{$width}px;' class='input' />  <input type='button' class='button' onclick=\"flashupload('{$field}_images', '附件上传','{$field}',submit_images,'1,{$setting['upload_allowext']},{$setting['isselectimage']},{$setting['images_width']},{$setting['images_height']},{$setting['watermark']}','{$module}','$this->catid','$authkey')\"/ value='上传图片'>" . $html;
    }
}

/**
 * 数字字段类型表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function number($field, $value, $fieldinfo) {
    $setting = unserialize($fieldinfo['setting']);
    $size = $setting['size']?"style=\"width:{$setting['size']}px;\"":"";
    if ($value == '') {
        $value = $setting['defaultvalue'];
    }
    //错误提示
    $errortips = $fieldinfo['errortips'];
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    return "<input type='text' name='info[{$field}]' id='{$field}' value='{$value}' class='input' {$size} {$fieldinfo['formattribute']} {$fieldinfo['css']} />";
}

/**
 * 日期时间字段类型表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function datetime($field, $value, $fieldinfo) {
    //错误提示
    $errortips = $fieldinfo['errortips'];
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    $setting = unserialize($fieldinfo['setting']);
    $isdatetime = 0;
    $timesystem = 0;
    //时间格式
    if ($setting['fieldtype'] == 'int') {//整数 显示格式
        if (empty($value) && $setting['defaulttype']) {
            $value = time();
        }
        //整数 显示格式
        $format_txt = $setting['format'] == 'm-d' ? 'm-d' : $setting['format'];
        if ($setting['format'] == 'Y-m-d Ah:i:s') {
            $format_txt = 'Y-m-d h:i:s';
        }
        $value = $value ? date($format_txt, $value) : '';
        $isdatetime = strlen($setting['format']) > 6 ? 1 : 0;
        if ($setting['format'] == 'Y-m-d Ah:i:s') {
            $timesystem = 0;
        } else {
            $timesystem = 1;
        }
    } elseif ($setting['fieldtype'] == 'datetime') {
        $isdatetime = 1;
        $timesystem = 1;
    } elseif ($setting['fieldtype'] == 'datetime_a') {
        $isdatetime = 1;
        $timesystem = 0;
    }
    return \util\Form::date("info[{$field}]", $value, $isdatetime, 1, 'true', $timesystem);
}

/**
 * 关键字类型字段，表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function keyword($field, $value, $fieldinfo) {
    //错误提示
    $errortips = $fieldinfo['errortips'];
    //字段最小长度检测
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : "请输入关键字！");
    }
    return "<input type='text' name='info[{$field}]' id='{$field}' value='".\util\Input::forTag($value)."' style='width:280px' {$fieldinfo['formattribute']} {$fieldinfo['css']} class='input' placeholder='请输入关键字'>";
}
/**
 * Tags表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function tags($field, $value, $fieldinfo) {
    //错误提示
    $errortips = $fieldinfo['errortips'];
    //最想长度验证
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : "请输入Tags标签！");
    }
    return "<input type='text' name='info[{$field}]' id='{$field}' value='{$value}' style='width:280px' {$fieldinfo['formattribute']} {$fieldinfo['css']} class='input' placeholder='请输入Tags标签'>";
}

/**
 * 作者字段类型表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function author($field, $value, $fieldinfo) {
    //扩展配置
    $setting = unserialize($fieldinfo['setting']);
    //默认显示
    if ($value == '') {
        $value = $setting['defaultvalue'];
    }
    //错误提示
    $errortips = $fieldinfo['errortips'];
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    //宽度
    $width = $setting['width'] ? ('width:' . $setting['width'] . 'px') : 'width:180px';
    return '<input type="text" class="input" name="info[' . $field . ']" value="' . \util\Input::forTag($value) . '" style="' . $width . '" placeholder="请输入' . $fieldinfo['name'] . '信息">';
}

/**
 * 来源字段 表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function copyfrom($field, $value, $fieldinfo) {
    //扩展配置
    $setting = unserialize($fieldinfo['setting']);
    if (empty($value)) {
        $value = $setting['defaultvalue'];
    }
    //错误提示
    $errortips = $fieldinfo['errortips'];
    //字段最小值判断
    if ($fieldinfo['minlength']) {
        //验证规则
        $this->formValidateRules['info[' . $field . ']'] = array("required" => true);
        //验证不通过提示
        $this->formValidateMessages['info[' . $field . ']'] = array("required" => $errortips ? $errortips : $fieldinfo['name'] . "不能为空！");
    }
    $width = $setting['width'] ? $setting['width'] : 180;
    return "<input type='text' name='info[{$field}]' value='".\util\Input::forTag($value)."' style='width:{$width}px;' class='input' placeholder='信息来源'/>";
}
/**
 * 转向地址 字段类型表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return type
 */
function islink($field, $value, $fieldinfo) {
    if ($value) {
        $url = $this->data['url'];
        $checked = 'checked';
        $_GET['islink'] = 1;
    } else {
        $disabled = 'disabled';
        $url = $checked = '';
        $_GET['islink'] = 0;
    }
    $size = $fieldinfo['size'] ? $fieldinfo['size'] : 200;
    return '<input type="hidden" name="info[islink]" value="0"><input type="text" name="linkurl" id="linkurl" value="' . $url . '" style="width:' . $size . 'px;"maxlength="255" ' . $disabled . ' class="input length_3"> <input name="info[islink]" type="checkbox" id="islink" value="1" onclick="ruselinkurl();" ' . $checked . '> <font color="red">转向链接</font>';
}
//模板字段
function template($field, $value, $fieldinfo) {
    return \util\Form::select_template("", 'content', $value, 'name="info[' . $field . ']" id="' . $field . '"', 'show');
}

/**
 * 推荐字段类型表单组合处理
 * @param type $field 字段名
 * @param type $value 字段内容
 * @param type $fieldinfo 字段配置
 * @return string
 */
function posid($field, $value, $fieldinfo)
{
    //扩展配置
    $setting = unserialize($fieldinfo['setting']);
    //推荐位缓存
    $position = cache('Position');
    if (empty($position)) {
        return '';
    }
    $array = array();
    foreach ($position as $_key => $_value) {
        //如果有设置模型，检查是否有该模型
        if ($_value['modelid'] && !in_array($this->modelid, explode(',', $_value['modelid']))) {
            continue;
        }
        //如果设置了模型，又设置了栏目
        if ($_value['modelid'] && $_value['catid'] && !in_array($this->catid, explode(',', $_value['catid']))) {
            continue;
        }
        //如果设置了栏目
        if ($_value['catid'] && !in_array($this->catid, explode(',', $_value['catid']))) {
            continue;
        }
        $array[$_key] = $_value['name'];
    }
    $posids = array();
    if (request()->action() == 'edit') {
        $result = think\Db::name('PositionData')->where(array('id' => $this->id, 'modelid' => $this->modelid))->column("posid,id,catid,posid,module,modelid,thumb,data,listorder,expiration,extention,synedit");
        $posids = implode(',', array_keys($result));
    } else {
        $posids = $setting['defaultvalue'];
    }
    return "<input type='hidden' name='info[{$field}][]' value='-1'>" . \util\Form::checkbox($array, $posids, "name='info[{$field}][]'", '', $setting['width']);
}

}

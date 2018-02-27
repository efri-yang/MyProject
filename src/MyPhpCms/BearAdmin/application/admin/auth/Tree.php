<?php
namespace app\admin\auth;

/**
 * 通用的树型类
 */
class Tree {
	public $text, $html;
	/**
	 * 生成树型结构所需要的2维数组
	 * @var array
	 */
	public $arr = array();

	/**
	 * 生成树型结构所需修饰符号，可以换成图片
	 * @var array
	 */
	public $icon = array('│', '├', '└');
	public $nbsp = "&nbsp;";
	/**
	 * @access private
	 */
	public $ret = '';

	/**
	 * 构造函数，初始化类
	 * @param array 2维数组，例如：
	 * array(
	 *      1 => array('id'=>'1','parentid'=>0,'name'=>'一级栏目一'),
	 *      2 => array('id'=>'2','parentid'=>0,'name'=>'一级栏目二'),
	 *      3 => array('id'=>'3','parentid'=>1,'name'=>'二级栏目一'),
	 *      4 => array('id'=>'4','parentid'=>1,'name'=>'二级栏目二'),
	 *      5 => array('id'=>'5','parentid'=>2,'name'=>'二级栏目三'),
	 *      6 => array('id'=>'6','parentid'=>3,'name'=>'三级栏目一'),
	 *      7 => array('id'=>'7','parentid'=>3,'name'=>'三级栏目二')
	 *      )
	 * @return bool
	 */
	//初始化arr=menu
	public function init($arr = array()) {
		$this->arr = $arr;
		$this->ret = '';
		return is_array($arr);
	}

	/**
	 * 得到树型结构
	 * @param int $myid ，表示获得这个ID下的所有子级
	 * @param string $str 生成树型结构的基本代码，例如："<option value=\$id \$selected>\$spacer\$name</option>"
	 * @param int $sid 被选中的ID，比如在做树型下拉框的时候需要用到
	 * @param string $adds
	 * @param string $str_group
	 * @return string
	 */
	public function get_tree($myid, $str, $sid = 0, $adds = '', $str_group = '') {
		$parent_id = '';
		$nstr = '';
		$number = 0;
		$child = $this->get_child($myid);

		if (is_array($child)) {
			$total = count($child);
			foreach ($child as $id => $value) {
				$j = $k = '';
				if ($number == $total) {
					$j .= $this->icon[2];
				} else {
					$j .= $this->icon[1];
					$k = $adds ? $this->icon[0] : '';
				}
				$spacer = $adds ? $adds . $j : '';
				$selected = $id == $sid ? 'selected' : '';
				extract($value);
				$parent_id == 0 && $str_group ? eval("\$nstr = \"$str_group\";") : eval("\$nstr = \"$str\";");
				$this->ret .= $nstr;
				$nbsp = $this->nbsp;
				$this->get_tree($id, $str, $sid, $adds . $k . $nbsp, $str_group);
				$number++;
			}
		}
		return $this->ret;
	}

	/**
	 * 获取后台左侧菜单
	 * @param $myid
	 * @param $current_id
	 * @param $parent_ids
	 * @return mixed
	$current_id=1;
	$parent_ids=Array ( [0] => 0 )
	$tree->get_authTree(0, $current_id, $parent_ids); *
	 */
	public function get_authTree($myid, $current_id, $parent_ids) {
		$nstr = '';
		//获取parent_id=$myid 的项(数组) parent_id=0 的选项
		$child = $this->get_child($myid);
		// print_r($child);
		// exit();
		if (is_array($child)) {
			//获取数组的每个数组中都有一个内部的指针指向它的"当前"元素，初始指向插入到数组中的第一个元素。
			$menu = current($child); //当前项

			// dump($this->text);
			// exit();
			//获取当前等级的html
			$text = isset($this->text[$menu['level']]) ? $this->text[$menu['level']] : end($this->text);

			foreach ($child as $k => $v) {
				//将v 数组选项中的键值赋予键名字，这个时候就可以取得$title,$menu_id
				@extract($v);
				// print_r($v);
				// exit();
				//如果有下级  在menu 中查找 parent_id==menu_id 的项，存在 就证明 当前项有父项
				if ($this->get_child($k)) {
					//array_search() 函数在数组中搜索某个键值，并返回对应的键名。
					//如果能在$parent_ids 找得到menu_id
					if (array_search($k, $parent_ids, true) !== false) {
						//如果下级菜单是当前页面
						eval("\$nstr = \"$text[1]\";");
						$this->html .= $nstr;
					} else {
						//如果下级菜单不是当前页面
						eval("\$nstr = \"$text[0]\";");
						$this->html .= $nstr;
					}

					self::get_authTree($k, $current_id, $parent_ids);
					eval("\$nstr = \"$text[2]\";");
					$this->html .= $nstr;
				} else {
					//顶级菜单，只有一级
					if ($k == $current_id) {
						$a = $this->text['current'];
						eval("\$nstr = \"$a\";");

						$this->html .= $nstr;
					} else {
						$a = $this->text['other'];
						eval("\$nstr = \"$a\";");
						$this->html .= $nstr;
					}
				}
			}
		}
		return $this->html;
	}

	/**
	 * 得到子级数组
	 * @param int $myid
	 * @return array
	 */
	public function get_child($myid) {
		$a = $newarr = array();
		//这个时候arr=getMenuList(userId) arr 表示用户所拥有的权限菜单
		if (is_array($this->arr)) {
			foreach ($this->arr as $id => $a) {
				if ($a['parent_id'] == $myid) {
					$newarr[$id] = $a;
				}

			}
		}
		return $newarr ? $newarr : false;
	}

	/**
	 * 递归获取级别
	 * @param int $id ID
	 * @param array $array 所有菜单
	 * @param int $i 所在级别
	 * @return array
	 */
	//$tree->get_level($v['menu_id'], $menu);
	public function get_level($id, $array = array(), $i = 0) {
		//parent_id=0 证明是第一级别  或者 parent_id 找不到对应的键值说明是顶级(第一级) 或者是  当前项的parent_id等于id,那么level 就是0，level 取决于你的参照物
		if ($array[$id]['parent_id'] == 0 || empty($array[$array[$id]['parent_id']]) || $array[$id]['parent_id'] == $id) {
			return $i;
		} else {
			$i++;
			return self::get_level($array[$id]['parent_id'], $array, $i);
		}
	}

	public function get_authTree_access($myid) {
		$id = '';
		$nstr = '';
		$child = $this->get_child($myid);

		if (is_array($child)) {
			$level = current($child);
			$text = isset($this->text[$level['level']]) ? $this->text[$level['level']] : end($this->text);

			foreach ($child as $k => $v) {
				@extract($v);

				if ($this->get_child($k)) {
					eval("\$nstr = \"$text[0]\";");
					$this->html .= $nstr;

					self::get_authTree_access($k);

					eval("\$nstr = \"$text[1]\";");
					$this->html .= $nstr;
				} else {
					$a = $this->text['other'];
					eval("\$nstr = \"$a\";");
					$this->html .= $nstr;
				}
			}
		}
		return $this->html;
	}
}
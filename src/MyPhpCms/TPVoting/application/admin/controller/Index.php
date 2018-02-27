<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;

class Index extends Controller {

	public function index() {
		$request = Request::instance();
		$clicked_url = $request->url(); //获取每次点击的url
		$nav_arr = [
			[

				'name' => '用户管理',
				'url' => url('/admin/UserManager/getAllUser'),
				'other' => [url('/admin/UserManager/getUserDetail')],
				'icon' => 'fa fa-user-md',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],
			[
				'name' => '开仓平仓',
				'url' => url('/admin/Warehouse/getAllWarehouse'),
				'icon' => 'gi gi-airplane',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],
			[
				'name' => '盈利播报',
				'url' => url('/admin/ProfitBroadcast/profitBroad'),
				'icon' => 'fa fa-bullhorn',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],
			[
				'name' => '产品管理',
				'url' => url('/admin/Product/getAllProduct'),
				'icon' => 'fa fa-product-hunt',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],
			[
				'name' => '所有订单',
				'url' => url('/admin/Product/getAllProduct'),
				'icon' => 'fa fa-gavel',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],
			[
				'name' => '财务管理',
				'url' => url('/admin/Finance/financeInfo'),
				'icon' => 'fa fa-money',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],
			[
				'name' => '编辑规则',
				'url' => url('/admin/EditRule/edit'),
				'icon' => 'fa fa-pencil-square-o',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],

			[
				'name' => '系统设置',
				'icon' => 'fa fa-gear',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 1,
				'sub' => [
					[
						'name' => '提成设置',
						'url' => url('/admin/SystemSetting/commission'),
						'icon' => '',
						'style' => 'color: white',
						'state' => 0,
					],
					[
						'name' => '金额设置',
						'url' => url('/admin/SystemSetting/money'),
						'icon' => '',
						'style' => 'color: white',
						'state' => 0,
					],
				],
			],
			[
				'name' => '账号设置',
				'url' => url('/admin/AccountSetting/index'),
				'icon' => 'gi gi-user',
				'style' => 'color: white',
				'state' => 0,
				'hasSub' => 0,
			],
		];
		$nav_arr = $this->getMenu($nav_arr, $clicked_url); //对每个配置项进行状态设置

		$this->assign('clicked_url', $clicked_url); //对页面进行赋值
		$this->assign('nav_list', $nav_arr);
		return $this->fetch();
	}

	/**
	 * 将所点击的列表项以及其父列表项的state置1
	 *
	 * @param $menu_arr 菜单栏配置信息
	 * @param $url      点击的链接
	 * @return array|bool
	 */
	public function getMenu($menu_arr, $url) {

		if (!is_array($menu_arr)) {
			return false;
		}

		for ($i = 0; $i < count($menu_arr); $i++) {
			if (array_key_exists('url', $menu_arr[$i]) && !empty($menu_arr[$i]['url'])) {
				$menu_url = strtolower($menu_arr[$i]['url']);
				$url = strtolower($url);
				$menu_url = explode('.', $menu_url)[0];
				$url = explode('.', $url)[0];

//            比对点击的url和配置信息中的url是否一致
				if (strpos($menu_url, $url) !== false) {
					$menu_arr[$i]['state'] = 1;
					return $menu_arr;
				} else {

//                多个url绑定到一个列表项
					if (array_key_exists('other', $menu_arr[$i]) && !empty($menu_arr[$i]['other'])) {
						for ($j = 0; $j < count($menu_arr[$i]['other']); $j++) {
							$other_url = $menu_arr[$i]['other'][$j];
							$other_url = explode(',', strtolower($other_url))[0];
							if (strpos($other_url, $url) !== false) {

								$menu_arr[$i]['state'] = 1;
								return $menu_arr;
							}
						}
					}
				}
			} else {
				if (array_key_exists('sub', $menu_arr[$i])) {
//                继续进行递归搜索
					$sub = $this->getMenu($menu_arr[$i]['sub'], $url);

					if ($sub == $menu_arr[$i]['sub']) {
						$menu_arr[$i]['state'] = 0;
					} else {
						$menu_arr[$i]['state'] = 1;
					}

					$menu_arr[$i]['sub'] = $sub;
				}
			}
		}

		return $menu_arr;
	}

}

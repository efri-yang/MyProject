<?php
	$arr=[
        [

            'name'=>'用户管理',
            'url' =>url('/admin/UserManager/getAllUser'),
            'other'=>[url('/admin/UserManager/getUserDetail')],
            'icon'=>'fa fa-user-md',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],
        [
            'name'=>'开仓平仓',
            'url' =>url('/admin/Warehouse/getAllWarehouse'),
            'icon'=>'gi gi-airplane',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],
        [
            'name'=>'盈利播报',
            'url' =>url('/admin/ProfitBroadcast/profitBroad'),
            'icon'=>'fa fa-bullhorn',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],
        [
            'name'=>'产品管理',
            'url' =>url('/admin/Product/getAllProduct'),
            'icon'=>'fa fa-product-hunt',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],
        [
            'name'=>'所有订单',
            'url' =>url('/admin/Product/getAllProduct'),
            'icon'=>'fa fa-gavel',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],
        [
            'name'=>'财务管理',
            'url' =>url('/admin/Finance/financeInfo'),
            'icon'=>'fa fa-money',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],
        [
            'name'=>'编辑规则',
            'url' =>url('/admin/EditRule/edit'),
            'icon'=>'fa fa-pencil-square-o',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],

        [
            'name'=>'系统设置',
            'icon'=>'fa fa-gear',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>1,
            'sub'=>[
                [
                    'name'=>'提成设置',
                    'url' =>url('/admin/SystemSetting/commission'),
                    'icon'=>'',
                    'style'=>'color: white',
                    'state'=>0,
                ],
                [
                    'name'=>'金额设置',
                    'url' =>url('/admin/SystemSetting/money'),
                    'icon'=>'',
                    'style'=>'color: white',
                    'state'=>0,
                ],
            ]
        ],
        [
            'name'=>'账号设置',
            'url' =>url('/admin/AccountSetting/index'),
            'icon'=>'gi gi-user',
            'style'=>'color: white',
            'state'=>0,
            'hasSub'=>0
        ],
    ];


    <ul class="sidebar-nav" style="color: white;font-size: 17px;">
　　<volist name="nav_list" id="bar">
　　　　
      <li>
                                <if condition="$bar.hasSub == 1">
                                    <if condition="$bar.state == 1">
                                        <a href="#" class="sidebar-nav-menu open"   style="color: white">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                            <i class="fa fa-gear sidebar-nav-icon"></i>
                                            <span class="sidebar-nav-mini-hide">{$bar.name}</span>
                                        </a>
                                        <else/>
                                        <a href="#" class="sidebar-nav-menu"   style="color: white">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                            <i class="fa fa-gear sidebar-nav-icon"></i>
                                            <span class="sidebar-nav-mini-hide">{$bar.name}</span>
                                        </a>
                                    </if>

                                    <ul>
                                        <volist name="$bar.sub" id="sub_bar">

                                            <li>
                                                <if condition="$sub_bar.state == 1">
                                                    <a href="{$sub_bar.url}" class="active">{$sub_bar.name}</a>
                                                <else/>
                                                    <a href="{$sub_bar.url}" class="" style="color: white">{$sub_bar.name}</a>
                                                </if>
                                            </li>
                                        </volist>
                                    </ul>

                                <else/>
                                    <if condition="$bar.state == 1">
                                        <a href="{$bar.url}" class="open" style="{$bar.style}">
                                            <i class="{$bar.icon} sidebar-nav-icon"></i>
                                            <span>{$bar.name}</span>
                                        </a>
                                    <else/>

                                        <a href="{$bar.url}" style="{$bar.style}">
                                            <i class="{$bar.icon} sidebar-nav-icon"></i>
                                            <span>{$bar.name}</span>
                                        </a>
                                    </if>

                                </if>
                            </li>
　　</volist>
</ul>



?>


<ul class="sidebar-nav" style="color: white;font-size: 17px;">
　　<volist name="nav_list" id="bar">
　　　　
      <li>
                                <if condition="$bar.hasSub == 1">
                                    <if condition="$bar.state == 1">
                                        <a href="#" class="sidebar-nav-menu open"   style="color: white">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                            <i class="fa fa-gear sidebar-nav-icon"></i>
                                            <span class="sidebar-nav-mini-hide">{$bar.name}</span>
                                        </a>
                                        <else/>
                                        <a href="#" class="sidebar-nav-menu"   style="color: white">
                                            <i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                            <i class="fa fa-gear sidebar-nav-icon"></i>
                                            <span class="sidebar-nav-mini-hide">{$bar.name}</span>
                                        </a>
                                    </if>

                                    <ul>
                                        <volist name="$bar.sub" id="sub_bar">

                                            <li>
                                                <if condition="$sub_bar.state == 1">
                                                    <a href="{$sub_bar.url}" class="active">{$sub_bar.name}</a>
                                                <else/>
                                                    <a href="{$sub_bar.url}" class="" style="color: white">{$sub_bar.name}</a>
                                                </if>
                                            </li>
                                        </volist>
                                    </ul>

                                <else/>
                                    <if condition="$bar.state == 1">
                                        <a href="{$bar.url}" class="open" style="{$bar.style}">
                                            <i class="{$bar.icon} sidebar-nav-icon"></i>
                                            <span>{$bar.name}</span>
                                        </a>
                                    <else/>

                                        <a href="{$bar.url}" style="{$bar.style}">
                                            <i class="{$bar.icon} sidebar-nav-icon"></i>
                                            <span>{$bar.name}</span>
                                        </a>
                                    </if>

                                </if>
                            </li>
　　</volist>
</ul>
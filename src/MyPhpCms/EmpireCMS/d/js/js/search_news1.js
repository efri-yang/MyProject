function search_check(obj){if(obj.keyboard.value.length==0){alert('请输入搜索关键字');return false;}return true;}document.write("<table border=0 cellpadding=3 cellspacing=1><form name=search_js1 method=post action='/APhpCms/EmpireCMS/e/search/index.php' onsubmit='return search_check(document.search_js1);'><tr><td><div align=center>搜索: <select name=show><option value=title>标题</option><option value=smalltext>简介</option><option value=newstext>内容</option><option value=writer>作者</option><option value=title,smalltext,newstext,writer>搜索全部</option></select><select name=classid><option value=0>所有栏目</option><option value=2>|-新闻中心</option><option value=34>&nbsp;&nbsp;|-国内新闻</option><option value=35>&nbsp;&nbsp;|-国际新闻</option><option value=36>&nbsp;&nbsp;|-娱乐新闻</option><option value=37>&nbsp;&nbsp;|-体育新闻</option><option value=3>|-下载中心</option><option value=38>&nbsp;&nbsp;|-系统软件</option><option value=39>&nbsp;&nbsp;|-网络工具</option><option value=40>&nbsp;&nbsp;|-安全相关</option><option value=41>&nbsp;&nbsp;|-媒体工具</option><option value=4>|-影视频道</option><option value=42>&nbsp;&nbsp;|-动作片</option><option value=43>&nbsp;&nbsp;|-爱情片</option><option value=44>&nbsp;&nbsp;|-喜剧片</option><option value=45>&nbsp;&nbsp;|-连续剧</option><option value=5>|-网上商城</option><option value=46>&nbsp;&nbsp;|-手机数码</option><option value=47>&nbsp;&nbsp;|-家用电器</option><option value=48>&nbsp;&nbsp;|-品牌电脑</option><option value=49>&nbsp;&nbsp;|-图书杂志</option><option value=6>|-FLASH频道</option><option value=50>&nbsp;&nbsp;|-游戏</option><option value=51>&nbsp;&nbsp;|-音乐MV</option><option value=7>|-图片频道</option><option value=52>&nbsp;&nbsp;|-明星风采</option><option value=53>&nbsp;&nbsp;|-自然风景</option><option value=54>&nbsp;&nbsp;|-动漫图片</option><option value=8>|-文章中心</option><option value=55>&nbsp;&nbsp;|-小说</option><option value=56>&nbsp;&nbsp;|-散文</option><option value=57>&nbsp;&nbsp;|-诗歌</option><option value=9>|-分类信息</option><option value=10>&nbsp;&nbsp;|-房屋信息</option><option value=11>&nbsp;&nbsp;&nbsp;&nbsp;|-房屋求租</option><option value=12>&nbsp;&nbsp;&nbsp;&nbsp;|-房屋出租</option><option value=13>&nbsp;&nbsp;&nbsp;&nbsp;|-房屋求购</option><option value=14>&nbsp;&nbsp;&nbsp;&nbsp;|-房屋出售</option><option value=15>&nbsp;&nbsp;&nbsp;&nbsp;|-办公用房</option><option value=16>&nbsp;&nbsp;&nbsp;&nbsp;|-旺铺门面</option><option value=17>&nbsp;&nbsp;|-跳蚤市场</option><option value=18>&nbsp;&nbsp;&nbsp;&nbsp;|-电脑配件</option><option value=19>&nbsp;&nbsp;&nbsp;&nbsp;|-电器数码</option><option value=20>&nbsp;&nbsp;&nbsp;&nbsp;|-通讯产品</option><option value=21>&nbsp;&nbsp;&nbsp;&nbsp;|-居家用品</option><option value=22>&nbsp;&nbsp;|-同城生活</option><option value=23>&nbsp;&nbsp;&nbsp;&nbsp;|-本地新闻</option><option value=24>&nbsp;&nbsp;&nbsp;&nbsp;|-购物打折</option><option value=25>&nbsp;&nbsp;&nbsp;&nbsp;|-旅游活动</option><option value=26>&nbsp;&nbsp;&nbsp;&nbsp;|-便民告示</option><option value=27>&nbsp;&nbsp;|-求职招聘</option><option value=28>&nbsp;&nbsp;&nbsp;&nbsp;|-工程技术</option><option value=29>&nbsp;&nbsp;&nbsp;&nbsp;|-财务会计</option><option value=30>&nbsp;&nbsp;&nbsp;&nbsp;|-餐饮行业</option><option value=31>&nbsp;&nbsp;&nbsp;&nbsp;|-经营管理</option></select><input name=keyboard type=text size=13><input type=submit name=Submit value=搜索></div></td></tr></form></table>");
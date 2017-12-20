<?php
	include("../../config.php");
    include(ROOT_PATH."/application/admin/common/common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录注册</title>
	<script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/vue/vue.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/common/js/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/common.css">
	<link rel="stylesheet" type="text/css" href="<?php echo STATIC_PATH;?>/public/static/admin/css/admin.css">
    

    
    
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/veevalidate/vee-validate.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH;?>/public/static/common/js/veevalidate/locale/zh_CN.js"></script>
    
    
    


</head>
<body>
        <?php
            include(ROOT_PATH."/include/header.php");
        ?>
		<div class="container mt20 login-form-box" id="J_login-form-box">
        
        <form class="form-horizontal" method="post" action="./doLogin.php" id="defaultForm">
            <div class="form-group">
                <label  class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                    <input v-validate="'required|username'" name="username" type="text" placeholder="Email">
                     <span v-show="errors.has('username')" class="help is-danger">{{ errors.first('username') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control"  placeholder="密码">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">验证码</label>
                <div class="col-sm-2">
                    <input type="text" name="yzm" class="form-control"  placeholder="密码" id="J_yzm">
                </div>

                <div class="col-sm-8">
                    <span class="yzm-pic"><img  src="doCaptcha.php?r=<?php echo rand();?>" id="J_captcha-img"></span>
                    <a href="" class="yzm-btn" id="J_yzmbtn">看不清</a>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-default mr20">登录</button>  
                </div>
                <!-- <div class="col-sm-4">
                    <span>还没有账号？<a href="register.php">立即注册</a></span>
                </div> -->
            </div>
        </form>
    </div>
    <script type="text/javascript">
       

      
      
        // const dictionary = {
        //      en: {
        //         messages:{
        //           required: () => 'Some English Message'
        //         }
        //       },
        //       ar: {
        //         messages: {
        //           alpha: () => 'Some Arabic Message'
        //         }
        //       }
        // };

        // VeeValidate.Validator.localize(dictionary);
       
        // const messages = {
        //   after: (field, [target]) => ` ${field}必须在${target}之后`,
        //   alpha_dash: (field) => ` ${field}能够包含字母数字字符，包括破折号、下划线`,
        //   alpha_num: (field) => `${field} 只能包含字母数字字符.`,
        //   alpha_spaces: (field) => ` ${field} 只能包含字母字符，包括空格.`,
        //   alpha: (field) => ` ${field} 只能包含字母字符.`,
        //   before: (field, [target]) => ` ${field} 必须在${target} 之前.`,
        //   between: (field, [min, max]) => ` ${field} 必须在${min} ${max}之间.`,
        //   confirmed: (field, [confirmedField]) => ` ${field} 不能和${confirmedField}匹配.`,
        //   date_between: (field, [min, max]) => ` ${field}必须在${min}和${max}之间.`,
        //   date_format: (field, [format]) => ` ${field}必须在在${format}格式中.`,
        //   decimal: (field, [decimals = '*'] = []) => ` ${field} 必须是数字的而且能够包含${decimals === '*' ? '' : decimals} 小数点.`,
        //   digits: (field, [length]) => ` ${field} 必须是数字，且精确到 ${length}数`,
        //   dimensions: (field, [width, height]) => ` ${field}必须是 ${width} 像素到 ${height} 像素.`,
        //   email: (field) => ` ${field} 必须是有效的邮箱.`,
        //   ext: (field) => ` ${field} 必须是有效的文件.`,
        //   image: (field) => ` ${field} 必须是图片.`,
        //   in: (field) => ` ${field} 必须是一个有效值.`,
        //   ip: (field) => ` ${field} 必须是一个有效的地址.`,
        //   max: (field, [length]) => ` ${field} 不能大于${length}字符.`,
        //   max_value: (field, [max]) => ` ${field} 必须小于或等于${max}.`,  
        //   mimes: (field) => ` ${field} 必须是有效的文件类型.`,
        //   min: (field, [length]) => ` ${field} 必须至少有 ${length} 字符.`,
        //   min_value: (field, [min]) => ` ${field} 必须大于或等于${min}.`,
        //   not_in: (field) => ` ${field}必须是一个有效值.`,
        //   numeric: (field) => ` ${field} 只能包含数字字符.`,
        //   regex: (field) => ` ${field} 格式无效.`,
        //   required: (field) => `${field} 是必须的.`,
        //   size: (field, [size]) => ` ${field} 必须小于 ${formatFileSize(size)}.`,
        //   url: (field) => ` ${field}不是有效的url.`
        // };

        // const locale = {
        //     name : 'zh_CN',
        //     messages:{
        //       after: (field, [target]) => ` ${field}必须在${target}之后`,
        //       alpha_dash: (field) => ` ${field}能够包含字母数字字符，包括破折号、下划线`,
        //       alpha_num: (field) => `${field} 只能包含字母数字字符.`,
        //       alpha_spaces: (field) => ` ${field} 只能包含字母字符，包括空格.`,
        //       alpha: (field) => ` ${field} 只能包含字母字符.`,
        //       before: (field, [target]) => ` ${field} 必须在${target} 之前.`,
        //       between: (field, [min, max]) => ` ${field} 必须在${min} ${max}之间.`,
        //       confirmed: (field, [confirmedField]) => ` ${field} 不能和${confirmedField}匹配.`,
        //       date_between: (field, [min, max]) => ` ${field}必须在${min}和${max}之间.`,
        //       date_format: (field, [format]) => ` ${field}必须在在${format}格式中.`,
        //       decimal: (field, [decimals = '*'] = []) => ` ${field} 必须是数字的而且能够包含${decimals === '*' ? '' : decimals} 小数点.`,
        //       digits: (field, [length]) => ` ${field} 必须是数字，且精确到 ${length}数`,
        //       dimensions: (field, [width, height]) => ` ${field}必须是 ${width} 像素到 ${height} 像素.`,
        //       email: (field) => ` ${field} 必须是有效的邮箱.`,
        //       ext: (field) => ` ${field} 必须是有效的文件.`,
        //       image: (field) => ` ${field} 必须是图片.`,
        //       in: (field) => ` ${field} 必须是一个有效值.`,
        //       ip: (field) => ` ${field} 必须是一个有效的地址.`,
        //       max: (field, [length]) => ` ${field} 不能大于${length}字符.`,
        //       max_value: (field, [max]) => ` ${field} 必须小于或等于${max}.`,  
        //       mimes: (field) => ` ${field} 必须是有效的文件类型.`,
        //       min: (field, [length]) => ` ${field} 必须至少有 ${length} 字符.`,
        //       min_value: (field, [min]) => ` ${field} 必须大于或等于${min}.`,
        //       not_in: (field) => ` ${field}必须是一个有效值.`,
        //       numeric: (field) => ` ${field} 只能包含数字字符.`,
        //       regex: (field) => ` ${field} 格式无效.`,
        //       required: (field) => `${field} 是必须的.`,
        //       size: (field, [size]) => ` ${field} 必须小于 ${formatFileSize(size)}.`,
        //       url: (field) => ` ${field}不是有效的url.`
        //     }
        // };
        
        VeeValidate.Validator.localize({
            en:{
                messages:{
                    username:"用户名是必须的"
                }
            }
        });
        Vue.use(VeeValidate,{
            errorBagName:"errors",   //是一个对象，会被注册在每个vue 实例数据中
            delay:0,//显示错误 延迟时间


        }); 
      

        
        var app = new Vue({
          el: '#J_login-form-box',
          created:function(){
            console.dir(this.$validator.errors)
          }
        });
       

        
       
       

    </script>
</body>
</html>
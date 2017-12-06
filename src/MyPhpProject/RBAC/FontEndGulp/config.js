const cpaths=require("./paths.js");
const minimist = require('minimist');
const knownOptions = {
    string: 'env',
    default: { env: process.env.NODE_ENV || 'd' }
};
/**
 *development 开发环境 d
 * 打包的时候需要输入 --env p   production 生产环境
 * 压缩的时候 默认是压缩js 和 css 的
 * @type {[type]}
 */


var options = minimist(process.argv.slice(2), knownOptions);


options.src=cpaths.src; 
options.dev=cpaths.dev
options.htmlDistFolder=cpaths.htmlDistFolder;
options.revSrc=cpaths.revSrc;
options.staticLocalFolder=cpaths.staticLocalFolder;
options.staticServerFolder=cpaths.staticServerFolder
options.serverFolder=cpaths.serverFolder;
//打包y模块的时候
options.mod=options.mod ? ((options.mod==="all") ? "" :"/"+options.mod) :"";

//没有传递模块的时候，默认打包全部默认
/**
 * 对于html   src+模块
 * 对于静态资源  static+** 
 */
if(!options.mod){
	options.staticSrc=options.src+"/"+options.staticLocalFolder;
	options.staticDev=options.dev+"/"+options.staticLocalFolder;
	options.staticServerFolder=cpaths.serverFolder+"/"+options.staticServerFolder;
}else{
	options.staticSrc=options.src;
	options.staticDev=options.dev;
	options.staticServerFolder=cpaths.serverFolder;
}

options.compress=!!options.compress  ? options.compress.toLowerCase() :"";

/**
 * {
 * 	dest:
 * 	mod:
 * 	compress:
 * 	env:
 * 	comomonFile
 * }
 */
module.exports = options;

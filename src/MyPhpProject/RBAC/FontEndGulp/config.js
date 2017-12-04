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
options.dev=cpaths.dev;
options.htmlDist=cpaths.htmlDist;
options.staticDist=cpaths.staticDist;
options.staticDev=cpaths.staticDev;
options.revSrc=cpaths.revSrc;
//打包过个模块的时候
options.mod=options.mod ? ((options.mod==="all") ? "" :"/"+options.mod) :"";
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

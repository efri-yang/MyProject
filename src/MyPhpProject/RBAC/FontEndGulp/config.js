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



options.htmlDist=cpaths.htmlDist;
options.revSrc=cpaths.revSrc;
//打包y模块的时候
options.mod=options.mod ? ((options.mod==="all") ? "" :"/"+options.mod) :"";
options.defaultSrc=cpaths.src;
options.src=cpaths.src;
options.dev=cpaths.dev+"/"+cpaths.staticDevFolder;
options.dist=cpaths.serverFolder+"/"+cpaths.staticDevFolder;

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

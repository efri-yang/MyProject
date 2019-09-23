const fs=require("fs");
const read=function(fileName) {
   return new Promise((resolve,reject)=>{
       fs.readFile(fileName,(err,data)=>{
           if(err){
               reject(err);
           }else{
               resolve(data);
           }
       })
   }) 
}

read('etc/1.txt').then(res=>{
    console.log(res.toString());
    return read('etc/2.txt');  // 返回新的数据，然后输出
}).then(res => {
    console.log(res.toString());
    return read('etc/3.txt');
}).then(res => {
    console.log(res.toString());
});
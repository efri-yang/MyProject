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


function* show(){
    yield read('etc/1.txt');
    yield read('etc/2.txt');
    yield read('etc/3.txt');
}

const s = show();
//s.next().value 返回的是{value: "ending", done: true} value的值，这个时候就是Promise对象
s.next().value.then(res => {
    console.log(res.toString());
    return s.next().value;
}).then(res => {
    console.log(res.toString());
    return s.next().value;
}).then(res => {
    console.log(res.toString());
});
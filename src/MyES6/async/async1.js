const fs=require("fs");
const read = function(fileName){
    return new Promise((resolve,reject)=>{
        fs.readFile(fileName,(err,data)=>{
            if (err) {
                reject(err);
            } else{
                resolve(data);
            }
        });
    });
};

async function readByAsync(){
    let a1 =  read('etc/1.txt');
    let a2 =  await  read('etc/2.txt');
    let a3 =  read('etc/3.txt');
   setTimeout(function(){
    console.log(a1.toString());
    console.log(a2.toString());
    console.log(a3.toString());
   },5000)
}
readByAsync();
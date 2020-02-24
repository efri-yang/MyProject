function def(obj, key, val, enumerable) {
    Object.defineProperty(obj, key, {
        value: val,
        enumerable: !!enumerable,
        writable: true,
        configurable: true
    })
}

class Observer {
    constructor(value) {
       
        this.value = value
        // 给value新增一个__ob__属性，值为该value的Observer实例
        // 相当于为value打上标记，表示它已经被转化成响应式了，避免重复操作
        // def(value, '__ob__', this)
        if (Array.isArray(value)) {
            // 当value为数组时的逻辑
            // ...
        } else {
            this.walk(value)
        }
    }

    walk(obj) {
        const keys = Object.keys(obj)
        for (let i = 0; i < keys.length; i++) {
            defineReactive(obj, keys[i])
        }
    }
}
/**
 * 使一个对象转化成可观测对象
 * @param { Object } obj 对象
 * @param { String } key 对象的key
 * @param { Any } val 对象的某个key的值
 */
function defineReactive(obj, key, val) {
    // 如果只传了obj和key，那么val = obj[key]
    if (arguments.length === 2) {
        val = obj[key]
    }
    if (typeof val === 'object') {
        new Observer(val)
    }
    const dep = new Dep();  //实例化一个依赖管理器，生成一个依赖管理数组dep
    Object.defineProperty(obj, key, {
        enumerable: true,
        configurable: true,
        get() {
            console.log(`${key}属性被读取了`);
            dep.depend()    // 在getter中收集依赖
            return val;
        },
        set(newVal) {
            if (val === newVal) {
                return
            }
            console.log(`${key}属性被修改了`);
            val = newVal;
            dep.notify()   // 在setter中通知依赖更新
        }
    })
}

class Dep{
    constructor(){
        this.subs=[];
    }
    addSub(sub){
        this.subs.push(sub);
    }
    removeSub(sub){
        remove(this.subs,sub);
    }
    depend(){
        if(window.target){
            this.addSub(window.target);
        }
    }
    notify(){
        const subs=this.subs.slice();
        for (let i = 0, l = subs.length; i < l; i++) {
            subs[i].update();
        }
    }
}


function remove(arr,item){
    if(arr.length){
        const index=arr.indexOf(item);
        if(index >-1){
            return arr.splice(index,1);
        }
    }
}


const bailRE = /[^\w.$]/
function parsePath (path) {
  if (bailRE.test(path)) {
    return
  }
  const segments = path.split('.')
  return function (obj) {
    for (let i = 0; i < segments.length; i++) {
      if (!obj) return
      obj = obj[segments[i]]
    }
    return obj
  }
}


class  Watcher{
    constructor(vm,expOrFn,cb){
        this.vm=vm;
        this.cb=cb;
    }
}
 






'use strict';

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function def(obj, key, val, enumerable) {
    Object.defineProperty(obj, key, {
        value: val,
        enumerable: !!enumerable,
        writable: true,
        configurable: true
    });
}

var Observer = function () {
    function Observer(value) {
        _classCallCheck(this, Observer);

        this.value = value;
        // 给value新增一个__ob__属性，值为该value的Observer实例
        // 相当于为value打上标记，表示它已经被转化成响应式了，避免重复操作
        // def(value, '__ob__', this)
        if (Array.isArray(value)) {
            // 当value为数组时的逻辑
            // ...
        } else {
            this.walk(value);
        }
    }

    _createClass(Observer, [{
        key: 'walk',
        value: function walk(obj) {
            var keys = Object.keys(obj);
            for (var i = 0; i < keys.length; i++) {
                defineReactive(obj, keys[i]);
            }
        }
    }]);

    return Observer;
}();
/**
 * 使一个对象转化成可观测对象
 * @param { Object } obj 对象
 * @param { String } key 对象的key
 * @param { Any } val 对象的某个key的值
 */


function defineReactive(obj, key, val) {
    // 如果只传了obj和key，那么val = obj[key]
    if (arguments.length === 2) {
        val = obj[key];
    }
    if ((typeof val === 'undefined' ? 'undefined' : _typeof(val)) === 'object') {
        new Observer(val);
    }
    Object.defineProperty(obj, key, {
        enumerable: true,
        configurable: true,
        get: function get() {
            console.log(key + '\u5C5E\u6027\u88AB\u8BFB\u53D6\u4E86');
            return val;
        },
        set: function set(newVal) {
            if (val === newVal) {
                return;
            }
            console.log(key + '\u5C5E\u6027\u88AB\u4FEE\u6539\u4E86');
            val = newVal;
        }
    });
}
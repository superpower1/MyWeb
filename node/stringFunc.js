'use strict'

var fs = require('fs');

var foo = 'abcdefghijklmn';
// 判断是否包含xxx
console.log(foo.includes('ghi'));
// 判断是否以xxx开头
console.log(foo.startsWith('abc'));
// 判断是否以xxx结尾
console.log(foo.endsWith('lmn'));
// 重复字符串
console.log(foo.repeat(2));

// 字符串拼接
var baz = `哈哈${foo}哈哈`;
console.log(baz);

var rf = function () {
	// resolve是成功方法，reject是失败方法
	return new Promise(function(resolve, reject) {
		// bb.txt存在所以resolve(data)会被调用
		fs.readFile('./bb.txt', 'utf8', (err, data) => {
			if(err) {
				reject(err);
			}
			else {
				resolve(data);
			}
		})

	})
}

rf().then(
	function(data) {
		console.log(data);
		// 如果返回类型不是Promise对象，则then默认返回原本的Promise对象用于下一个then的链式编程
		return new Promise(function(resolve, reject) {
			// 00.txt不存在所以reject(err)会被调用
			fs.readFile('./00.txt', 'utf8', (err, data) => {
				if(err) {
					reject(err);
				}
				else {
					resolve(data);
				}
			})

		});
	},
	function(err) {
		console.log(err);
	}

).then(
	function() {
		console.log('success');
	},
	function() {
		console.log('error');
	}
);
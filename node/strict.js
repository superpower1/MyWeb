'use strict'

var a = [];

// let的作用域只在块级作用域（for循环）内，所以没循环一次都会产生一个新的i
for (let i = 0; i < 5; i++) {
	a[i] = function() {
		console.log(i);
	}
}
a[3](); //输出3

var b = true;
if (true) {
	// 这里的b与外面声明的全局b不一样
	let b = false;
}
console.log(b); //输出true



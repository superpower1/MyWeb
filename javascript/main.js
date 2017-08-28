	/* 作者：sp1
	* 时间：03/14/2017
	*/
	// alert("hello");
	var number = prompt("请输入一个数字：");
	if (isNaN(number)) {
		console.log('不是数字');
	}
	else{
		console.log('是数字');
	}
	// 字符串是不可变的,字符串重新赋值需要开辟新的内存空间

	var a = "100";
	var b = 100;
	//c是字符串100100
	var c = a+b;
	//c是数字0
	var c = a-b;

	//判断变量是否有值，“空字符串，数字0，NaN，undefined”没有值
	var msg = "0";
	if(msg) {
		//有值
	}
	else {
		//没有值
	}

	//toString($),可以转换成$进制的字符串
	var num = 10;
	console.log(num.toString(16)); //输出a
	console.log(num+""); //将num转换成字符串

	parseInt("123a"); //会转换成(int)123

	function sum(num1, num2) {
		num1 = n1 || 0; //num1没有值的时候使用默认值0
		num2 = n2 || 0;
		console.log(num1+num2);
	}

	// switch使用的是全等===
	// switch(var) {
	// 	case :
			
	// 		break;
	// 	case :
			
	// 		break;
	// }

	bunny(number);

	function bunny(num) {
		var num1 = 1;
		var num2 = 1;
		if ((num===1)||(num===2)) {
			console.log('1');
		}
		else {
			for (var i = 0; i < (num-2)/2; i++) {				
				num1 += num2;
				num2 += num1; 

			}
			if (num%2 === 0) {
				console.log(num2);
			}
			else {
				console.log(num1);
			}
		}
	}

	var array = ["123","abcd","monday","Go"];
	wordCount(array);
	function wordCount(array) {
		var newArray = [];
		for (var i = 0; i < array.length; i++) {
			newArray[i] = array[i].length;
		}
		console.log(newArray);
	}

	getSum(3,10);
	
	/*
	* Description: 
	* @param a,b
	* @returns sum
	*/
	function getSum(a,b) {
		var sum = 0;
		for (var i = a; i <= b; i++) {
			sum += i;
		}
		console.log(sum);
	}

	// JavaScript没有重载概念，后来写的同名函数会覆盖之前写的
	// 因此在JavaScript中不允许有同名函数

	// 也可以这样定义函数，但是这样定义函数后调用只能在此之后
	var fnName = function(a,b) {
		return a + b;
	}
	// 变量的作用域：全局作用域，局部作用域
	// 在函数中定义的变量只能在函数中使用
	// 在JavaScript中{}块中定义的变量也具有全局作用域，比如if，for等

	// 解析器：
	// 1. 预解析：将var，function和参数提前（只把声明提前，赋值并不会提前）
	// 2. 从上到下逐行执行

	// 如果在局部作用域中没有变量的定义，会在上一级的作用域中寻找

	// 自调用匿名函数，只能执行一次
	(function() {
		console.log('test');
	}());


	console.log(findDate(2008,2,3));
	console.log(findDate2(2008,2,3));
	function leapYear(year) {
		if (year%100 === 0) {
			if(year%400 === 0) {
				return true;
			}
			else return false;
		}
		else if (year%4 === 0) {
			return true;
		}
		else return false;
	}
	function findDate(year, month, day) {
		var sum = 0;
		if (month <= 7) {
			for (var i = 1; i < month; i++) {
				if (i%2 === 0) {
					sum += 30;
				}
				else {
					sum += 31;
				}
			}
		}
		else {
			for (var i = 8; i < month; i++) {
				if (i%2 === 0) {
					sum += 31;
				}
				else {
					sum += 30;
				}
			}
			sum += 31 * 4 + 30 * 3;
		}
		if (month > 2) {
			if (leapYear(year)) {
				sum -= 1;
			}
			else {
				sum -= 2;
			}
		}

		sum += day;
		return sum;
	}

	function findDate2 (year, month, day) {
		var sum = 0;
		switch(month) {
			case 12:
				sum += 30;
			case 11:
				sum += 31;
			case 10:
				sum += 30;
			case 9:
				sum += 31;
			case 8:
				sum += 31;
			case 7:
				sum += 30;
			case 6:
				sum += 31;
			case 5:
				sum += 30;
			case 4:
				sum += 31;
			case 3:
				if (leapYear(year)) {
					sum += 29;
				}
				else sum += 28;
			case 2:
				sum += 31;
			case 1:
				sum += day;			
		}
		return sum;

	}

	// 递归
	function getSum(n) {
		if (n === 1) {
			return 1;
		}
		return n + getSum(n-1);
	}

	console.log(getSum(4));

	// 用构造函数创建对象
	function Student (name,id) {
		this.name = name;
		this.id = id;
		this.sayHi = function() {
			console.log('Hi, my name is ' + this.name);
		}
		this.sayTest = function() {
			console.log('test');
		}
	}

	var s1 = new Student("sp1", 1);
	s1.sayHi();

	//json是描述数据的一种标准规范
	
	var s2 = {
		"name": "sp2",
		"id": 2,
		"sayHi": function(){
			console.log('test');
		}
	};
	s2.sayHi();

	//遍历对象里的所有属性和方法
	for(var key in s2) {
		console.log(key);
	}



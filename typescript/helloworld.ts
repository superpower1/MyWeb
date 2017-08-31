
/* ts新特性
字符串新特性：
1. 多行字符串（ES6新特性）
	在js中长字符串在换行的时候需要用+连接，但是在ts中可以用`...`来声明字符串，可以随意换行
2. 字符串模板
	`...`中可以通过${...}直接调用变量或者函数
3. 自动拆分字符串
	可以用`...`直接调方法
*/

var myName = 'sp1';
var age = 18;
function getName() {
	return myName;
}
// 多行字符串的应用
console.log(`hello ${myName}`);
console.log(`hello ${getName()}`);
// 多行字符串用于直接写html代码易读性更强
console.log(`<div>
		<ul>
			<li>a</li>
			<li>b</li>
			<li>c</li>
		</ul>
	</div>`);

function test(str, name, age) {
	console.log(str);
	console.log(name);
	console.log(age);
}
// 这里会将name作为第二个参数，age作为第三个参数，而剩下被分割的字符串作为第一个参数传入test方法
test`I am ${myName}, ${age}years old.`;

// ts参数的新特性
// 1. 可指定参数（方法变量）类型
// 2. 可指定参数（方法变量）默认值

// 用:可以为参数指定类型
var myname:string = 'sp1';

// 以下代码在ts编辑器会提示错误，但其实可以正常编译，因为js是弱类型语言
// myname = 12;

// 如果使用any，则可以随意赋值，基本类型分为number，string，boolean以及void
var myAge:any = 18;

// void用在函数不需要返回值的时候，这里可以给参数一个默认值，这样就算不传参也不会报错
// 使用?表示可选参数，可以选择不传值
// 注意：带默认值的参数以及可选参数都不能放在必要参数的前面
function getAge(age: number = 20, maxAge?: number) :void {
	// 以下代码会报错，因为已经声明了不需要返回值
	// return '';
}
// 以下代码会报错，因为函数规定了参数类型是number
// getAge('aha');
getAge();

// 自定义类型
class Person {	
	name: string;
	age: number;

	constructor(name: string) {
		this.name = name;
	}
}

var p:Person = new Person('Alice');
p.name = 'Queen';
p.age = 12;

// ts函数新特性：
// 1. Rest and Spread操作符
	// 可以用...来表示不定数量的参数
function printArgs(...args) {
	args.forEach(function(arg) {
		console.log(arg);
	});
}

// 2. generator函数
	// 可以控制函数的执行过程，手工暂停和回复代码执行
	// 该使用方法在这个编译器下还不能支持，可以使用babel编译器
// function* doSomething() {
// 	console.log('start');
// 	yield;
// 	console.log('finish');
// }

// var func = doSomething();
// 调用next()方法可以使函数执行到yield的地方，然后暂停
// func.next();
// 再次调用next()方法继续执行到下一个yield的地方，如果没有就执行完该函数
// func.next();

// 3. destructuring析构表达式
	// 通过表达式将对象或数组拆解成任意数量的变量

function getPerson() {
	return {
		id: 1,
		name: 'sp1'
	}
}
// 这是对象的析构表达式，用{}表示，在现有编译器也无法解析
// var {id, name} = getPerson();
// 这是数组的析构表达式，用[]表示
var arr = [1, 2, 3, 4];
function destruct([num1, num2, ...others]) {
	// console(num1);
	// console(num2);
	// console(others);
}
// 执行这个函数将会分别打印1和2以及3,4构成的数组
destruct(arr);

// ts表达式与循环
// 1. 箭头表达式
	// 用来声明匿名函数，消除传统匿名函数的this指针问题
var sum = (arg1, arg2) => {
	return arg1 + arg2;
};

console.log(arr.filter(value => value%2 == 0));
// 相当于：
// console.log(arr.filter(function(value) { return value%2 == 0 }));

function func1(age) {
	this.age = age;
	setInterval(function () {
		// 这里的this指向window，所以打印18
		console.log(this.age);
	}, 1000);
}

function func2(age) {
	this.age = age;
	setInterval(() => {
		// 这里的this指向func2，所以打印传入的值
		console.log(this.age);	
	}, 1000);
}

// var a = new func1(10);
// var a = new func2(10);

// 2. 循环forEach(), for in和for of
arr.forEach(value => console.log(value));
console.log('===========');
for (var i in arr) {
	console.log(arr[i]);
}
console.log('===========');
// for in循环会把数组的属性也一并输出，但是for of和forEach不会，for of比forEach好在可以终止循环
// 注意这里使用的是value而不是index值
for (var val of arr) {
	if (val>2) {
		break;
	}
	console.log(val);
}

// class是ts的核心
class Student extends Person {
	// 参考其他语言的class，如果什么都不写默认是public
	private alias;
	protected id;

	// 这里name之前写public表示这个class有这个属性，如果不写则不会有
	constructor (public name: string, id: number) {
		// 因为Student继承了Person，所以在构造函数上要先用super调用父类的构造函数
		super(name);
		this.id = id;
	}

	getName() {
		// 如果上面不写public则这里会报错，因为没有这个属性
		console.log(this.name);
	}
}
// 用来指定数组内元素的类型
var students: Array<Person> = [];
students.push(new Person('sp1'));
// Student生成的对象也是可以放入Person数组的
students.push(new Student('sp2', 2));

// ts中的接口与其他语言一样，不需要实现方法，只需要声明
interface Animal {
	eat();
	// sleep();
}

class Cat implements Animal {
	// 任何实现接口的类都要实现其声明的所有方法
	eat() {
		console.log('I eat mouse');
	}
}

// 每个ts文件就是一个模块，使用export选择对外暴露的方法或属性，使用import来引入其他模块的方法或属性
// export var prop1;
// export function expFunc() {

// }
// export class Class1 {
	
// }
// import {prop2} from "./module";
// console.log(prop2);





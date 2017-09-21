var fs = require('fs');
var rf = require('./conf/subfile.js');

// readFile(路径, 编码格式, 回调函数)
fs.readFile('add.js', 'utf8', (err, data)=> {
	if (err) {
		throw err;
	}
	console.log(data);
});

// var data = fs.readFileSync('add.js', 'utf8');
// console.log(data);

// 用于判断文件或文件夹是否存在
fs.access('abc.js', (err) => {
	console.log(err ? 'no access!' : 'can read/write');
});

// 异步输出顺序由执行时间长短决定，所以以上代码access会先输出

rf('./subconfig.txt');

// accessSync是access的同步版，会先执行
// 这里不能使用access，因为try,catch是同步代码，执行完了之后已经catch不到access抛出的异常了
try {
	fs.accessSync('./abc.js');
}catch(err) {
	console.log(err);
}
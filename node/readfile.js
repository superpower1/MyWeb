var fs = require('fs');

// readFile(路径, 编码格式, 回调函数)
fs.readFile('add.js', 'utf8', (err, data)=> {
	if (err) {
		throw err;
	}
	console.log(data);
});

// var data = fs.readFileSync('add.js', 'utf8');
// console.log(data);

// 用于判断文件是否存在
fs.access('add1.js', (err) => {
	console.log(err ? 'no access!' : 'can read/write');
});
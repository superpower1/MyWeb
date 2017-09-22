var fs = require('fs');
var p = require('path');

// 获取文件名，输出的是index.js
console.log(p.basename('../node_modules/test/index.js'));
// 获取路径，输出的是../node_modules/test
console.log(p.dirname('../node_modules/test/index.js'));
// 获取后缀名，输出的是.js
console.log(p.extname('../node_modules/test/index.js'));

var rf = (path) => {
	// 如果这里直接写path作为路径的话，读取的是调用这个文件的相对路径，这里把路径变成了这个文件的相对路径
	fs.readFile(p.join(__dirname, path), 'utf8', (err, data)=> {
		if (err) {
			throw err;
		}
		console.log(data);
	});
}

module.exports = rf;
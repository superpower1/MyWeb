var fs = require('fs');
var p = require('path');



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
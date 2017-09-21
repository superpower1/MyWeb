var fs = require('fs');

// fs.mkdir(路径, [,文件夹权限] 回调函数)
fs.mkdir('./write', (err)=> {

});

// files是这个目录包含的文件及文件夹名的数组
fs.readdir('./', (err, files) => {
	console.log(files);
});

fs.stat('./conf', (err, stats) => {
	if (stats.isFile()) {
		console.log('It is a file');
	}
	else {
		console.log('It is a folder');
	}
});
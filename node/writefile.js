var fs = require('fs');

// fs.writeFile(文件路径, 内容, 编码格式, 回调函数)
fs.writeFile('./bb.txt', 'hello world!', 'utf8', (err) => {

});
// 同步版
fs.writeFileSync('./bb.txt', 'hello world', 'utf8', (err) => {

});
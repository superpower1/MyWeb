var http = require('http');

var count = 0;

// 建立服务器应用
http.createServer(function(req, res) {
	count++;
	res.writeHead(200, {"Content-Type":"text/html;charset=utf-8"});
	res.end("<p>服务器接收了"+count+"个请求</p>");
}).listen(3000);
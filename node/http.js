'use strict'

const http = require('http');

var count = 0;

// 创建服务器实例
const server = http.createServer();

// 监听request事件，当有请求发送到服务器的时候，触发request事件
// 然后调用callback
// http将请求报文封装到了request对象里，request就是http.IncomingMessage
server.on('request', function(request, response) {
	count++;
	// 注意：1.writeHead要写在write之前，也可以不写，直接写write
	// 		 2.end要写在write之后，end之后的write没有意义
	// writeHead(状态码, 报文头内容)
	response.writeHead(200, {"Content-Type":"text/html;charset=utf-8"});
	response.write("<h1>我是服务器</h1>");
	// 这里可以多次调用write写入响应报文
	// end里也可以继续写内容
	response.end("<p>服务器接收了"+count+"个请求</p>");
}).listen(3000);

// localhost: 不走网卡直接请求
// 127.0.0.1 走网卡
// 其他ip: 通过网卡发请求给路由或交换机，再返回

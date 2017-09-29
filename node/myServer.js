'use strict'

const http = require('http');
const fs = require('fs');

const server = http.createServer();

server.on('request', (req, res)=> {

	if (req.url == '/' && req.method == 'GET') {
		fs.readFile('./index.html', 'utf8', (err, data) => {
			res.end(data);
		});
		
	} 
	else if(req.url=='/js/connect.js'&& req.method=='GET'){
          fs.readFile('./js/connect.js','utf8',function(err,data){
                 res.end(data);     
          })
    }
	else if(req.url == '/css/main.css' && req.method == 'GET') {
		fs.readFile('./css/main.css', 'utf8', (err, data) => {
			res.end(data);
		});
	}
	else if(req.url == '/login' && req.method == 'GET'){
		res.end("Login Page");
	} 
	else {
		res.end("404 Not found");
	}

}).listen(3000);

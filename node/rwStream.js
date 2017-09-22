const fs = require('fs');

var fileName = '../audio/sample.mp3'
const rs = fs.createReadStream(fileName);
const ws = fs.createWriteStream('./copy.mp3');

// rs.pipe(ws);
fs.stat(fileName, (err, stats) => {
	console.log(stats.size);
	var tmp = 0;
	rs.on('data', function(chunk) {
		tmp += chunk.length;
		let ratio = tmp/stats.size*100;
		console.log('Reading--'+ratio.toFixed(2)+'%');
		ws.write(chunk);
	});
	rs.on('end', function() {
		console.log('Finish');
		ws.end();
	});
});




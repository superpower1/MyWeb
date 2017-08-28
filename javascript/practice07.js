var box = document.getElementsByClassName("smallImg");
var imgArr = box[0].getElementsByTagName("img");
//body的获取：
var body = document.body;

for (var i = 0; i < imgArr.length; i++) {
	imgArr[i].onclick = function () {	
		body.style.backgroundImage = "url("+this.src+")";
	}
}



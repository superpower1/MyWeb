var links = document.getElementsByClassName("imgS");

for (var i = 0; i < links.length; i++) {
	var link = links[i];
	link.onmouseover = function(){

		showPic(this);
		changeTitle(this);

	};
}

function showPic(link) {
	var img = document.getElementsByClassName("imgL")[0];
	img.src = link.src;
	
}

function changeTitle(link) {
	// 改变p标签的文字内容
	var picTitle = document.getElementById("picTitle");

	picTitle.innerText = link.title;
}

var button = document.getElementById("button");	
button.onclick = function() {
	buttonHandler();
};

function buttonHandler() {
	var intro = document.getElementById("intro");
	if (intro.style.display == "block") {
		intro.style.display = "none";
	}else if(intro.style.display == "none"){
		intro.style.display = "block";
	}
}
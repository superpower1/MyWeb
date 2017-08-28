	var username = document.getElementById("username");
	username.disabled = true;

	var changeNumBtn = document.getElementsByClassName("changeNum");
	var numImg = document.getElementsByClassName("number");
	var inputNum = document.getElementById("inputNum");
	changeNumBtn[0].onclick = function () {
		// var posX = numImg[0].style.backgroundPositionX; //string
		// var posY = numImg[0].style.backgroundPositionY;
		var num = parseInt(inputNum.value);
		var tem1 = Math.ceil(num/5);
		//if(tem1==0){tem1=1;}
		var row = (tem1 - 1)*64;

		var tem = num%5;
		if(tem==0){tem=5;}
		var column = (tem-1)*64;
		numImg[0].style.backgroundPositionX = "-"+column+"px";
		numImg[0].style.backgroundPositionY = "-"+row+"px";

	}

	var search = document.getElementById("search");
	//刷新页面的时候自动获取焦点
	search.focus();

	var pwdMsg = document.getElementById("pwdMsg");
	var pwd = document.getElementById("pwd");
	pwd.onblur = function () {
		if (pwd.value.length < 6) {
			pwdMsg.style.display = "block";
			pwdMsg.style.color = "red";
			pwdMsg.innerText = "password too short";
		}
		else {
			pwdMsg.style.display = "block";
			pwdMsg.style.color = "green";
			pwdMsg.innerText = "valid password";
		}
	}

	var lists = document.getElementsByClassName("list");
	box(lists[0]);
	function box(div) {
		var liArr = lists[0].getElementsByTagName("li");
		var spanArr = lists[0].getElementsByTagName("span");

		for (var i = 0; i < liArr.length; i++) {
			liArr[i].onmouseover = function () {				
				for (var i = 0; i < liArr.length; i++) {
					liArr[i].className = "";
				}
				this.className = "current";
				for (var i = 0; i < spanArr.length; i++) {
					if (liArr[i].className === "current") {
						spanArr[i].className = "show";
					}
					else spanArr[i].className = "";
				}
			}
		}
	}

	// parentNode,children


	

	



	

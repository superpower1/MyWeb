// option: url, method, data, func

function ajax_tool(option) {
	// 创建异步对象
	var ajax = new XMLHttpRequest();

	if(option.method=='get'){
		if(option.data){
			option.url+='?';
			option.url+=option.data;
		}
		ajax.open(option.method,option.url);

		ajax.send();
	}
	else {
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.open(option.method,option.url);

		if(option.data) 
			ajax.send(option.data);
		else ajax.send();
	}

	ajax.onreadystatechange = function () {
		if(ajax.readyState==4 && ajax.status==200){
			option.func(ajax.responseText);
		}
	}
}

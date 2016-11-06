// JavaScript Document
function $(id){
	return document.getElementById(id);
}
window.onload = function(){
	$('regname').focus();
	var cname1,cname2,cpwd1,cpwd2,cemail;
	//Check if the input information is eligible for register
	function chkreg(){
		if((cname1 == 'yes') && (cname2 == 'yes') && (cpwd1 == 'yes') && (cpwd2 == 'yes') && (cemail == 'yes')){
			$('regbtn').disabled = false;
		}else{
			$('regbtn').disabled = true;
		}
	}
	//Verify user name
	$('regname').onkeyup = function (){
		name = $('regname').value;
		cname2 = '';
		if(name.match(/^[a-zA-Z_]*/) == ''){
			$('namediv').innerHTML = '<font color=red>User name must start with a letter</font>';
			cname1 = '';
		}else if(name.length < 2){
			$('namediv').innerHTML = '<font color=red>User name should be more than two digit</font>';
			cname1 = '';
		}else{
			$('namediv').innerHTML = '<font color=green>User name is eligible for use</font>';
			cname1 = 'yes';
		}
		chkreg();
	}
	//Check if there is existing user using the same name
	$('regname').onblur = function(){
		name = $('regname').value;
		if(cname1 == 'yes'){
			xmlhttp.open('get','chkname.php?name='+name,true);
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4){
					if(xmlhttp.status == 200){
						var msg = xmlhttp.responseText;
						if(msg == '1'){
							$('namediv').innerHTML="<font color=green>Congratulations, you can use this name</font>";
							cname2 = 'yes';
						}else if(msg == '2'){
							$('namediv').innerHTML="<font color=red>Opps, someone else is using this name</font>";
							cname2 = '';
						}else{
							$('namediv').innerHTML="<font color=red>"+msg+"</font>";
							cname2 = '';
						}
					}
				}
				chkreg();
			}
			xmlhttp.send(null);
		}
	}
	//check if password is eligible
	$('regpwd1').onkeyup = function(){
		pwd = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if(pwd.length < 6){
			$('pwddiv1').innerHTML = '<font color=red>Password should be more than 6 digit</font>';
			cpwd1 = '';
		}else if(pwd.length >= 6 && pwd.length < 12){
			$('pwddiv1').innerHTML = '<font color=green>Eligible password, strength:Weak</font>';
			cpwd1 = 'yes';
		}else if((pwd.match(/^[0-9]*$/)!=null) || (pwd.match(/^[a-zA-Z]*$/) != null )){
			$('pwddiv1').innerHTML = '<font color=green>Eligible password, strength:Medium</font>';
			cpwd1 = 'yes';
		}else{
			$('pwddiv1').innerHTML = '<font color=green>Eligible password, strength:Strong</font>';
			cpwd1 = 'yes';
		}
		if(pwd2 != '' && pwd != pwd2){
			$('pwddiv2').innerHTML = '<font color=red>Please enter the same password again</font>';
			cpwd2 = '';
		}else if(pwd2 != '' && pwd == pwd2){
			$('pwddiv2').innerHTML = '<font color=green>Correct</font>';
			cpwd2 = 'yes';
		}
		chkreg();
	}
	//Check the password
	$('regpwd2').onkeyup = function(){
		pwd1 = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if(pwd1 != pwd2){
			$('pwddiv2').innerHTML = '<font color=red>Please enter the same password again</font>';
			cpwd2 = '';
		}else{
			$('pwddiv2').innerHTML = '<font color=green>Correct</font>';
			cpwd2 = 'yes';
			chkreg();
		}
	}
	//check if email is eligible
	$('email').onkeyup = function(){
		emailreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		$('email').value.match(emailreg);
		if($('email').value.match(emailreg) == null){
			$('emaildiv').innerHTML = '<font color=red>Wrong email format</font>';
			cemail = '';
		}else{
			$('emaildiv').innerHTML = '<font color=green>Correct format</font>';
			cemail = 'yes';
			
		}
		chkreg();
	}

	//Show or hide more details
	$('morebtn').onclick = function(){
		
		if($('morediv').style.display == ''){
			$('morediv').style.display = 'none';
		}else{
			$('morediv').style.display = '';
		}
	}
	//Login button
	$('logbtn').onclick = function(){
		window.open('login.php','_parent','',false);
	}
	//Register button
	$('regbtn').onclick = function(){
		$('imgdiv').style.visibility = 'visible';
		url = 'register_chk.php?name='+$('regname').value+'&pwd='+$('regpwd1').value+'&email='+$('email').value;
		url += '&question=' +$('question').value+'&answer='+$('answer').value;
		url += '&realname=' +$('realname').value+'&birthday='+$('birthday').value;
		url += '&telephone='+$('telephone').value+'&qq='+$('qq').value;
		xmlhttp.open('get',url,true);
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4){
				if(xmlhttp.status == 200){
					msg = xmlhttp.responseText;
					if(msg == '1'){
						alert('Successfully registered, please check your inbox for verification email');
						location='index.php';
					}else if(msg == '-1'){
						alert('Please check your email address again. (Your server may not support Zend_mail)');
					}else{
						alert(msg);
					}
					$('imgdiv').style.visibility = 'hidden';
				}
			}
		}
		xmlhttp.send(null);
	}
}
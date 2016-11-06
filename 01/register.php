<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>Register</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script language="javascript" src="js/xmlhttprequest.js"></script>
<script language="javascript" src="js/register.js"></script>
</head>
<body>
<div id="container">
  <div id="rgbgdiv">
    <div id="regnamediv"><b>Name:</b>
      <input id="regname" name="regname" type="text" />
      <div id="namediv">Please enter your user name</div>
    </div>
    <div id="regpwddiv1"><b>Password:</b>
      <input id="regpwd1" name="regpwd1" type="password" />
      <div id="pwddiv1">Please enter your password</div>
    </div>
    <div id="regpwddiv2"><b>Re-enter:</b>
      <input id="regpwd2" name="regpwd2" type="password" />
      <div id="pwddiv2">Please enter your password again</div>
    </div>
    <div id="regemaildiv"><b>E-mail:</b>
      <input id="email" name="email" type="text" />
      <div id="emaildiv">Please enter your e-mail</div>
    </div>
    <div id="morediv" style="display:none;">
      <hr id="part" />
      <div id="regquestiondiv"><b>Secret question:</b>
        <input id="question" name="question" type="text" />
        <div id="questiondiv">Secret question is used when you forget your password</div>
      </div>
      <div id="reganswerdiv"><b>Secret answer:</b>
        <input id="answer" name="answer" type="text" />
        <div id="answerdiv">Please enter your answer for your secret question</div>
      </div>
      <div id="regrealnamediv"><b>Real name:</b>
        <input id="realname" name="realname" type="text" />
        <div id="realnamediv">Please enter your real name</div>
      </div>
      <div id="regbirthdaydiv"><b>DOB:</b>
        <input id="birthday" name="birthday" type="text" />
        <div id="birthdaydiv">Please enter your date of birth (yyyy-mm-dd)</div>
      </div>
      <div id="regtelephonediv"><b>Contact number:</b>
        <input id="telephone" name="telephone" type="text" />
        <div id="telephonediv">Please enter your contact number</div>
      </div>
      <div id="regaddressdiv"><b>Address:</b>
        <input id="address" name="address" type="text" />
        <div id="addressdiv">Please enter your address</div>
      </div>
      <div id="regiddiv"><b>ID:</b>
        <input id="id" name="id" type="text" />
        <div id="iddiv">Please enter your Citizen Identity Card number</div>
      </div>
    </div>
    <div id="btndiv2">
      <button id="regbtn" disabled="disabled">&nbsp;</button>
      <button id="morebtn">&nbsp;</button>
      <button id="logbtn">&nbsp;</button>
    </div>
  </div>
  <div id="imgdiv" style=" visibility: hidden;">&nbsp;</div>
</div>
</body>
</html>

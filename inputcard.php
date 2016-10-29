<HTML>
<HEAD>
<TITLE>Collect your Card</TITLE>
<h2>Yu-Gi-Oh card collect:</h2>
</HEAD>
<BODY>
<form action="collectinfo.php" method="post">
<table>

<tr bgcolor="#3399FF">
    <td>Card Id:</td>
    <td><input type="text" name="id" size="20" /></td>
</tr>

<tr bgcolor="#CCCCCC">
    <td>Card Name:</td>
    <td><input type="text" name="cardname" size="20" /></td>
</tr>

<tr bgcolor="#3399FF">
    <td>Attribute:</td>
    <td>
        <select name="attribute">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
            <option value="earth">Earth</option>
            <option value="fire">Fire</option>
            <option value="water">Water</option>
            <option value="wind">Wind</option>
        </select>
    </td>
</tr>

<tr bgcolor="#CCCCCC">
    <td>Attack:</td>
    <td><input type="text" name="attack" size="10" /></td>
</tr>

<tr bgcolor="#3399FF">
    <td>Defence:</td>
    <td><input type="text" name="defence" size="10" /></td>
</tr>

</table>

<input type="reset" value="Reset"/>
<input type="submit" value="Collect this Card"/></td>

</form>

</BODY>
</HTML>
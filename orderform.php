<html>
<head>
 <title>���� ������������</title>
</head>
<body>
<h1> ���� ������������ </h1>
<h2>����� ������</h2>
<form action="processorder.php" method=post>
<table style="border: 0px">
<tr bgcolor="#cccccc">
 <td width=150>��������</td>
 <td width=15>����������</td>
</tr>
<tr>
 <td> ������ ���</td>
 <td align="center"><input type="text" name="tovar1" size=3
maxlength=3 value="0"></td>
</tr>
<tr>
 <td> ������ ��������� ���������</td>
 <td align="center"><input type="text" name="tovar2" size=3
maxlength=3 value="0"></td>
</tr>
<tr>
 <td> ���� ���  </td>
 <td align="center"><input type="text" name="tovar3" size=3
maxlength=3 value="0"></td>
</tr>
<tr>
<tr>
 <td> ����  </td>
 <td align="center"><input type="text" name="tovar4" size=3
maxlength=3 value="0"></td>
</tr>
<tr>
 <td> �����  </td>
 <td align="center"><input type="text" name="city" size=8
value="���"></td>
</tr>
<tr>
 <td> �����, ���, �������, �������� </td>
 <td align="center"><input type="text" name="house" size=20></td>
</tr>
<tr><td>��� �� ��� �����</td>
 <td><select name="find">
 <option value = "a">� ���������� ����������
 <option value = "b">�� ������� �� ���������
 <option value = "c">�� ����������� �����������
 <option value = "d">�������� ����������
 <option value = "e">�� ���������� �� ������
 </select>
 </td></tr>
<tr>
 <td colspan=2 align="center"><input type=submit value="���������
�����"></td>
</tr>
<tr>
<td colspan=2 align="center">
<input type=reset
 value = C�poc >
</td>
</tr>
</table>
<table border = 0 cellpadding = 3>
<tr>
<td bgcolor = "#CCCCCC" align = center>����������</td>
 <td bgcolor = "#CCCCCC" align = center>���������</td>
</tr>
<?
$distance = 50;
while ($distance <= 250 ) {
 echo "<tr>\n <td align = right>$distance</td>\n";
 echo " <td align = right>". ($distance * 2)."</td>\n</tr>\n";
 $distance += 50;
}
?>
</table>
</form>
</body>
</html>

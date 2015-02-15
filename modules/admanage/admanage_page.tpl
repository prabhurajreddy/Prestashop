<link rel="stylesheet" type="text/css" href="css/main.css">
<div id="myDiv"><h2>Please fill the form to advertise</h2></div>

<form name="htmlform" method="post" action="handle_adv.php">
<table width="450px">
</tr>
<tr>
 <td valign="top">
  <label id ="firstname" for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="last_name">Last Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
 
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="url">URL *</label>
 </td>
 <td valign="top">
  <input id="adurl" type="text" name="url" maxlength="80" size="30">
 </td>
 
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="Submit"> 
 </td>
</tr>
<tr>
 <td id="preview" colspan="2" style="text-align:center">
  <input type="button" value="Preview"> 
 </td>
</tr>
</table>
</form>
<iframe id="advertise-frame" src="" sandbox></iframe>
<script type="text/javascript" src="js/main.js"></script>
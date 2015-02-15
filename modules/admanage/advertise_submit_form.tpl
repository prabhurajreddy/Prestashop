<link rel="stylesheet" type="text/css" href="../../css/main.css">
<style>
form{
	display:block;
	margin-top: 3em;
}
</style>	

<h1 id="admessagerequest"> Please fill the below details to submit advertisement </h1> 

<form name="request_advertise" action="{$link->getPageLink('handle_adv.php', true)}" method="post" id="advertise_form" class="std">
		<fieldset>
			<h3>Step 1: Fill the advertisement details</h3>

			<b>Advertisement Name</b> : <br><br>
			<input type="text" id="adname" name="adname" value="" required>
			<br><br>
			Advertisement URL : <br><br>
			<input type="url" id="adurl" name="adurl" value="" required>
			<br><br>
			<input type="button" id ="preview" value="Preview">
			<input type="button" id ="stoppreview" value="Stop Preview">
		</fieldset>

		<fieldset id="preview-field">
			<iframe id="advertise-frame"src="" align="centre" width="300" height="300" frameBorder="0"overflow:hidden cursor: none scrolling="no"></iframe>
		</fieldset>

		<fieldset> 
			<h3> Step 2: Please set your budget </h3>
			<br>			
				<span>Standard rates $1 per View</span><br><br>

				   Set your budget: <input type="text" id ="budgetvalue" value="" name="budgetvalue" required>  
		</fieldset>	
		<fieldset>
			<h3> Step 3: Please choose your Advertisement preferences </h3>
			<br>
			<h4>when the advertisement should be shown </h4><br><br>
			<input type="radio" name="timing" value="0" checked> No Preference <br>
			<input type="radio" name="timing" value="1" > Morning 5AM to 12PM <br>
			<input type="radio" name="timing" value="2" > Afternoon 12PM to 5PM <br>
			<input type="radio" name="timing" value="3" > Evening 5PM to 10PM <br>
			<input type="radio" name="timing" value="4" > Night 10PM to 5AM <br>	
			<br>
			<h4>Whom to show the advertisement </h4> <br>

			<input type="checkbox" id="loggeduserpref" name="loggeduserpref" value="TRUE"> Show only to the logged in users<br><br>
			
			<h4>Select the category of the advertise</h4> 
			<select name="category">
 				<option value="0">No Preference</option>
 				<option value="2">ipods</option>
 				<option value="3"> Accessories</option>
 				<option value="4"> Laptops</option>
			</select>
		</fieldset>	

		<div style="text-align: center;">
    		<input type="submit" value="Click to advertise" id="submitbutton">
		</div>

</form>

<script type="text/javascript" src="js/main.js"></script>
<style>
form{
	display:block;
	margin-top: 3em;
}
</style>	
<h3>Please First login to continue</h3> 

<form action="http://localhost/prestashop/authentication.php" method="post" id="login_form" class="std">
		<fieldset>
			<h3>Already registered ?</h3>
			<p class="text">
				<label for="email">E-mail address</label>
				<span><input type="text" id="email" name="email" value="" class="account_input" /></span>
			</p>
			<p class="text">
				<label for="passwd">Password</label>
				<span><input type="password" id="passwd" name="passwd" value="" class="account_input" /></span>
			</p>
			<p class="submit">
				<input type="hidden" class="hidden" name="back" value="my-account.php" />				<input type="submit" id="SubmitLogin" name="SubmitLogin" class="button" value="Log in" />
			</p>
			<p class="lost_password"><a href="http://localhost/prestashop/password.php">Forgot your password?</a></p>
		</fieldset>
	</form>
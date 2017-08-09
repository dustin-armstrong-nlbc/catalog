<?php include('./app/snippets/header-setup.php') ?>

<section id="setup">

	<h1>Welcome.</h1>
	<p>It looks like you haven't set up Catalog yet, so let's do this right
		now.</p>

	<form method="post" id="setup-form" action="config/configure.php">
		<label>Database location <span>usually localhost</span></label> <input
			type="text" name="server" required /> <label>Database name <span>catalog
				will create this for you</span></label> <input type="text"
			name="database" required /> <label>Database user <span>with the
				sufficient previleges</span></label> <input type="text" name="user"
			required /> <label>Database password <span>for the db user above</span></label>
		<i class="fa fa-eye" onmouseover="mouseoverPass();"
			onmouseout="mouseoutPass();" aria-hidden="true"></i> <input
			type="password" id="password" name="password" /> <label>Choose a
			username <span>to log in to catalog</span>
		</label> <input type="text" name="appuser" required /> <label>Choose a
			password <span>for your catalog user</span>
		</label> <i class="fa fa-eye" onmouseover="appmouseoverPass();"
			onmouseout="appmouseoutPass();" aria-hidden="true"></i> <input
			type="password" id="apppassword" name="apppassword" required />
		<label>Installation language</label>
		<select name="language" id="language">
			<option value="" selected>Select language</option>
			<option value="en-US">English (United States)</option>
  			<option value="hu-HU">Magyar (Hungarian)</option>
		</select>
		<p>All done? Excellent. Click on the button, to start configuration.
			Have fun using Catalog.</p>
		<input type="submit" name="submit" value="Configure" />
	</form>

	<script type="text/javascript">
			function mouseoverPass(obj) {
				var obj = document.getElementById('password');
				obj.type = "text";
			}
			function mouseoutPass(obj) {
				var obj = document.getElementById('password');
				obj.type = "password";
			}
			function appmouseoverPass(obj) {
				var obj = document.getElementById('apppassword');
				obj.type = "text";
			}
			function appmouseoutPass(obj) {
				var obj = document.getElementById('apppassword');
				obj.type = "password";
			}
		</script>

</section>

<?php include('./app/snippets/footer-setup.php') ?>
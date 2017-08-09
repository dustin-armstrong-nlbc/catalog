<?php
session_start();
include_once ('app/snippets/logged-in.php');
if (logged_in() == true) {
    redirect_to("index");
}
include_once ('config/config.php');
include_once ("toolkit/bootstrap.php");

if (isset($lang)) {
    include_once ('./languages/' . $lang . '.php');
} else {
    include_once ('./languages/en-US.php');
}

if (isset($_POST['submit'])) {
    
    $appuser = $_POST['name'];
    $apppassword = $_POST['pass'];
    
    session_set_cookie_params('604800'); // one week (value in seconds)
    session_regenerate_id(true);
    
    $db = new Database(array(
        'type' => 'mysql',
        'host' => $hostname,
        'database' => $database,
        'user' => $username,
        'password' => $password
    ));
    
    $query = $db->table('users')
        ->where('user', '=', $appuser)
        ->all();
    
    if ($query->count() != 1) {
        echo $lang['LOGIN_ERROR'];
    } else {
        foreach ($query as $q) {
            $pw = $q->password();
            if (password::match($apppassword, $pw)) {
                
                // Authenticated, set session variables
                $_SESSION['user_id'] = $q->id();
                $_SESSION['username'] = $q->user();
                
                // update status to online
                $timestamp = time();
                
                $update = $db->table('users')
                    ->where('id', '=', $_SESSION['user_id'])
                    ->update(array(
                    'status' => $timestamp
                ));
                
                redirect_to("index");
                // do stuffs
            } else {
                echo $lang['LOGIN_ERROR'];
            }
        }
    }
}

include_once ('app/snippets/header-setup.php');
?>

<section id="setup">

	<h1><?php echo $lang['LOGIN_WELCOME']; ?></h1>
	<p><?php echo $lang['LOGIN_NOTICE']; ?></p>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label><?php echo $lang['LOGIN_USER']; ?></label> <input type="text"
			name="name" required /> <label><?php echo $lang['LOGIN_PASSWORD']; ?></label>
		<i class="fa fa-eye" onmouseover="mouseoverPass();"
			onmouseout="mouseoutPass();" aria-hidden="true"></i> <input
			type="password" id="password" name="pass" required /> <br /> <input
			type="submit" class="loginbutton" name="submit"
			value="<?php echo $lang['LOGIN_BUTTON']; ?>">
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
    </script>

</section>
<?php include_once('app/snippets/footer-setup.php'); ?>
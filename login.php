<?php

require('header.php'); ?>
<div class="container">
    <div class="wrapper">
        <form class="form-signin" action="" method="POST">
            <h2 class="form-signin-heading">Please login</h2>
            <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
            <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
            </label>
            <div class="g-recaptcha" data-sitekey="6LfN2jEUAAAAAMQMPZnN4LvIHvHzdto1xgIC27yn"></div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="SUBMIT">Login</button>
        </form>


    </div>
    </div>
<?php
require('footer.php');

?>
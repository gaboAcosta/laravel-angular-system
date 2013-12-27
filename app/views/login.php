<?php
/**
 * User: Gabriel Acosta
 * Date: 12/27/13
 * Time: 2:48 PM
 */
?>
<form class="form-signin" role="form">
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" class="form-control" placeholder="User Name" required autofocus ng-model="username">
    <input type="password" class="form-control" placeholder="Password" required ng-model="password">
    <label class="checkbox">
        <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" ng-click="login()">Sign in</button>
</form>
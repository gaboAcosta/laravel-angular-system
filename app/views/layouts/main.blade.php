<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Authentication App With Laravel 4</title>

    {{ HTML::style('app/styles/bootstrap.css') }}
    {{ HTML::script('app/bower_components/jquery/jquery.js') }}
    {{ HTML::script('app/bower_components/bootstrap/dist/js/bootstrap.js') }}
    <!--  Angular Dependencies  -->
    {{ HTML::script('app/bower_components/angular/angular.js') }}
    {{ HTML::script('app/bower_components/angular-cookies/angular-cookies.js') }}
    {{ HTML::script('app/bower_components/angular-route/angular-route.js') }}
    {{ HTML::script('app/bower_components/angular-resource/angular-resource.js') }}
    {{ HTML::script('app/bower_components/angular-sanitize/angular-sanitize.js') }}
    {{ HTML::script('app/non_bower_components/angular-bootstrap/dist/ui-bootstrap-tpls.js') }}


    <!--  Angular Dependencies  -->

    <!--  Angular Services  -->

    <!--  Angular Services  -->

    <!--  Angular Controllers  -->
    {{ HTML::script('app/scripts/app.js') }}
    {{ HTML::script('app/scripts/controllers/main.js') }}
    {{ HTML::script('app/scripts/controllers/navbar.js') }}
    {{ HTML::script('app/scripts/controllers/login.js') }}
    <!--  Angular Controllers  -->
</head>

<body ng-app="mainApp">

<div class="container">

    <ng-view></ng-view>
</div>

</body>
</html>
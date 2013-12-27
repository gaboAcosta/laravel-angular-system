<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Authentication App With Laravel 4</title>

    {{ HTML::style('app/styles/bootstrap.css') }}

    <!--  Angular Dependencies  -->
    {{ HTML::script('app/bower_components/angular/angular.js') }}
    {{ HTML::script('app/bower_components/angular-cookies/angular-cookies.js') }}
    {{ HTML::script('app/bower_components/angular-route/angular-route.js') }}
    {{ HTML::script('app/bower_components/angular-resource/angular-resource.js') }}
    {{ HTML::script('app/bower_components/angular-sanitize/angular-sanitize.js') }}
    <!--  Angular Dependencies  -->

    <!--  Angular Services  -->

    <!--  Angular Services  -->

    <!--  Angular Controllers  -->
    {{ HTML::script('app/scripts/app.js') }}
    {{ HTML::script('app/scripts/controllers/main.js') }}
    <!--  Angular Controllers  -->
</head>

<body ng-app="mainApp">
    <ng-view></ng-view>
</body>
</html>
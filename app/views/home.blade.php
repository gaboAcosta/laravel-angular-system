@extends('layouts.loged_in')
<?php
/**
 * User: Gabriel Acosta
 * Date: 12/27/13
 * Time: 2:48 PM
 */
?>

@section('angular-view')
<div class="hero-unit">
    <h1>'Allo, 'Allo!</h1>
    <p>You now have</p>
    <ul>
        <li ng-repeat="thing in awesomeThings">[[thing]]</li>
    </ul>
    <p>installed.</p>
    <h3>Enjoy coding! - Yeoman</h3>
</div>
@stop
@extends('frontend.layout')

@section('pageTitle')
    <title>Page not found | Alvin Manansala - Fullstack Developer</title>
@stop

@section('content')
    <div id="errorPageWrapper">
        <div id="errorPage">
            <div class="row">
                <div class="large-11 medium-11 large-centered-medium-centered columns">
                    <h1>Fatal Error: Nothing found.</h1>
                    <p>Sorry, the page you requested could not be found.</p>
                </div>
            </div>
        </div>
    </div>
@stop
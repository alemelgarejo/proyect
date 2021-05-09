@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Page Not Found'))

@section('image')
    <style>
        #apartado-derecho {
            text-align: center;
        }

        #apartado-derecho ul {
            text-align: left;
            margin-left: 35%;
        }

        ul {
            text-decoration: none !important;
            list-style: none;
            color: black;
            font-weight: bold;
        }

    </style>
    <div id="apartado-derecho" style="background-color: #2CA8FF;"
        class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
        <h2 style="color: black">{{ __('Find what you are looking for in our menu') }}</h2>
        <ul>
            <li><a style="color: white" href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
            <hr>
            <li><a style="color: white" href="{{ route('web.index') }}">{{ __('Web') }}</a></li>
            <hr>
            <li><a style="color: white" href="{{ route('web.about') }}">{{ __('About Us') }}</a></li>

        </ul>
    </div>
@endsection

@section('message', __('Sorry, the page you are looking for could not be found.'))

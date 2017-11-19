
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            @include('partials.nav')
            <!-- Left side column. contains the logo and sidebar -->
            @include('partials.home-slider')
            @include('partials.home') 
        @stop
@extends('layouts.master')
    @section('title', 'BOX')
        
        @section('header')
        <h1>BOX</h1>
        @stop

        @section('content') 

            @include('partials.nav')
            <!-- Left side column. contains the logo and sidebar -->
            
            @include('partials.box') 
        @stop
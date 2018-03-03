@extends('layout') 
@section('brandUrl',url('user'))
@section('brandName','MyHome') 

@section('navMenu')
    @if (session()->has('user_name'))
        @section('navbarAlign','right')
        <li><a href="{{url('user/sign-out')}}">登出</a></li>
    @else
        @foreach ( $navMenu as $item)
            <li><a href="{{url($item['url'])}}">{{$item['title']}}</a></li>
        @endforeach
    @endif
    
@endsection

@section('breadcrumb')
    @foreach ($breadcrumb as $item)
        @if ($loop->last)
            <li class="active">{{ $item }}</li>
        @else
            <li><a href="{{ url($item['url']) }}">{{$item['title']}}</a></li>
        @endif
    @endforeach
@endsection
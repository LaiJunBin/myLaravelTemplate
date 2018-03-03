@extends('layout') 
@section('brandUrl',url('user'))
@section('brandName','MyHome') 

@section('navMenu')
    @foreach ( $navMenu as $item)
        <li><a href="{{url($item['url'])}}">{{$item['title']}}</a></li>
    @endforeach
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
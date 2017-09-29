@php
/** @var \Modules\Pages\Models\Page $page */
@endphp

@extends('pages::layouts.master')

@section('meta')
    {{ $page->description }}
@stop

@section('title')
    {{ $page->title }}
@stop


@section('content')
    {!! $page->content !!}
@stop

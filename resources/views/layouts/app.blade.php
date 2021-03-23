@extends('layouts.nolang')

@section('language-switcher')

    <language-switcher 
        locale="{{ app()->getLocale() }}"
        link-en="{{ route(Route::currentRouteName(), 'en') }}" 
        link-fr="{{ route(Route::currentRouteName(), 'fr') }}"
        link-es="{{ route(Route::currentRouteName(), 'es') }}">
    </language-switcher>

@endsection

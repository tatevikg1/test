@extends('layouts.base')

@section('layout')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
        <div class="container">
            <a class="btn btn-dark" href="{{ route('home', app()->getLocale()) }}">{{__('trans.all_tests')}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                
                @auth
                <ul class="navbar-nav mr-auto">
                    <li><a class="btn btn-dark ml-3" href="{{ route('result.index',  app()->getLocale()) }}">{{__('trans.my_test_results')}}</a></li>
                    <li>
                        @if (auth()->check())
                            @if (auth()->user()->id == 1)
                                <a class="btn btn-secondary ml-3" href="{{ route('admin.topic.index', ['language' => app()->getLocale()] ) }}">Administration</a> 
                            @endif
                        @endif
                    </li>
                </ul>
                @endauth

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li>
                        @yield('language-switcher')
                    </li>
                    

                    @guest
                        <li class="nav-item">
                            <a class="btn btn-dark" href="{{ route('login',  app()->getLocale()) }}">{{ __('trans.login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-dark ml-3" href="{{ route('register', app()->getLocale()) }}">{{ __('trans.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('trans.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

@endsection

@extends('layouts.app')

@section('content')
    <div class="top-right links">
        <a href="javascript:void(0)">Gmail</a>
        <a href="javascript:void(0)">Images</a>
        <a href="javascript:void(0)" title="Google apps">
            <i class="material-icons">apps</i>
        </a>
        <a href="javascript:void(0)" class="btn-google btn-google-primary">Sign in</a>
    </div>
    <div class="content">
        <center>
            <div class="title m-b-md logo-holder">
                <img src="/images/google-logo.png" alt="logo">
            </div>

            <div class="search">
                <form id="form_search" class="form-search" action="{{ route('search') }}" method="post">
                    {{ csrf_field() }}
                    <div class="div-search input-group">
                        <input type="hidden" name="search_val" id="search_val">
                        <input type="text" name="search" id="search" title="Search">

                         <div class="mic-container input-group-addon">
                            <a href="" data-toggle="tooltip" data-original-title="Seach by voice">
                                <span class="voice-icon"></span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="jsb" style="padding-top:18px">
                <center>
                    <input value="Google Search" aria-label="Google Search" type="button" class="btn-google btn-google-default" id="btn_search">
                    <input value="I'm Feeling Lucky" aria-label="I'm Feeling Lucky" type="button" class="btn-google btn-google-default">

                    <div class="offered-languages">
                        Google offered in:  <a href="#" class="text-blue">Cebuano</a>
                    </div>
                </center>
            </div>
        </center>
    </div>
@endsection

@section('styles')
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
@endsection
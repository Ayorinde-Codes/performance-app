@extends('errors.layout')

@section('content')
    <div class="ex-page-content text-center">
        <div class="text-error"><span class="text-primary">4</span><i class="ti-face-sad text-pink"></i><span
                    class="text-info">4</span></div>
        <h2>Who0ps! Page not found</h2><br>
        <p class="text-muted">This page cannot found or is missing.</p>
        <p class="text-muted">Use the navigation above or the button below to get back and track.</p>
        <br>
        <a class="btn btn-default waves-effect waves-light" href="/dashboard"> Return Home</a>
    </div>
@endsection
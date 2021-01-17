@extends('site.layouts.app')
@section('content')
    <section class="w-100 p-top-80 p-bottom-80 self-center">
        <div class="center container">
            <div class="w-100 d_flex justify-center">
                @include('site.contact._form')
            </div>
        </div>
    </section>
@endsection

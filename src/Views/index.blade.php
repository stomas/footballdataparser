@extends('footballdata::layout')

@section('content')
@if(Session::has('message'))
<section class="section">
<div class="notification is-primary">
      {{ Session::get('message') }}
</div>
</section>
@endif
<section class="section">
    <div class="container">
      ELO ratings will be gathered in background.
    </div>
</section>
@endsection
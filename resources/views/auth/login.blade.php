@extends('layout.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>EEG </b>Information System</a>
  </div>
</div>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @livewire('auth.form-login')

        
    </div>
<!-- /.login-card-body -->
</div>
@endsection
@extends('layouts.app')
@section('title', trans('lang.page__name_login'))
@section('dashboardPage', trans('lang.page__name_login'))
@section('content')

<form method="POST" class="mw-75 ">
    @csrf

  <div class="mb-3">
    <label for="email" class="form-label">@lang('lang.email')</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    @foreach($errors->all() as $error)
        <div class="form-text text-danger">{{ $error }}</div>
    @endforeach
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">@lang('lang.password')</label>
    <input type="password" class="form-control" id="password" name="password">
     
  <button type="submit" class="btn btn-primary mt-4">@lang('lang.button_submit')</button>
</form>

@endsection
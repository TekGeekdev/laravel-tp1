@extends('layouts.app')
@section('title', trans('lang.page__name_login'))
@section('dashboardPage', trans('lang.page__name_login'))
@section('content')

<form method="POST" class="mw-75 ">
    @csrf

  <div class="mb-3">
    <label for="email" class="form-label">@lang('lang.email')</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <div class="form-text text-danger">{{$errors->first('email')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">@lang('lang.password')</label>
    <input type="password" class="form-control" id="password" name="password">
    @if ($errors->has('password'))
        <div class="form-text text-danger">{{$errors->first('password')}}</div>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">@lang('lang.button_submit')</button>
</form>

@endsection
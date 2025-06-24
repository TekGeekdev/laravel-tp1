@extends('layouts.app')
@section('title', trans('lang.page__name_new_student'))
@section('dashboardPage', trans('lang.page__name_new_student'))
@section('content')

<form method="POST" class="mw-75 ">
    @csrf

  <div class="mb-3">
    <label for="name" class="form-label">@lang('lang.name')</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <div class="form-text text-danger">{{$errors->first('name')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="adress" class="form-label">@lang('lang.adress')</label>
    <input type="text" class="form-control" id="adress" name="adress" value="{{ old('adress') }}">
    @if ($errors->has('adress'))
        <div class="form-text text-danger">{{$errors->first('adress')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">@lang('lang.phone')</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
    @if ($errors->has('phone'))
        <div class="form-text text-danger">{{$errors->first('phone')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">@lang('lang.email')</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
     @if ($errors->has('email'))
        <div class="form-text text-danger">{{$errors->first('email')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="birth_date" class="form-label">@lang('lang.birth_date')</label>
    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
    @if ($errors->has('birth_date'))
        <div class="form-text text-danger">{{$errors->first('birth_date')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="city_id" class="form-label">@lang('lang.city')</label>
    <select class="form-select" aria-label="Default select example" name="city_id">
        <option disabled {{ old('city_id') ? '' : 'selected' }}>@lang('lang.input_choose_city')</option>
        @foreach($cities as $city)
        <option value="{{$city->id}}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('city_id'))
        <div class="form-text text-danger">{{$errors->first('city_id')}}</div>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">@lang('lang.button_submit')</button>
</form>

@endsection
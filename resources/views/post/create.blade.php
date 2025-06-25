@extends('layouts.app')
@section('title', trans('lang.page__name_create_post'))
@section('dashboardPage', trans('lang.page__name_create_post'))
@section('content')

<form method="POST" class="mw-75 ">
    @csrf

  <div class="mb-3">
    <label for="title_en" class="form-label">@lang('lang.post_title_english')</label>
    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}">
    @if ($errors->has('title_en'))
        <div class="form-text text-danger">{{$errors->first('title_en')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="content_en" class="form-label">@lang('lang.post_content_english')</label>
    <textarea class="form-control" rows="4" id="content_en" name="content_en" value="{{ old('content_en') }}"></textarea>
    @if ($errors->has('content_en'))
        <div class="form-text text-danger">{{$errors->first('content_en')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="title_fr" class="form-label">@lang('lang.post_title_french')</label>
    <input type="text" class="form-control" id="title_en" name="title_fr" value="{{ old('title_fr') }}">
    @if ($errors->has('title_fr'))
        <div class="form-text text-danger">{{$errors->first('title_fr')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="content_fr" class="form-label">@lang('lang.post_content_french')</label>
    <textarea class="form-control" rows="4" id="content_fr" name="content_fr" value="{{ old('content_fr') }}"></textarea>
    @if ($errors->has('content_fr'))
        <div class="form-text text-danger">{{$errors->first('content_fr')}}</div>
    @endif
  </div>
  
  <button type="submit" class="btn btn-primary">@lang('lang.button_submit')</button>
</form>

@endsection
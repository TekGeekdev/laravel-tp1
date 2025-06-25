@extends('layouts.app')
@section('title', trans('lang.page__name_create_post'))
@section('dashboardPage', trans('lang.page__name_create_post'))
@section('content')

<form method="POST" class="mw-75 ">
    @csrf
    @method('PUT')
    
   <div class="mb-3">
        <label for="title_en" class="form-label">@lang('lang.post_title_english')</label>
        <input type="text" class="form-control" id="title_en" name="title_en"
               value="{{ old('title_en', $post->title['en'] ?? '') }}">
        @error('title_en')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
  <div class="mb-3">
        <label for="content_en" class="form-label">@lang('lang.post_content_english')</label>
        <textarea class="form-control" rows="4" id="content_en" name="content_en">{{ old('content_en', $post->content['en'] ?? '') }}</textarea>
        @error('content_en')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
  <div class="mb-3">
        <label for="title_fr" class="form-label">@lang('lang.post_title_french')</label>
        <input type="text" class="form-control" id="title_fr" name="title_fr"
               value="{{ old('title_fr', $post->title['fr'] ?? '') }}">
        @error('title_fr')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
  <div class="mb-3">
        <label for="content_fr" class="form-label">@lang('lang.post_content_french')</label>
        <textarea class="form-control" rows="4" id="content_fr" name="content_fr">{{ old('content_fr', $post->content['fr'] ?? '') }}</textarea>
        @error('content_fr')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
  
  <button type="submit" class="btn btn-primary">@lang('lang.button_submit')</button>
</form>

@endsection
@extends('layouts.app')
@section('title', trans('lang.page__name_create_post'))
@section('dashboardPage', trans('lang.page__name_create_post'))
@section('content')

@foreach ($posts as $post)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $post['title'] }}</h5>
            <p class="card-text">{{ $post['content'] }}</p>
            <p class="card-text">
                <small class="text-muted">
                    {{ __('Écrit par') }} : <strong>{{ $post['student_name'] }}</strong> |
                    {{ __('le') }} {{ $post['created_at'] }}
                </small>
            </p>

            @if (Auth::user()->student->id === $post['student_id'])
                <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i> {{ __('Éditer') }}
                </a>
                <form action="{{ route('post.destroy', $post['id']) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Confirmer la suppression ?') }}')">
                        <i class="bi bi-trash"></i> {{ __('Supprimer') }}
                    </button>
                </form>
            @endif
        </div>
    </div>
@endforeach
@endsection
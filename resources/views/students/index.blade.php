@extends('layouts.app')
@section('title', trans('lang.page__name_index_student'))
@section('dashboardPage', trans('lang.dashboard'))
@section('content')

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">@lang('lang.name')</th>
      <th scope="col">@lang('lang.adress')</th>
      <th scope="col">@lang('lang.city')</th>
      <th scope="col">@lang('lang.phone')</th>
      <th scope="col">@lang('lang.email')</th>
      <th scope="col">@lang('lang.birth_date')</th>
      <th scope="col">@lang('lang.show')</th>
    </tr>
  </thead>
  <tbody>
    @forelse($students as $student)
    <tr>
      <td>{{ $student->name }}</td>
      <td>{{ $student->adress }}</td>
      <td>{{ $student->city->name }}</td>
      <td>{{ $student->phone }}</td>
      <td>{{ $student->email }}</td>
      <td>{{ $student->birth_date }}</td>
      <td><a class="btn btn-primary" href="{{ route('student.show', $student->id) }}" target="_blank">Profil</a></td>
    </tr>
    @empty
    @endforelse
  </tbody>
</table>
{{$students}}


@endsection
@extends('layouts.app')
@section('title', 'Students')
@section('dashboardPage', 'Dashboard')
@section('content')

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Adress</th>
      <th scope="col">City</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Birth date</th>
      <th scope="col">Show</th>
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
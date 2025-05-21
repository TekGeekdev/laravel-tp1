@extends('layouts.app')
@section('title', 'profil')
@section('dashboardPage', 'Profil')
@section('content')

<div>
    <div class="d-flex justify-content-between">
        <h2>{{$student->name}}</h2>
        <img src="{{ asset('/ressources/img/profil.jpg') }}" alt="image profil">
    </div>
    <h3>{{$student->birth_date}}</h3>
    <div>
        <p><b>Adress : </b>{{$student->adress}}</p>
        <p><b>City : </b>{{$student->city_id}}</p>
    </div>
    <div>
        <p><b>Phone : </b>{{$student->phone}}</p>
        <p><b>Email : </b>{{$student->email}}</p>
    </div>
    <div>
        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-dark">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
    </div>
</div>


@endsection
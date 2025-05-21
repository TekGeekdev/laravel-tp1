@extends('layouts.app')
@section('title', ' New profil')
@section('dashboardPage', 'New profil student')
@section('content')

<form method="POST" class="mw-75 ">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="adress" class="form-label">Adress</label>
    <input type="text" class="form-control" id="adress" name="adress">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" id="email" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="birth_date" class="form-label">birth_date</label>
    <input type="date" class="form-control" id="birth_date" name="birth_date">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <select class="form-select" aria-label="Default select example">
        <option selected disabled>Choose a city</option>
        @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
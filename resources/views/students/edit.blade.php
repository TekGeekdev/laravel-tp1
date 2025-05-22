@extends('layouts.app')
@section('title', ' Edit profil')
@section('dashboardPage', 'Edit profil')
@section('content')



<form method="POST" class="mw-75 ">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}">
    @if ($errors->has('name'))
        <div class="form-text text-danger">{{$errors->first('name')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="adress" class="form-label">Adress</label>
    <input type="text" class="form-control" id="adress" name="adress" value="{{ old('adress', $student->adress) }}">
    @if ($errors->has('adress'))
        <div class="form-text text-danger">{{$errors->first('adress')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
    @if ($errors->has('phone'))
        <div class="form-text text-danger">{{$errors->first('phone')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}">
     @if ($errors->has('email'))
        <div class="form-text text-danger">{{$errors->first('email')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="birth_date" class="form-label">birth_date</label>
    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}">
    @if ($errors->has('birth_date'))
        <div class="form-text text-danger">{{$errors->first('birth_date')}}</div>
    @endif
  </div>
  <div class="mb-3">
    <label for="city_id" class="form-label">City</label>
    <select class="form-select" aria-label="Default select example" name="city_id">
        <option disabled {{ old('city_id') ? '' : 'selected' }}>Choose a city</option>
        @foreach($cities as $city)
        <option value="{{$city->id}}" {{ old('city_id', $student->city_id) == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
        @endforeach
    </select>
    @if ($errors->has('city_id'))
        <div class="form-text text-danger">{{$errors->first('city_id')}}</div>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
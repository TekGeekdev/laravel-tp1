@extends('layouts.app')
@section('title', 'Profil')
@section('dashboardPage', 'Profil')
@section('content')

<div>
    <div class="d-flex justify-content-between">
        <h2>{{$student->name}}</h2>
        <!-- <img src="{{ asset('/assets/img/profil.jpg') }}" alt="image profil" class="mw-75"> -->
    </div>
    <h3>{{$student->birth_date}}</h3>
    <div>
        <p><b>@lang('lang.adress') : </b>{{$student->adress}}</p>
        <p><b>@lang('lang.city') : </b>{{$student->city->name}}</p>
    </div>
    <div>
        <p><b>@lang('lang.phone'): </b>{{$student->phone}}</p>
        <p><b>@lang('lang.email') : </b>{{$student->email}}</p>
    </div>
    <div>
        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-dark">@lang('lang.button_edit')</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        @lang('lang.button_delete') 
        </button>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete profil student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete?!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="POST">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div style="background-color: #B0C4DE; color:black" class="card">
        <div class="card-header text-center">Nariai</div>

        <div class="card-body">
          <table style="background-color: #B0C4DE; color:black" class="table">
            <a class="btn btn-info" href="{{ route('member.create') }}">
              Įrašyti narį</a>

            <tr>

            <tr>
              <th>Vardas</th>
              <th>Pavardė</th>
              <th>Live</th>
              <th>Experience</th>
              <th>Registered</th>
              <th>Priskirtas vandens telkinys</th>
              <th>edit</th>
              <th>delete</th>
            </tr>

            @foreach ($reservoirs as $reservoir)
            <tr>
              <td>{{$member->name}}</td>
              <td>{{$member->surname}}</td>
              <td>{{$member->live}}</td>
              <td>{{$member->experience}}</td>
              <td>{{$member->reservoir->title}}</td>

              <td><a class="btn btn-info" href="{{route('member.edit',[$member])}}">edit</a></td>
              <td>
                <form method="POST" action="{{route('member.destroy', [$member])}}">
                  @csrf
                  <button class="btn btn-danger" type="submit">delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
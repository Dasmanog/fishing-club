@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <div style="background-color: #B0C4DE; color:black" class="card">
        <div class="card-header text-center">
          <h3> Nariai</h3>
        </div>

        <div class="card-body col-12">
          <table style="background-color: #B0C4DE; color:black" class="table col-12">
            <a class="btn btn-info mb-2" href="{{ route('member.create') }}">
              Įrašyti narį</a>


            <form action="{{route('member.indexSpecifics')}}" method="get">
              <h4>Rūšiavimas</h4> 
              
            <select class="form-control col-4 form-inline" name="order">
              <option value="0" disabled selected>Rušiuoti pagal</option>
              <option value="name">Vardą</option>
              <option value="surname">Pavardę</option>
              <option value="live">Gyvenamą vietą</option>
              <option value="experience">Patirtį</option>
              <option value="registered">Registraciją</option>
            </select>
            
            <h4>Filtravimas</h4> 
            <select class="form-control col-4 form-inline" name="filter">
              <option value="0">Filtruoti pagal vandens tvenkinį</option>
              @foreach($reservoirs as $reservoir)
              <option value="{{$reservoir->id}}">{{$reservoir->title}}</option>
              @endforeach
            </select>

            <select class="form-control col-4 form-inline" name="filterCity">
              <option value="0">Filtruoti pagal miestą</option>
              @foreach($membersCities as $mc)
              <option value="{{$mc->live}}">{{$mc->live}}</option>
              @endforeach
            </select>
          
            <button class="btn btn-primary mr-2" type="submit">Pasirinkti </button>
            <a class="btn btn-warning" href="{{route('member.index')}}">Išvalyti filtrą</a>
        </form>
      </div>

     

        <tr>
          <th>Vardas</th>
          <th>Pavardė</th>
          <th>Gyvenamoji vieta</th>
          <th>Patirtis (metai)</th>
          <th>Registracija (metai)</th>
          <th>Vandens telkinys</th>
          <th>Redaguoti</th>

        </tr>

        @foreach ($members as $member)
        <tr>
          <td>{{$member->name}}</td>
          <td>{{$member->surname}}</td>
          <td>{{$member->live}}</td>
          <td>{{$member->experience}}</td>
          <td>{{$member->registered}}</td>
          <td>{{$member->reservoir->title}}</td>

          <td><a class="btn btn-info" href="{{route('member.edit',[$member])}}">edit</a>
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
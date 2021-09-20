@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div style="background-color: #B0C4DE; color:black" class="card">
        <div class="card-header text-center"><h3>cia turi buti perduodamas upes pavadinimas pagal id</h3></div>

        <div class="card-body">
          <table style="background-color: #B0C4DE; color:black" class="table">
          <a class="btn btn-info" href="{{ route('reservoir.index') }}"> Grįžti atgal į vandens tvenkinių sąrašą</a>
          
            <tr>
              <th>Vardas</th>
              <th>Pavardė</th>
              <th>Gyvenamoji vieta</th>
              <th>Patirtis(metai)</th>
              <th>Registracija(metai)</th>
              
            </tr>

            @foreach ($reservoir->member as $member)
            <tr>
              <td>{{$member->name}}</td>
              <td>{{$member->surname}}</td>
              <td>{{$member->live}}</td>
              <td>{{$member->experience}}</td>
              <td>{{$member->registered}}</td>

                  @csrf
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
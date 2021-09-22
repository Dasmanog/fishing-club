@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div style="background-color: #B0C4DE; color:black;" class="card">
        <div class="card-header text-center"><h3>Vandens tvenkiniai</h3></div>

        <div class="card-body">
          <table style="background-color: #B0C4DE; color:black;" class="table">
            <a class="btn btn-info" href="{{ route('reservoir.create') }}">
              Įrašyti Vandens tvenkinį</a>

              <tr>
                <th>Pavadinimas</th>
                <th>Plotas</th>
                <th>Aprašymas</th>
                <th>Nariai</th>
                <th>edit</th>
                <th>delete</th>
              </tr>

              @foreach ($reservoirs as $reservoir)
              <tr>
                <td>{!!$reservoir->title!!}</td>
                <td>{!!$reservoir->area!!}</td>
                <td>{!!$reservoir->about!!}</td>
                <td><a class="btn btn-success" href="{{route('reservoir.show',[$reservoir])}}">Užeiti</a></td>
                <td><a class="btn btn-info" href="{{route('reservoir.edit',[$reservoir])}}">edit</a></td>
                <td>
                  <form method="POST" action="{{route('reservoir.destroy', $reservoir)}}">
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
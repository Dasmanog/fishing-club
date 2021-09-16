
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #B0C4DE; color:black" class="card-header">Sukurti narį</div>
                <div style="background-color: #B0C4DE; color:black" class="card">
                <div style="background-color: #B0C4DE; color:black" class="card-body">
                    
                    <form method="POST" action="{{route('member.store')}}">
                        Name: <input type="text" name="name">
                        Surname: <input type="text" name="surname">
                        Live: <input type="text" name="live">
                        Experience: <input type="text" name="experience">
                        Registered: <input type="text" name="registered">
                        <select name="reservoir_id">
                            @foreach ($reservoirs as $reservoir)
                            <option value="{{$reservoir->id}}">{{$reservoir->title}} {{$reservoir->area}}  {{$reservoir->about}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button class="btn btn-info" type="submit">ADD</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
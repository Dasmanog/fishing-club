@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #B0C4DE; color:black" class="card-header text-center">
                    <h3>Sukurti narį</h3>
                </div>

                <div style="background-color: #B0C4DE; color:black" class="card-body">
                    <form method="POST" action="{{route('member.store')}}">


                        <div class="form-group">
                            <label for="name">Vardas:</label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="surname">Pavardė:</label>
                            <input class="form-control" type="text" name="surname" value="{{old('surname')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="live">Gyvenamoji vieta:</label>
                            <input class="form-control" type="text" name="live" value="{{old('live')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="experience">Patirtis (metai):</label>
                            <input class="form-control" type="number" name="experience" value="{{old('experience')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="registered">Registracija (metai):</label>
                            <input class="form-control" type="number" name="registered" value="{{old('registered')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="reservoir_id">vandens tvenkinys:</label>

                            <select style="color: black;" name="reservoir_id" class="form-control col-2">
                                @foreach ($reservoirs as $reservoir)
                                <option value="{{$reservoir->id}}">{{$reservoir->title}}</option>
                                @endforeach
                            </select>
                            @csrf
                        </div>
                        <br>
                        <button class="btn btn-info" type="submit">Pridėti</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
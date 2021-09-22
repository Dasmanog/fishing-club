@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #B0C4DE; color:black" class="card-header text-center"><h3>Redaguoti narį</h3></div>


                <div style="background-color: #B0C4DE; color:black" class="card-body image">
                    <form method="POST" action="{{route('member.update',[$member])}}">
                        <div class="form-group row">
                            <div class="form-group">
                                <label for="name">Vardas:</label>
                                <input class="form-control" type="text" name="name" value="{{old('name',$member->name)}}" required>
                            </div>
                            <div class="form-group">
                                <label for="surname">Pavardė:</label>
                                <input class="form-control" type="text" name="surname" value="{{old('surname',$member->surname)}}" required>
                            </div>
                            <div class="form-group">
                                <label for="live">Gyvenamoji vieta:</label>
                                <input class="form-control" type="text" name="live" value="{{old('live',$member->live)}}" required>
                            </div>
                            <div class="form-group">
                                <label for="experience">Patirtis (metai):</label>
                                <input class="form-control" type="text" name="experience" value="{{old('experience',$member->experience)}}" required>
                            </div>
                            <div class="form-group">
                                <label for="registered">Registracija (metai):</label>
                                <input class="form-control" type="text" name="registered" value="{{old('registered',$member->registered)}}" required>
                            </div>
                        </div>
                        <select name="reservoir_id">
                            @foreach ($reservoirs as $reservoir)
                            <option value="{{$reservoir->id}}" @if($reservoir->id == $member->reservoir_id) selected @endif>
                                {{$reservoir->title}}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                        <button class="btn btn-info" type="submit">Atnaujinti</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
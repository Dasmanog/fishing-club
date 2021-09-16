@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Redaguoti</div>

                <div class="card-body">

                    <form method="POST" action="{{route('member.update',[$member])}}">
                        Name: <input type="text" name="name" value="{{$member->name}}">
                        Surname: <input type="text" name="surname" value="{{$member->surname}}">
                        Live: <input type="text" name="live" value="{{$member->live}}">
                        Experience: <input type="text" name="experience" value="{{$member->experience}}">
                        Registered: <input type="text" name="registered" value="{{$member->registered}}">
                        <select name="reservoir_id">
                            @foreach ($reservoirs as $reservoir)
                            <option value="{{$reservoir->id}}" @if($reservoir->id == $member->reservoir_id) selected @endif>
                                {{$reservoir->name}} {{$reservoir->surname}} {{$reservoir->live}} {{$reservoir->experience}} {{$reservoir->registered}}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">edit</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
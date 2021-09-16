
@extends('layouts.app')

@section('content')



<div class="container">
   <div class="row justify-content-center">
      <div  class="col-md-8">
         <div style="background-color: #B0C4DE; color:black;" class="card">
            <div  class="card-header">
               <button class="btn btn-info" style="background-color:#B0C4DE"><a href="https://localhost/fishing-club/public/reservoirs">Home</a></button>
            Įvesti upę</div>

            <div  class="card-body">

<form method="POST" action="{{route('reservoir.update',$reservoir)}}">
   Title: <input type="text" name="title" value="{{$reservoir->title}}">
   Area: <input type="text" name="area" value="{{$reservoir->area}}">
   About:  <textarea name="about">{{$reservoir->about}}</textarea>
   @csrf
   <button class="btn btn-info" type="submit">edit</button>
  
</form>
</div>
         </div>
      </div>
   </div>
</div>
@endsection
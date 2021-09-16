@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div  class="col-md-8">
         <div style="background-color: #B0C4DE; color:black" class="card">
            <div  class="card-header">Įvesti vandens telkinį</div>

            <div  class="card-body">

               <form  method="POST" action="{{route('reservoir.store')}}">
                  Title: <input  type="text" name="title">
                  Area: <input type="text" name="area">

                  About: <textarea name="about"></textarea>

                  @csrf
                  <button class="btn btn-info" type="submit">ADD</button>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection

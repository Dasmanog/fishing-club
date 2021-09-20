@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div style="background-color: #B0C4DE; color:black" class="card">
            <div class="card-header text-center"><h3>Įrašyti vandens telkinį</h3></div>
            <div class="card-body">

               <form method="POST" action="{{route('reservoir.store')}}">
                  <div class="form-group">
                     <div class="form-group">
                        <label for="name">Pavadinimas:</label>
                        <input class="form-control" type="text" name="title" value="{{old('title')}}" required>
                     </div>
                     <div class="form-group">
                        <label for="name">Plotas:</label>
                        <input class="form-control" type="text" name="area" value="{{old('area')}}" required>
                     </div>
                     <div class="form-group" style="background-color: white!important;">
                        <label for="name">Aprašymas:</label>
                        <textarea class="form-control"  type="text" rows="3" name="about" id="summernote" value="{{old('about')}}" required></textarea>
                     </div>
                  </div>
                  @csrf
                  <button class="btn btn-info" type="submit">Pridėti</button>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>
@endsection
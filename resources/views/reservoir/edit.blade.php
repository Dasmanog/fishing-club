@extends('layouts.app')

@section('content')



<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div style="background-color: #B0C4DE; color:black;" class="card">
            <div class="card-header text-center"><h3>Redaguoti vandens tvenkinį</h3></div>
            <div class="card-body">

            <form method="POST" action="{{route('reservoir.update',[$reservoir])}}">
            <div class="form-group">
                     <div class="form-group">
                        <label for="name">Pavadinimas:</label>
                        <input class="form-control" type="text" name="title" value="{{old('title',$reservoir->title)}}" required>
                     </div>
                     <div class="form-group">
                        <label for="name">Plotas:</label>
                        <input class="form-control" type="number" name="area" value="{{old('area',$reservoir->area)}}" required>
                     </div>
                     <div class="form-group">
                        <label for="name">Aprašymas:</label>
                        <textarea style="background-color: white;" type="text" name="about" id="summernote" value="{{old('about',$reservoir->about)}}">{{$reservoir->about}}</textarea>
                     </div>
                     </div> 
                  @csrf
                  <button class="btn btn-info" type="submit">Atnaujinti</button>

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
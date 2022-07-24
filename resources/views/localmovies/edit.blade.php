@extends('layouts.app')

@section('content')
<div class="container">

    <form class="card" role="form" method="POST" action="{{ route('localmovies.update',$localmovies->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <!--<input type="hidden"  id="crew_value" name="crew_value" value="">
        <input type="hidden"  id="cast_value"  name="cast_value"  value="">-->
        
        {{ csrf_field() }}
         <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                <h3 class="card-title">Editing Movie : {{ $localmovies->title }}</h3>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Name</label>
                                      <input id="name" name="title" class="form-control" placeholder="Movie Name" value="{{$localmovies->title}}" type="text">
                                      </div>
                                  </div>

                                  <div class="col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <label class="form-label">Vote Average</label>
                                        <input  id="release_year" name="vote_average" class="form-control" placeholder="vote average" value="{{$localmovies->vote_average}}" type="text">
                                      </div>
                                  </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Release Date</label>
                                        <input  id="release_date" name="release_date" class="form-control" placeholder="release date" value="{{$localmovies->release_date}}" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Genres</label>
                                        <input  id="genres" name="genres" class="form-control" placeholder="genres" value="{{$localmovies->genres}}" type="text">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Overview</label>
                                        <input  id="overview" name="overview" class="form-control" placeholder="vote average" value="{{$localmovies->overview}}" type="text">
                                    </div>
                                </div>


                                <!--
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                      <label class="form-label">&nbsp;</label>
                                      <input  id="cast_btn" name="cast_btn" class="form-control btn btn-success add-more" placeholder="Release Name" value="Add" type="button">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-8">
                                    <div class="form-group">
                                      <table class="table table-bordered table-hover" id="casts_table" name="casts_table">

                                      </table>
                                    </div>
                                </div>
                                -->

                </div>
        </div>
        
        <div class="card-footer text-right">
                <div class="d-flex">
                  <a href="{{ route('localmovies.index') }}" class="btn btn-link">Cancel</a>
                  <button type="submit" class="btn btn-primary ml-auto">Update</button>
                </div>
        </div>

   
    
    </div>
</form>
</div>

@endsection

@section('custom_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
  var cast_id_items = [];
  var crew_id_items = [];

  $(document).ready(function(){
    var i=1,j=1;
     $("#cast_btn").click(function(){
      var cast    = $("#casts option:selected").text();   
      var cast_id = $("#casts").val();   

      cast_id_items.push(cast_id);

      var data_to_append = "<td>"+cast+"</td><td><button class='btn btn-danger btn-xs remove' type='button'><i class='glyphicon glyphicon-remove'></i> Remove</button></td>";
      $('#casts_table').append('<tr id="'+(i+1)+'">'+data_to_append+'</tr>');
      i++; 

      $('#cast_value').val((cast_id_items));

    });

     $("#crew_btn").click(function(){
      var crew = $("#crew option:selected").text();   
      var crew_id = $("#crew").val();  
             
      crew_id_items.push(crew_id);

      var data_to_append = "<td>"+crew+"</td><td><button class='btn btn-danger btn-xs remove' type='button'><i class='glyphicon glyphicon-remove'></i> Remove</button></td>";
      $('#crew_table').append('<tr id="'+(j+1)+'">'+data_to_append+'</tr>');
      j++; 

      $('#crew_value').val((crew_id_items));

    });


   $("body").on("click",".remove",function(){ 
        $(this).closest('tr').remove();
      });


  });

</script>
@endsection


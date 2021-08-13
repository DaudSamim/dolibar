@extends('layout.app')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .form-inline-custom {
        display: flex !important;
        align-items: flex-end !important;
        align-content: center;
    }

    .form-inline-custom label {
        width: 35% !important;
        
    }

    select {
        color: #495057 !important
    }

    input::placeholder {
        color: #495057 !important
    }

    .btn-grabar {
        background-color: #9B75A6 !important;
        color: #fff !important;
        padding: 10px 15px !important;
        font-size: 16px !important;
    }

</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(Session::has('info'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
        @endif
        @if(Session::has('alert'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('alert') }}</p>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
        @endforeach
        @endif
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit materiales al proyecto</h6>
                <form class="forms-sample" action="/edit_another_material" method="post">
                <div id="addings1">
                

@php 
    $tasks = DB::table('project_task')->where('project_id',$project->id)->get();
@endphp
@foreach($tasks as $task)
@php 
    $materials = DB::table('project_material')->where('task_id',$task->id)->where('project_id',$project->id)->get();
@endphp
<h4>Tarea : {{$task->task_name}}</h4>
<h5>Materials</h5>
<br>
@foreach($materials as $material)
@php 
 $name = DB::table('materials')->where('id',$material->material_id)->first();
@endphp


<div class="form-group form-inline-custom">
    <label for="exampleInputUsername1">{{$name->name}}</label>  
    <label for="exampleInputUsername1">Quantity</label>  

    <input value="{{$material->quantity}}" name="material_quantity[]" type="text"required
        class="js-example-basic-single w-90 select2-hidden-accessible"
        id="project" data-width="100%" data-select2-id="1"
        tabindex="-1"></input>
             
</div>
<br> 
@endforeach
@endforeach

<input value="{{$project->id}}" name="id" type="hidden"
        class="js-example-basic-single w-90 select2-hidden-accessible"
        id="project" data-width="100%" data-select2-id="1"
        tabindex="-1"></input>

</div>


                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button class="btn btn-grabar">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    var c = 1;
    var q = 2000;
    $(document).ready(function(){
  $('.addmore').on('click', function(){
     c = c + 1;
  
    $(this).closest('.addings').before(``);
                q = q + 1;
  });
 });

</script>

<script>

    function removeop(yes) {
        var o = "#" + yes; 
        $(o).closest('.aaa').remove();
        c = c - 1;
    }

    $("#project").change(function(e){

       e.preventDefault();
        $.ajaxSetup({
                 headers:{
                     'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                 }
                 

             });
                
        $.ajax({
            url: "get_task_list",
            type:"POST",
            data: {
                    project: $('#project').val(),
                  },
            
            success:function(data){
                document.getElementById("task_id").innerHTML = data;
                
            },error:function(){ 
                document.getElementById("task_id").innerHTML = "<option>No Tasks Available</option>";    
            }
        });

      });

    



</script>

<script>
    var material = 1;
    var t = 6000;
    $(document).ready(function () {
        $('.addmore1').on('click', function () {

            $(this).closest('.addings1').before(``);
            t = t + 1
            material = material + 1;
        });
    });



    function removematerial(yes) {

var o = "#" + yes;
var g = "#" + (yes - 1);
// var closest = element.closest(p1);
$(o).closest('.aaa').remove();
$(g).removeClass('d-none');
material = material - 1;

}
</script>
@endsection

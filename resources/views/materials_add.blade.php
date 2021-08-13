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
                <h6 class="card-title">Agregar materiales al proyecto</h6>
                <form class="forms-sample" action="/add_another_material" method="post">
                <div id="addings1">
                <div class="form-group form-inline-custom">
    <label for="exampleInputUsername1">Tarea</label>
    <select class="js-example-basic-single w-90 select2-hidden-accessible"required
        id="ubicación" value="{{old('task')}}" name="task"
        data-width="100%" data-select2-id="1" tabindex="-1"
        aria-hidden="true">
        <option value="" data-select2-id="3">Seleccione
        </option>
        @foreach($tasks as $task)
        <option value="{{$task->id}}" data-select2-id="3">
            {{$task->task_name}}
        </option>
        @endforeach


    </select>

</div>

<div class="form-group form-inline-custom">
    <label for="exampleInputUsername1">Nombre del material</label>
    <select class="js-example-basic-single w-90 select2-hidden-accessible"required
        id="ubicación" value="{{old('material_name[]')}}" name="material_name[]"
        data-width="100%" data-select2-id="1" tabindex="-1"
        aria-hidden="true">
        <option value="" data-select2-id="3">Seleccione
        </option>
        @foreach($materials as $material)
        <option value="{{$material->id}}" data-select2-id="3">
            {{$material->name}}
        </option>
        @endforeach


    </select>

</div>
<div class="form-group form-inline-custom">
    <label for="exampleInputUsername1">Cantidad</label>
    <input value="{{old('material_quantity[]')}}" name="material_quantity[]" type="number"required
        class="js-example-basic-single w-90 select2-hidden-accessible"
        id="project" data-width="100%" data-select2-id="1"
        tabindex="-1"></input>
        <input value="{{$project->id}}" name="id" type="hidden"
        class="js-example-basic-single w-90 select2-hidden-accessible"
        id="project" data-width="100%" data-select2-id="1"
        tabindex="-1"></input>
</div>

</div>
<div class="addings1">
<div class="div-btns text-center">
    <button type="button" class="btn btn addmore1">Agregar otro tipo de
        materiales</button>
</div>
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

            $(this).closest('.addings1').before(`<div class="aaa"><hr><br>
            <div style="float:right!important">
            <button type="button" onclick="removematerial('` + t + `')"id="` + t + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br>
    <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre del material</label>
                                            <select class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="ubicación" value="{{old('material_name[]')}}" name="material_name[]"required
                                                    data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" data-select2-id="3">Seleccione
                                                    </option>
                                                    @foreach($materials as $material)
                                                    <option value="{{$material->id}}" data-select2-id="3">
                                                        {{$material->name}}
                                                    </option>
                                                    @endforeach


                                                </select>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('material_quantity[]')}}" name="material_quantity[]" type="number"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1"
                                                    tabindex="-1"></input>
                                            </div>
                                        
                                    `);
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

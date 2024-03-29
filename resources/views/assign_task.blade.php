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
                <h6 class="card-title">Asignar Trabajadores</h6>
                <form class="forms-sample" action="/assign_task" method="post">
                    <div class="form-group form-inline-custom">
                        @php
                       
                        $employees = DB::table('employees')->get();
                       
                        @endphp
                        <label for="exampleInputUsername1">Seleccionar Proyecto Activo </label>
                        <select value="{{old('project_id')}}"
                            class="js-example-basic-single w-100 select2-hidden-accessible" id="project"
                            name="project_id" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="3">Select</option>
                            @foreach($projects as $project)
                            <option value="{{$project->id}}" data-select2-id="3">{{$project->project}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Seleccionar Tarea Pendiente </label>
                        <select value="{{old('task_id')}}"
                            class="js-example-basic-single w-100 select2-hidden-accessible" name="task_id" id="task_id" 
                            data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                           
                        </select>
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Seleccionar Fecha</label>
                        <input type="date" value="{{old('date')}}" class="form-control" id="exampleInputPassword1"
                            name="date" autocomplete="off" placeholder="" aria-autocomplete="list">
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del operario 1</label>
                        <select value="{{old('employee_id_1[]')}}"required
                            class="js-example-basic-single w-100 select2-hidden-accessible" name="employee_id_1[]"
                            data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="3">Select</option>
                            @foreach($employees as $employee)
                            <option value="{{$employee->id}}" data-select2-id="3">{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Agregar Operario Adicional </label>
                        <input type="text" name="employee_id_4" class="form-control">
                    </div> -->

                    <div class="addings">
                        <div class="div-btns text-center">
                            <button type="button" class="btn btn addmore">Agregar Operario Adicional</button>
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
  
    $(this).closest('.addings').before(`<div class="aaa">
    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del operario `+ c + `</label>
                        <select value="{{old('employee_id_1[]')}}"required
                            class="js-example-basic-single w-100 select2-hidden-accessible" name="employee_id_1[]"
                            data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="3">Select</option>
                            @foreach($employees as $employee)
                            <option value="{{$employee->id}}" data-select2-id="3">{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" onclick="removeop('`+ q +`')"id="`+ q +`" class="btn btn addmore">Remove Operator</button>
                                            </div>
                                        
                                    `);
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
@endsection

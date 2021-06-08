@extends('layout.app')
<style>
 .form-inline-custom{
        display: flex !important;
    align-items: flex-end !important;
    align-content: center;
    }
    .form-inline-custom label{
        width: 35% !important;a
    }
    select{
	   color: #495057 !important
   }
   input::placeholder{
    color: #495057 !important
   }
   .btn-grabar{
	   background-color: #9B75A6 !important;
	color: #fff !important;
	padding: 10px 15px !important;
    font-size: 16px !important;
   }
   </style>

@section('content')

<div class="row">
    <div class="col-md-6">
    @if(Session::has('info'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
        @endforeach
        @endif
                <div class="card">
                    <div class="card-body">
                        <h6  class="card-title">Tareas</h6>
                            <form class="forms-sample"action="/create_task" method="post">
                                <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1"> Nombre</label>
                                    <input value="{{old('name')}}" class="js-example-basic-single w-100 select2-hidden-accessible"id="project"name="name" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"></input>
                                </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Descripción</label>
                                            <textarea value="{{old('description')}}" class="js-example-basic-single w-100"name="description"></textarea>
                                        </div>

                                        <div class="div-btns text-center">
                                            <input type="hidden" name="_token" value={{csrf_token()}}>
                                            <button class="btn btn-grabar">Guardar</button>
                                        </div>
                            </form>
                                                                        
                    </div>
                </div>
    </div>

    <div class="col-md-6"style="padding-bottom:200px!important">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
        @endforeach
        @endif
                <div class="card">
                    <div class="card-body">
                        <h6  class="card-title">Subtareas</h6>
                            <form class="forms-sample"action="/create_subtask" method="post">
                                <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Tarea Nombre</label>
                                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('task_id')}}"name="task_id" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach($tasks as $task)
                                        <option value="{{$task->id}}" data-select2-id="3">{{$task->task}}</option>
                                    @endforeach
                                        
                                    </select>                                
                                </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Subtarea</label>
                                            <input value="{{old('subtasks')}}" name="subtasks" class="js-example-basic-single w-100 select2-hidden-accessible"id="project" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"></input>
                                        </div>

                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Descripción</label>
                                            <textarea value="{{old('description')}}"name="description" class="js-example-basic-single w-100"></textarea>
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
  var project = document.getElementById( 'project' );
  project.onchange = function() {
      $.ajax({
  type: "POST",
  url: "find_tasks",
  data: {
    values: data
  },
  success: function(msg) {
    if (msg) {
      alert('success'); //testing purposes
    } else {
      alert('fail'); //testing purposes
    }
  },
  error:function(e){
      alert("something wrong"+ e) // this will alert an error
  }
});
 };

</script>
@endsection
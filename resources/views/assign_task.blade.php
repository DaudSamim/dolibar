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
<div class="col-md-12">
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


<h6  class="card-title">Asignar Trabajadores</h6>
<form class="forms-sample"action="/assign_task" method="post">
<div class="form-group form-inline-custom">

@php
$projects = DB::table('projects')->get();
$employees = DB::table('employees')->get();
$tasks = DB::table('tasks')->get();
@endphp


                                <label for="exampleInputUsername1">Seleccionar Proyecto Activo  </label>
                                        <select value="{{old('project_id')}}"class="js-example-basic-single w-100 select2-hidden-accessible"id="project"name="project_id" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($projects as $project)
                                 <option value="{{$project->id}}" data-select2-id="3">{{$project->project}}</option>
                                       @endforeach
                                 
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Seleccionar Tarea Pendiente </label>
                                        <select value="{{old('task_id')}}" class="js-example-basic-single w-100 select2-hidden-accessible"name="task_id" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach($tasks as $task)
                                 <option value="{{$task->id}}" data-select2-id="3">{{$task->task}}</option>
                                @endforeach
                                 
                                       
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Asignar Operario 1 </label>
                                        <select value="{{old('employee_id_1')}}" class="js-example-basic-single w-100 select2-hidden-accessible"name="employee_id_1" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($employees as $employee)
                                 <option value="{{$employee->id}}" data-select2-id="3">{{$employee->name}}</option>
                                       @endforeach
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Asignar Operario 2</label>
                                        <select value="{{old('employee_id_2')}}" class="js-example-basic-single w-100 select2-hidden-accessible"name="employee_id_2" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($employees as $employee)
                                 <option value="{{$employee->id}}" data-select2-id="3">{{$employee->name}}</option>
                                       @endforeach
                              </select> 
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Asignar Operario 3</label>
                                        <select value="{{old('employee_id_3')}}" class="js-example-basic-single w-100 select2-hidden-accessible"name="employee_id_3" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($employees as $employee)
                                 <option value="{{$employee->id}}" data-select2-id="3">{{$employee->name}}</option>
                                       @endforeach
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Asignar Operario 4</label>
                                        <select value="{{old('employee_id_4')}}" class="js-example-basic-single w-100 select2-hidden-accessible"name="employee_id_4" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($employees as $employee)
                                 <option value="{{$employee->id}}" data-select2-id="3">{{$employee->name}}</option>
                                       @endforeach
                              </select>
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

@endsection
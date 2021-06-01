@extends('layout.app')
<style>
 .form-inline-custom{
        display: flex !important;
    align-items: flex-end !important;
    align-content: center;
    }
    .form-inline-custom label{
        width: 35% !important;
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
<div class="card">
<div class="card-body">
<h6  class="card-title">Asignar Trabajadores</h6>
<div class="form-group form-inline-custom">
<label for="exampleInputUsername1">Seleccionar Proyecto Activo  </label>
                                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Seleccionar proyecto</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Seleccionar Tarea Pendiente </label>
                                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Seleccionar proyecto</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Asignar Operario 1 </label>
                                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Seleccionar proyecto</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Asignar Operario 2</label>
                                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Seleccionar proyecto</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Asignar Operario 3</label>
                                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Seleccionar proyecto</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
									</div>
                                    <div class="form-group form-inline-custom">
                                    <label for="exampleInputUsername1">Agregar Operario Adicional </label>
										<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Agregar Operario Adiciona">
									</div>
                                    <div class="div-btns text-center">
                                  
                                    <button class="btn btn-grabar">Guardar</button>
                                    </div>
</div>
</div>
</div>
</div>

@endsection
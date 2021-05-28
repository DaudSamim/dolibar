@extends('layout.app')
<style>
   .div-img img{
   width: 150px !important;
   border-radius: 50% !important;
   object-fit: contain !important;
   }
   .form-inline-custom{
   display: flex !important;
   align-items: flex-end !important;
   align-content: center;
   }
   .form-inline-custom label{
   width: 25% !important;
   }
   select{
   color: #495057 !important
   }
   .btn-grabar{
   background-color: #9B75A6 !important;
   color: #fff !important;
   padding: 10px 15px !important;
   font-size: 16px !important;
   }
   .btn-green{
      background-color: #25A580 !important;
   color: #fff !important;
   padding: 10px 15px !important;
   font-size: 16px !important;
   }
   .btn-eliminar{
      background-color: #EAE4E1 !important;
      color: #9B75A6 !important;
   padding: 10px 15px !important;
   font-size: 16px !important;
   }
   .user{
    height: 200px;
    width: 200px;
    margin: 0px auto;
    margin-bottom: 10px;
    border-radius: 10px;
    border: 1px solid;
    box-shadow: 0 0.05rem 0.01rem rgb(75 75 90 / 50%);
}
.user img{
    height: 100%;
    width: 100%;
    object-fit: contain;
}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
    integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
@section('content')
<div class="row">
  
   <div class="col-md-12">
      <div class="card p-3">
         <div class="row">
         <div class="col-md-12">
   <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Trabajador</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/production">Proyecto asignado</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/dedicated_time">Tiempos dedicados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="/history_employees">Historico</a>
  </li>
  
</ul>
   </div>
         </div>
      <div class="row mt-5">
            <div class="col-md-3">
                <div class="user">
                    <img src="https://www.clipartmax.com/png/middle/144-1442578_flat-person-icon-download-dummy-man.png" alt="">
                </div>
                <h6 class="text-center">Etiqueta/Categoria</h6>
            </div>
            <div class="col-md-9">
                <div class="text-right mb-2">
                     <span class="mr-lg-4">Volver al listado</span>  <i class="fas fa-chevron-left mr-3"></i><i class="fas fa-chevron-right ml-3"></i>
                </div>
                <div class="d-flex">
                    <div class="col-md-8">
                        <h6 class="mb-3">Nombre del Trabajador</h6>
                        <div class="d-flex">
                            <div class="col-md-6 p-lg-0">
                                <p>Numero celular</p>
                                <p>Direccion de residencia</p>
                                <p>Provincia</p>
                                <p>E-mail</p>
                            </div>
                            <div class="col-md-6 p-lg-0">
                                <p>Numero celular</p>
                                <p>Direccion de residencia</p>
                                <p>Provincia</p>
                                <p>E-mail</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pr-lg-0">
                        <div class="d-flex h-100 flex-column justify-content-between">
                            <div class="text-right">
                                <a href="javascript:void(0)" class="btn btn-green" >Activo</a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="javascript:void(0)" class="btn btn-grabar">MODIFICAR</a>
                                <a href="javascript:void(0)" class="btn btn-eliminar">Eliminar</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="row">
   <div class="col-md-12">
      <hr>
   </div>
</div>
<div class="row">
   <div class="col-md-5">
   <div class="form-group form-inline-custom">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Seleccionar proyecto</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
									</div>
   </div>
   <div class="col-md-2"></div>
   <div class="col-md-5">
   <div class="form-group form-inline-custom">
										<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Tarea actual">
									</div>
   </div>
   <div class="col-md-5">
   <div class="form-group form-inline-custom">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Seleccionar tarea</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
									</div>
   </div>
</div>
<div class="row">
   <div class="col-md-12 text-right">
   <button class="btn btn-grabar">GRABAR</button>
   </div>
</div>
      </div>
   </div>
</div>
@endsection
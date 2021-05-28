@extends('layout.app')
<style>
   .div-img img{
   width: 150px !important;
   border-radius: 50% !important;
   object-fit: contain !important;
   }
   .form-inline-custom{
   display: flex !important;
   align-items: center !important;
   align-content: center;
   }
   .form-inline-custom label{
   width: 85% !important;
   margin-bottom: 0px !important;
   margin-right: 5px
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
   hr{
    border: 1px solid #727CD4 !important;
   }
</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
        <div class="row">
               <div class="col-md-6">
                  <div class="form-group form-inline-custom">
                     <label style="width: 40% !important" for="exampleInputPassword1">Proyecto actual</label>
                     <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option value="TX" data-select2-id="3">Texas</option>
                        <option value="NY" data-select2-id="12">New York</option>
                        <option value="FL" data-select2-id="13">Florida</option>
                        <option value="KN" data-select2-id="14">Kansas</option>
                        <option value="HW" data-select2-id="15">Hawaii</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group form-inline-custom">
                     <label style="width: 40% !important" for="exampleInputPassword1">Tarea actual</label>
                     <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option value="TX" data-select2-id="3">Texas</option>
                        <option value="NY" data-select2-id="12">New York</option>
                        <option value="FL" data-select2-id="13">Florida</option>
                        <option value="KN" data-select2-id="14">Kansas</option>
                        <option value="HW" data-select2-id="15">Hawaii</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row" style="    align-items: center;">
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Avanca Tarea</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Requerimiento</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
               <div class="col-md-4 text-right">
                   <h5 style="color: #727CD4">ASIGNADO</h5>
               </div>
               <div class="col-md-8">
                  <hr>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Candidad producida por el trabajdor</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Horas dedicados</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Productividad</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8">
                  <hr>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Unidades fallades</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Ratio unidades falladas</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Unidades corregidas</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Unidades por corregir</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <hr>
                </div>
            </div>
            <div class="row">
            <div class="col-md-4">
                  <div class="form-group form-inline-custom">
                     <label for="exampleInputPassword1">Requerimiento del dia</label>
                     <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
                  </div>
               </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex" style="justify-content: space-between;   align-items: center;">
                        <h4>Nobre del trabajador</h4>
                        <button class="btn btn-grabar">GRABAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout.app')
<style>
   table th{
   border-top: none !important;
   border-bottom: none !important
   }
   table td{
   border-top: none !important
   }
   .div-flex{
   display: flex;
   justify-content: space-between;
   margin: 10px 0px !important
   }
   .div-flex span{
	font-size: 16px;
    font-weight: 500;
   }
   .div-border{
   border: 1px dashed green;
   padding: 20px;
   }
   .btn-grabar{
	   background-color: #9B75A6 !important;
	color: #fff !important;
	padding: 10px 15px !important;
    font-size: 16px !important;
   }
   select{
	   color: #495057 !important
   }
</style>
@section('content')

<div class="row">
   <div class="col-md-12">
      <div class="card p-3">

      <h4>Proyectos activos</h4>
            <div class="row">
               <div class="col-md-12">
                  <div class="parent-div">
                     <div class="div-flex ">
                        <h5>Etiqueta proyecto</h5>
                        <h5>Días restantes</h5>
                     </div>
                     <div class="div-border">
                        <div class="div-flex">
                           <span>Rejillas metalicas</span>
                           <span>15 dias</span>
                        </div>
                        <div class="div-flex">
                           <span>Cercos metalicos</span>
                           <span class="text-danger">3 dias</span>
                        </div>
                     </div>
                  </div>
               </div>
          
            
            </div>
         </div>
      </div>
   </div>


<div class="row">
   <div class="col-md-12">
      <div class="card">

      
         <div class="card-body">
            <h5>horas de trabajo de la empresa</h5>
            <hr>
         @if(Session::has('info'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
      @endforeach
      @endif
      <form action="/add_time" method="post">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Día</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Horas del día</th>
                     </tr>
                  </thead>
                  <tbody>
                  
                  
                     <tr>
                        <th>Lunes</th>
                        <td>
                           <div class="form-group" data-select2-id="7">
                           
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="monday_start_time"id="#start" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->monday_start_time}}" data-select2-id="3">{{$times->monday_start_time}}</option>
                                 <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>


                                 

                                 
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible "onchange="difference('#start','#end','#reslt')"  onload="my()"id="#end"name="monday_end_time" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->monday_end_time}}" data-select2-id="3">{{$times->monday_end_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                        <div class="form-group">
                        <span id = "#reslt"></span>
                              
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Martes</th>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="tuesday_start_time"id="#start1" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->tuesday_start_time}}" data-select2-id="3">{{$times->tuesday_start_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="tuesday_end_time"id="#end1"onchange="difference('#start1','#end1','#reslt1')" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->tuesday_end_time}}" data-select2-id="3">{{$times->tuesday_end_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                        <div class="form-group">
                        <span id = "#reslt1"></span>
                              
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Miércoles</th>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="wednesday_start_time"id="#start2" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->wednesday_start_time}}" data-select2-id="3">{{$times->wednesday_start_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <!-- hkjhjkh -->
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="wednesday_end_time"id="#end2"onchange="difference('#start2','#end2','#reslt2')" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->wednesday_end_time}}" data-select2-id="3">{{$times->wednesday_end_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                        <div class="form-group">
                        <span id = "#reslt2"></span>
                              
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th>Jueves</th>
                        <td>
                           <div class="form-group" data-select2-id="7">
                           <select class="js-example-basic-single w-100 select2-hidden-accessible"name="thursday_start_time"id="#start3" data-width="100%"  data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->thursday_start_time}}" data-select2-id="3">{{$times->thursday_start_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="thursday_end_time"id="#end3"onchange="difference('#start3','#end3','#reslt3')" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->thursday_end_time}}" data-select2-id="3">{{$times->thursday_end_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                        <div class="form-group">
                        <span id = "#reslt3"></span>
                              
                           </div>
                        </td>
                     </tr>

                     <tr>
                        <th>Viernes</th>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="friday_start_time" id="#start4" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->friday_start_time}}" data-select2-id="3">{{$times->friday_start_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="friday_end_time"id="#end4"onchange="difference('#start4','#end4','#reslt4')" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"value="11:00">
                              <option value="{{$times->friday_end_time}}" data-select2-id="3">{{$times->friday_end_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        
                        <td>
                        <div class="form-group">
                        <span id = "#reslt4"></span>
                              
                           </div>
                        </td>
                     </tr>

                     <tr>
                        <th>Sábado</th>
                        <td>
                           <div class="form-group" data-select2-id="7">
                           
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="saturday_start_time"id="#start5" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->saturday_start_time}}" data-select2-id="3">{{$times->saturday_start_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group" data-select2-id="7">
                              <select class="js-example-basic-single w-100 select2-hidden-accessible"name="saturday_end_time"id="#end5"onchange="difference('#start5','#end5','#reslt5')" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="{{$times->saturday_end_time}}" data-select2-id="3">{{$times->saturday_end_time}}</option>
                              <option value="0:00" data-select2-id="3">0:00</option>
                                 <option value="0:30" data-select2-id="12">0:30</option>
                                 <option value="1:00" data-select2-id="13">1:00</option>
                                 <option value="1:30" data-select2-id="14">1:30</option>
                                 <option value="2:00" data-select2-id="15">2:00</option>
                                 <option value="2:30" data-select2-id="15">2:30</option>
                                 <option value="3:00" data-select2-id="15">3:00</option>
                                 <option value="3:30" data-select2-id="15">3:30</option>
                                 <option value="4:00" data-select2-id="15">4:00</option>
                                 <option value="4:30" data-select2-id="15">4:30</option>
                                 <option value="5:00" data-select2-id="15">5:00</option>
                                 <option value="5:30" data-select2-id="15">5:30</option>
                                 <option value="6:00" data-select2-id="15">6:00</option>
                                 <option value="6:30" data-select2-id="15">6:30</option>
                                 <option value="7:00" data-select2-id="15">7:00</option>
                                 <option value="7:30" data-select2-id="15">7:30</option>
                                 <option value="8:00" data-select2-id="15">8:00</option>
                                 <option value="8:30" data-select2-id="15">8:30</option>
                                 <option value="9:00" data-select2-id="15">9:00</option>
                                 <option value="9:30" data-select2-id="15">9:30</option>
                                 <option value="10:30" data-select2-id="15">10:30</option>
                                 <option value="11:00" data-select2-id="15">11:00</option>
                                 <option value="11:30" data-select2-id="15">11:30</option>
                                 <option value="12:00" data-select2-id="15">12:00</option>
                                 <option value="12:30" data-select2-id="15">12:30</option>
                                 <option value="13:00" data-select2-id="15">13:00</option>
                                 <option value="13:30" data-select2-id="15">13:30</option>
                                 <option value="14:00" data-select2-id="15">14:00</option>
                                 <option value="14:30" data-select2-id="15">14:30</option>
                                 <option value="15:00" data-select2-id="15">15:00</option>
                                 <option value="15:30" data-select2-id="15">15:30</option>
                                 <option value="16:00" data-select2-id="15">16:00</option>
                                 <option value="16:30" data-select2-id="15">16:30</option>
                                 <option value="17:00" data-select2-id="15">17:00</option>
                                 <option value="17:30" data-select2-id="15">17:30</option>
                                 <option value="18:00" data-select2-id="15">18:00</option>
                                 <option value="18:30" data-select2-id="15">18:30</option>
                                 <option value="19:00" data-select2-id="15">19:00</option>
                                 <option value="19:30" data-select2-id="15">19:30</option>
                                 <option value="20:00" data-select2-id="15">20:00</option>
                                 <option value="20:30" data-select2-id="15">20:30</option>
                                 <option value="21:00" data-select2-id="15">21:00</option>
                                 <option value="21:30" data-select2-id="15">21:30</option>
                                 <option value="22:00" data-select2-id="15">22:00</option>
                                 <option value="22:30" data-select2-id="15">22:30</option>
                                 <option value="23:00" data-select2-id="15">23:00</option>
                                 <option value="23:30" data-select2-id="15">23:30</option>
                                 <option value="24:00" data-select2-id="15">24:00</option>
                              </select>

                              
                           </div>
                        </td>
                        <td>
                        <div class="form-group">
                        <span id = "#reslt5"></span>
                              
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>

            <div class="row">
               <div class="col-md-5">
               
               </div>
			   <div class="col-md-7" style="display: flex; justify-content: flex-end;  align-items: flex-end;">
				   <button type="submit" class="btn btn-grabar">GRABAR</button>
               <input type="hidden" name="_token" value={{csrf_token()}}>
			   </div>
            
            </div>
         </div>
         </form>
      </div>
   </div>
</div>
<script>
function difference(strt,ed,reslt) {
    start =document.getElementById(strt).value;  
    
    end = document.getElementById(ed).value;  

    start = start.split(":");
    end = end.split(":");
    
    console.log("nu yayy");
    var startDate = new Date(0, 0, 0, start[0], start[1], 0);
    var endDate = new Date(0, 0, 0, end[0], end[1], 0);
    var diff = endDate.getTime() - startDate.getTime();
    var hours = Math.floor(diff / 1000 / 60 / 60);
    diff -= hours * (1000 * 60 * 60);
    var minutes = Math.floor(diff / 1000 / 60);
    diff -= minutes * (1000 * 60);
    var seconds = Math.floor(diff / 1000);

    // If using time pickers with 24 hours format, add the below line get exact hours
    if (hours < 0)
       hours = hours + 24;
       
    
    document.getElementById(reslt).innerHTML = (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes ;

}
window.onload = function() {
   
   difference('#start','#end','#reslt');
   difference('#start1','#end1','#reslt1');
   difference('#start2','#end2','#reslt2');
   difference('#start3','#end3','#reslt3');
   difference('#start4','#end4','#reslt4');
   difference('#start5','#end5','#reslt5');
   
    
}



</script>
@endsection
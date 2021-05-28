@extends('layout.app')
<style>
   table th{
   border-top: none !important;
   border-bottom: none !important;
   text-align: center !important;
   }
   table td{
   border-top: none !important;
   text-align: center !important;
   }
   .form-inline-custom{
   display: flex !important;
   align-items: flex-end !important;
   align-content: center;
   }
   .form-inline-custom label{
   width: 80% !important;

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
      <div class="card p-2">
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
         </div>
         <div class="row">
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
               <h5 style="color: #727CD4">Unidades producidas</h5>
            </div>
            <div class="col-md-12">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th></th>
                           <th style="background: gainsboro;">
                              <span>Lun</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th style="background: gainsboro;">
                              <span>Mar</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th style="background: gainsboro;">
                              <span>Mie</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th style="background: gainsboro;">
                              <span>Jue</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th style="background: gainsboro;">
                              <span>Vie</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th>
                              <span>LUN</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th>
                              <span>Sab</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th>
                              <span>Dom</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th>
                              <span>Lun</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th>
                              <span>Mar</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th>
                              <span>Mie</span> <br>
                              <span>29/5/2021</span>
                           </th>
                           <th>
                              <span>Cant producida por trabajador</span>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- <tr>
                           <td>Otto</td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                        </tr> -->
                        <tr>
                           <td>Trabajador 1</td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>Trabajador 2</td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>Trabajador 3</td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control" style="background-color: #ADD09D">  
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>Total</td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control" style="background-color: #ADD09D">  
                              </div>
                           </td>
                           <td>
                              <div class="form-group">
                                 <input type="text " readonly class="form-control" style="background-color: #FFC000">  
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="col-md-3 mt-3">
               <div class="form-group form-inline-custom">
                  <label for="exampleInputPassword1">Avance real</label>
                  <input type="text " readonly class="form-control ml-2" style="background-color: #FFC000">  
               </div>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-4 mt-3">
               <div class="form-group form-inline-custom">
                  <label for="exampleInputPassword1">Ritmo de produccion</label>
                  <input type="text " readonly class="form-control ml-2" style="background-color: #ADD09D">  
               </div>
            </div>
            <div class="col-md-12 text-center">
               <button class="btn btn-grabar">GRABAR</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
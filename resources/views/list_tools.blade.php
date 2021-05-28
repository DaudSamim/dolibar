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
   width: 25% !important;
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
    <div class="col-md-12 my-3">
        <h5>Listado de herramientas</h5>
    </div>
    <div class="col-md-12">
    <div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
												
													<th>
                                                       <span> Nobre</span>
                                                    </th>
													<th>
                                                       <span> Codigo</span>
                                                    </th>
													<th>
                                                       <span> Proyecto asignado</span>
                                                    </th>
                                                    <th>
                                                       <span> Tarea asignado</span>
                                                    </th>
                                                    <th>
                                                       <span> Trabajador asignador</span>
                                                    </th>
                                                    <th>
                                                       <span> Disponibilidad</span>
                                                    </th>
                                                    <th>
                                                       <span> Estado</span>
                                                    </th>
                                                    <th>
                                                       <span> Ubicacian</span>
                                                    </th>
                                                    <th>
                                                        <span>Tipo</span>
                                                      
                                                    </th>
												</tr>
											</thead>
											<tbody>
												
                                                <tr>
													
													
													
                                                    <td>
                                                   Taladro 1
                                                    </td>
													<td>
                                                  T001
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                             <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Texas</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
                           </div>
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                             <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Texas</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
                           </div>
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                             <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Texas</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
                           </div>
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                             <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Texas</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
                           </div>
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                             <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Texas</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
                           </div>
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                             <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Texas</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
                           </div>
                                                    </td>
                                                    <td>
                                                    <div class="form-group">
                                                    <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                 <option value="TX" data-select2-id="3">Texas</option>
                                 <option value="NY" data-select2-id="12">New York</option>
                                 <option value="FL" data-select2-id="13">Florida</option>
                                 <option value="KN" data-select2-id="14">Kansas</option>
                                 <option value="HW" data-select2-id="15">Hawaii</option>
                              </select>
                           </div>
                                                    </td>
												</tr>
											</tbody>
										</table>
								</div>
    </div>
   
    <div class="col-md-12 my-4 text-center">
    <button class="btn btn-grabar">ASIGNAR</button>
    </div>
</div>
        </div>
    </div>
</div>
@endsection
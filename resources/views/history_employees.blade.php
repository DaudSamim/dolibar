@extends('layout.app')
<style>
     table th{
   /* border-top: none !important;
   border-bottom: none !important; */
   
   text-align: center !important;
   }
   table td{
   /* border-top: none !important; */
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
    
    <div class="col-md-12">
    <div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th></th>
													<th>Crantidad total producida</th>
                                                    <th>Crantidad total corregida</th>
                                                    <th>Horas totales dedicadas</th>
                                                    <th>Productividad</th>
													<th>Ratio Unidades fallades</th>
													<th>Registro de fechas</th>
												</tr>
											</thead>
											<tbody>
												<tr>
                                                <td>Trabjod 1</td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td></td>
													<td></td>
													<td>
                                                        <span>29/05 - 05/06</span> <br>
                                                       
                                                    </td>
                                                  
													
												</tr>
												<tr>
                                                <td>Trabjod 2</td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td></td>
													<td></td>
													<td>
                                                        <span>29/05 - 05/06</span> <br>
                                                        <span>29/05 -- 05/06</span>
                                                    </td>
                                                  
													
												</tr>
                                                <tr>
                                                <td>Trabjod 3</td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td></td>
													<td></td>
													<td>
                                                        <span>29/05 - 05/06</span> <br>
                                                        <span>29/05 -- 05/06</span>
                                                    </td>
                                                  
													
												</tr>
                                                <tr>
                                                <td>Trabjod 4</td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td></td>
													<td></td>
													<td>
                                                        <span>29/05 - 05/06</span> <br>
                                                       
                                                    </td>
                                                  
													
												</tr>
                                                <tr>
                                                <td>Trabjod 5</td>
													<td></td>
													<td></td>
													<td></td>
                                                    <td></td>
													<td></td>
													<td>
                                                        <span>29/05 - 05/06</span> <br>
                                                        <span>29/05 -- 05/06</span>
                                                  
													</td>
												</tr>
                                                

											</tbody>
										</table>
								</div>

        </div>
    </div>
</div>
</div>
</div>
@endsection
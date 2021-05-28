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
    <div class="col-md-12 text-right">
        <h5 style="color: #727CD4">Horas Dedicadas</h5>
    </div>
    <div class="col-md-12">
    <div class="table-responsive pt-3">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th></th>
                                                <th>Anadir horas</th>
												<th>
                                                        <span>Lunes</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
                                                    <th>
                                                        <span>Martes</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
                                                    <th>
                                                        <span>Miercoles</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
                                                    <th>
                                                        <span>Domingo</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
                                                    <th>
                                                        <span>LUN</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
											
                                                    <th>
                                                        <span>Lunes</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
                                                    <th>
                                                        <span>Martes</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
                                                    <th>
                                                        <span>Miercoles</span><hr class="py-0 my-1">
                                                        <span>29/5/2021</span>
                                                    </th>
                                                <th>Horas dedicadas</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Trabjod 1</td>
												<td></td>
												<td>	</td>
												<td>2</td>
												<td>44</td>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>44</td>
                                                <td>44</td>
											</tr>
                                            <tr>
												<td>Trabjod 2</td>
												<td></td>
												<td>	</td>
												<td>2</td>
												<td>44</td>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>44</td>
                                                <td>44</td>
											</tr>
                                            <tr >
												<td>Trabjod 3</td>
												<td></td>
												<td>	</td>
												<td>2</td>
												<td>44</td>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>44</td>
                                                <td>44</td>
											</tr>
                                            <tr style="background: gainsboro;">
												<td>Trabjod 4</td>
												<td></td>
												<td>	</td>
												<td>2</td>
												<td>44</td>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>44</td>
                                                <td>44</td>
											</tr>
                                            <tr style="background: gainsboro;">
												<td>Trabjod 5</td>
												<td></td>
												<td>	</td>
												<td>2</td>
												<td>44</td>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>44</td>
                                                <td>44</td>
											</tr>
										</tbody>
									</table>
								</div>

</div>
<div class="col-md-12 text-center my-4">
    <button class="btn btn-grabar">GRABAR</button>
    </div>
        </div>
    </div>
</div>
@endsection
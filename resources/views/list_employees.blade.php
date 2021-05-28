@extends('layout.app')
<style>
     table th{
   border-top: none !important;
   border-bottom: none !important;
   color: #727CD4 !important;
   font-size: 14.5px !important;
   text-align: center !important;
   }
   table td{
   border-top: none !important;
   text-align: center !important;
   }
   .div-flex{
   display: flex;
   justify-content: space-between;
   margin: 10px 10px !important
   }
   .div-flex span{
    font-size: 25px;
    color: #0A1160;
   }
   a{
    text-decoration: none !important;
   }
</style>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
@section('content')
   <div class="row">
       <div class="col-md-12">
       <div class="card">
              <div class="card-body">
								<div class="div-flex">
                                    <h5>Listado de trabajadores</h5>
                                    <span><a style="color: black" href="/new_employee"><i class='bx bxs-plus-circle'></i></a></span>
                                </div>
								<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
												<th>Nombre del trabajadores</th>
													<th>Movil</th>
													<th>Proyecto asignado</th>
													<th>Tarea asignado</th>
                                                    <th>Requerimiento dia</th>
                                                    <th>% real</th>
                                                    <th>% estimado</th>
                                                    <th>Estado</th>
                                                    <th>Holgua tarea</th>
												</tr>
											</thead>
											<tbody>
                                            @foreach($employees as $employee)
												<tr>
												    <td><a href="{{'profile/'.$employee->id}}">{{ $employee->name}}</a></td>
													<td>{{ $employee->mobile}}</td>
													<td></td>
                                                    <td></td>
													<td></td>
													<td></td>
                                                    <td></td>
													<td class="text-success">A tiempo</td>
													<td class="text-success">+ 3 dias</td>
												</tr>
                                            @endforeach
												
											</tbody>
										</table>
								</div>
              </div>
            </div>
       </div>
   </div>
@endsection

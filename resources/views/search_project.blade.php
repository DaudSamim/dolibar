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
								<h3 class="card-title">Vista resumen de las obras</h3>
								<form class="forms-sample" action="/search_project" method="post" enctype='multipart/form-data'>
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Fecha</label>
										<input type="date" @if(isset($fecha)) value="{{ \Carbon\Carbon::parse($fecha)->format('Y-m-d')}}"@endif class="form-control" id="exampleInputUsername1"name="fecha" autocomplete="off" placeholder="">
                                        
									</div>
								<div class="form-group form-inline-custom">
                                <label>Status de la obra</label>
                                    <select class="js-example-basic-single w-100 select2-hidden-accessible" name="work" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                          <option @if(isset($work)) value="{{$work}}" @endif>@if(isset($work)) @if($work==0) Proyecto por iniciar @endif @if($work==1) Proyecto abierto @endif @if($work==2) Proyecto cerrado @endif @else Select @endif</option>
                                          <option value="0"> Proyecto por iniciar</option>   
                                          <option value="1" >Proyecto abierto</option>
                                          <option value="2" >Proyecto cerrado</option>
                                    </select>
                                </div>
                                    <div class="div-btns text-center">
                                        <input type="hidden" name="_token" value={{csrf_token()}}>
                                        <button type="submit" class="btn btn-grabar">Buscar</button>
                                    </div>
                                </form>
                </div>
                </div>
<br>



<div class="row">
    
    <div class="col-md-12">
    <div class="table-responsive">
										<table class="table">
                                        
											<thead>

												<tr>
                                                
													<th>Id</th>
													<th>Project</th>
                                                    <th>Costo de mano de obra</th>
                                                    <th>Costo de materiales</th>
                                                    <th>Precio de venta</th>
													<th>Grado de avance</th>
													<th>Fecha de entrega</th>
                                                    <th>Ingeniero a cargo</th>
                                                    <th>Celular del ingeniero</th>
                                                    

												</tr>
											</thead>
											<tbody>
                                            @foreach($projects as $project)
												<tr>
                                                <td>{{$project->id}}</td>
                                                <td>{{$project->project}}</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
													<td>{{$project->amount}}</td>
													<td>{{$project->degree_of_progress}}</td>
													
                                                    
                                                    
													<td>{{$project->delivery_date}}</td>
                                                    <td>{{$project->engineer_incharge}}</td>
                                                    <td>{{$project->contact_person}}</td>
                                                    
                                            @endforeach	
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
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
										<input type="date"value="{{old('fecha')}}" class="form-control" id="exampleInputUsername1"name="fecha" autocomplete="off" placeholder="">
									
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputEmail1">Status de la obra</label>
										<input type="text"value="{{old('work')}}"class="form-control" id="exampleInputEmail1"name="work" placeholder="">
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
                                                <td>{{$project->amount}}</td>
                                                <td>{{$project->amount}}</td>
													<td>{{$project->location}}</td>
													<td>{{$project->contact_person}}</td>
													<td>{{$project->engineer_incharge}}</td>
                                                    
													<td>{{$project->start_date}}</td>
													<td>{{$project->delivery_date}}</td>
                                                    <td>@if($project->status == 0) 
                                                                <option value="{{$project->status}}" data-select2-id="3">To start</option>  
                                                                @endif  
                                                                @if($project->status == 1) 
                                                                <option value="{{$project->status}}" data-select2-id="3">On going</option>  
                                                                @endif  
                                                                @if($project->status == 2) 
                                                                <option value="{{$project->status}}" data-select2-id="3">Stopped</option>  
                                                                @endif  </td>
                                                    
                                                    
                                                    
                                                       
                                                    </form>
                                                    
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
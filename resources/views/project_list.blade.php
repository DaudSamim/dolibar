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
   }select.form-control, select, .email-compose-fields .select2-container--default select.select2-selection--multiple, .select2-container--default select.select2-selection--single, .select2-container--default .select2-selection--single select.select2-search__field, select.typeahead, select.tt-query, select.tt-hint {
    color: black  !important;
   }
</style> 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card p-2">
        @if(Session::has('info'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
      @endif
      @if(Session::has('alert'))
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('alert') }}</p>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
      @endforeach
      @endif
            

<div class="row">
   
    <div class="col-md-12">
      <div class="div-flex" style="margin: 2%">
          <h5>Status de los proyectos</h5>
          
      </div>
    <div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
												
													<th>Project</th>
                          <th>Start Date / Delivery Date</th>
                          <th>Degree of Progress</th>
                          <th>Task or Subtask in Progress</th>
													<th>Cost Projection</th>
													<th>Actual Cost</th>
                          <th>Engineer in Charge</th>
                          <th>Status</th>
                          

												</tr>
											</thead>
											<tbody>
                        @foreach($projects as $project)
												<tr>
                          <td>{{$project->project}}</td>
													<td>{{$project->start_date}} --- {{$project->delivery_date}}</td>
													<td>
                                 <form id="btn-submit"action="/change_degree_of_progree" method="post">
                                  <div class="form-group form-inline-custom">
                                  <input name="id" type="hidden" value="{{$project->id}}">
                                  <input type="text" style="text-align: center;" class="form-control" name="degree_of_progress" value="{{$project->degree_of_progress}}">
                                  
                                   </div>
                                  
                                  <input type="submit" id="action_button" class="btn btn-primary btn-block" value="Change Degree of Progress" />
                                 
                                  <input type="hidden" name="_token" value={{csrf_token()}}>
                                  </td>
                                 
                              </form>             
                          </td>
													<td>
                              <form id="btn-submit"action="/change_current_status" method="post">
                                  <div class="form-group form-inline-custom">
                                  <input name="id" type="hidden" value="{{$project->id}}">
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="" name="current_task" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                           <option value="">Select Task</option>
                                          @foreach($tasks as $row)
                                          <option value="{{$row->task}}" @if($project->current_task == $row->task) selected @endif data-select2-id="12">{{$row->task}}</option>
                                          @endforeach
                                         
                                      </select>
                    </div>
                                  <input type="submit" id="action_button" class="btn btn-primary btn-block" value="Change Task or Subtask" />
                                  <input type="hidden" name="_token" value={{csrf_token()}}>
                                  </td>
                                 
                              </form>
                          </td>
                          <td>${{$project->amount}}</td>
													<td> 
                              <form id="btn-submit"action="/change_actual_cost" method="post">
                                  <div class="form-group form-inline-custom">
                                  <input name="id" type="hidden" value="{{$project->id}}">
                                  <input type="text" style="text-align: center;" class="form-control" name="actual_cost" value="{{$project->actual_cost}}">
                                  
                                   </div>
                                  
                                  <input type="submit" id="action_button" class="btn btn-primary btn-block" value="Change Actual Cost" />
                                 
                                  <input type="hidden" name="_token" value={{csrf_token()}}>
                                  </td>
                                 
                              </form>
                            </td>
													<td>{{$project->engineer_incharge}}</td>
                        
                                                    
                                                    
                              <td>
                              <form id="btn-submit"action="/change_status" method="post">
                                  <div class="form-group form-inline-custom">
                                  <input name="id" type="hidden" value="{{$project->id}}">
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value=""name="status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                          <option value="0"@if($project->status == 0)selected @endif data-select2-id="14"> Proyecto por iniciar</option>   
                                          <option value="1" @if($project->status == 1)selected @endif data-select2-id="13">Proyecto abierto</option>
                                          <option value="2" @if($project->status == 2) selected @endif data-select2-id="12">Proyecto cerrado</option>
                                          
                                        
                                           
                                      </select>
                    </div>
                                  <input type="submit" id="action_button" class="btn btn-primary btn-block" value="Change Status" />
                                  <input type="hidden" name="_token" value={{csrf_token()}}>
                                  </td>
                                 
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
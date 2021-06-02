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
            

<div class="row">
    
    <div class="col-md-12">
    <div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Id</th>
													<th>Project</th>
                                                    <th>Location</th>
                                                    <th>Contact Person</th>
                                                    <th>Engineer Incharge</th>
													<th>Amount</th>
													<th>Start date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                    <th></th>

												</tr>
											</thead>
											<tbody>
                                            @foreach($projects as $project)
												<tr>
                                                <td>{{$project->id}}</td>
                                                <td>{{$project->project}}</td>
													<td>{{$project->location}}</td>
													<td>{{$project->contact_person}}</td>
													<td>{{$project->engineer_incharge}}</td>
                                                    <td>{{$project->amount}}</td>
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
                                                    
                                                    
                                                    <td>
                                                    <form id="btn-submit"action="/change_status" method="post">
                                                        <div class="form-group form-inline-custom">
                                                        <input name="id" type="hidden" value="{{$project->id}}">
									                        <select class="js-example-basic-single w-100 select2-hidden-accessible" value=""name="status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                                
                                                                <option value="2" @if($project->status == 2) selected @endif data-select2-id="12">stopped</option>
                                                                <option value="1" @if($project->status == 1)selected @endif data-select2-id="13">On going</option>
                                                                <option value="0"@if($project->status == 0)selected @endif data-select2-id="14">To start</option>    
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
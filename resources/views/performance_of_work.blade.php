@extends('layout.app')

<style>
    .form-inline-custom {
        display: flex !important;
        align-items: flex-end !important;
        align-content: center;
    }

    .form-inline-custom label {
        width: 35% !important;
    }

    select {
        color: #495057 !important
    }

    .btn-grabar {
        background-color: #9B75A6 !important;
        color: #fff !important;
        padding: 10px 15px !important;
        font-size: 16px !important;
    }

</style>
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
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
                <h6 class="card-title">Desempeño de la obra</h6>
                <form class="forms-sample" action="/work-performance" method="post" enctype='multipart/form-data'>
                <div class="form-group form-inline-custom">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="month" class="form-control" id="exampleInputPassword1" required name="date" @if(isset($date2)) value="{{$date2}}" @endif autocomplete="off" placeholder="" aria-autocomplete="list">
                </div>

                <div class="form-group form-inline-custom">
                    <label for="exampleInputUsername1">Projecto</label>
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}" name="project" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                        <option>Seleccionar proyecto</option>
                        @foreach($projects as $row)
                        <option value="{{$row->id}}" @if(isset($project)) @if($project == $row->id)) selected @endif @endif data-select2-id="12">{{$row->project}}</option>
                        @endforeach
                    </select>
                   

                </div>
               
               
                <div class="form-group form-inline-custom">
                    <label for="exampleInputPassword1">Status del proyecto</label>
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}" name="status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected value="active" data-select2-id="12">Activo</option>
                        <option value="delivered" data-select2-id="13">Entregado</option>
                       
                    </select>
                </div>

                <div class="form-group form-inline-custom">
                    <label for="exampleInputPassword1">Filtro</label>
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}" name="filter" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected data-select2-id="12">Seleccionar filtro</option>
                        <option value="Soldador" data-select2-id="12">Tiempo de trabajo</option>
                        <option value="Maestro Soldador" data-select2-id="13">Cumplimiento del objetivo</option>
                        <option value=" Ingeniero" data-select2-id="14"> Unidades terminadas</option>
                        <option value="Vendedor" data-select2-id="15">Unidades con fallas</option>
                        <option value="Tercerizado" data-select2-id="15">Pérdidas valorizadas </option>
                    </select>
                </div>
                <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">GRABAR</button>
                    </div>
                </form>
            
<br>

                <div class="table-responsive">
                    
                    <table class="table table-bordered">
                        
                        <thead>
                            <tr>

                                <th>Tareas</th>
                                @php
                                    if(isset($date)){
                                        $d = cal_days_in_month(CAL_GREGORIAN,$date[1],$date[0]);
                                        
                                    }
                                @endphp
                                @if(isset($date))
                                @for($i=1; $i<=$d; $i++)
                                    @if(date('D',strtotime($i.'-'.$date[1].'-'.$date[0])) != 'Sun')
                                        <th>{{date('D-d',strtotime($i.'-'.$date[1].'-'.$date[0]))}}</th>
                                    @endif
                                @endfor
                                @endif
                                <th><strong>cantidad mensual</strong></th>
                                <th>Status</th>


                            </tr>
                        </thead>
                        <tbody>

                            
                           @if(isset($tasks))
                           @foreach($tasks as $task)
                            <tr>
                            
                                <td>{{$task->task_name}}</td>
                               @if(isset($date))
                               @php
                                $monthly_cost = 0;
                               @endphp
                                @for($i=1; $i<=$d; $i++)
                                    @if(date('D',strtotime($i.'-'.$date[1].'-'.$date[0])) != 'Sun')
                                        @php
                                            $date_format = date('Y-m-d',strtotime($i.'-'.$date[1].'-'.$date[0]));

                                            $worker_id = DB::table('daily_work_performance')->whereDate('date',$date_format)->where('task_id',$task->id)->where('attendance_status',0)->pluck('employee_id')->first();
                                            $worker = DB::table('employees')->where('id',$worker_id)->first();
                                            if($worker){
                                                $cost = DB::table('daily_work_performance')->whereDate('date',$date_format)->where('task_id',$task->id)->pluck('working_time')->first() * $worker->salary;
                                                $monthly_cost += $cost;
                                            }
                                        @endphp
                                        <td>@if(isset($worker)){{$worker->name??''}}
                                            <br>
                                            ${{$cost}}
                                            @endif
                                        </td>
                                    @endif
                                @endfor
                                @endif
                                <td>${{$monthly_cost}}</td>
                                <td><a href="#"><button class="btn" style="background-color: #9b75a6; color: white">Tarea cerrada</button></a></td>

                                 
                                
                            </tr>
                            @endforeach
                           @endif

                           <th><strong>cantidad diaria</strong></th>
                            @if(isset($date))
                                @for($i=1; $i<=$d; $i++)
                                    @if(date('D',strtotime($i.'-'.$date[1].'-'.$date[0])) != 'Sun')
                                        <td></td>
                                    @endif
                                @endfor
                                @endif
                          

                           
                        </tbody>
                       
                    </table>
                    
                </div>
                
            </div>
        </div>
    </div>
    </div>
    @endsection

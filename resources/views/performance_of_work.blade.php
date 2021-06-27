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
                        <span style="padding-right:10px;padding-bottom:5px" for="exampleInputPassword1">Status del
                            proyecto</span>
                        <select class="js-example-basic-single w-20 select2-hidden-accessible" value="{{old('type')}}"
                            name="status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option selected value="active" data-select2-id="12">Activo</option>
                            <option value="delivered" data-select2-id="13">Entregado</option>
                        </select>
                    </div>

                    <div class="form-group form-inline-custom">
                        <span style="padding-right:10px;padding-bottom:5px" for="exampleInputPassword1">Fecha
                            Start</span>
                        <input type="month" class="form-control w-20" id="exampleInputPassword1" required name="date"
                            @if(isset($date2)) value="{{$date2}}" @endif autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                            <span style="padding-right:10px;padding-bottom:5px;padding-left:10px" for="exampleInputPassword1">Fecha
                            End</span>
                        <input type="month" class="form-control w-20" id="exampleInputPassword1" required name="date"
                            @if(isset($date2)) value="{{$date2}}" @endif autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>



                    <div class="form-group form-inline-custom">
                        <span style="padding-right:10px;padding-bottom:5px">Projecto</span>
                        <select class="js-example-basic-single w-40 select2-hidden-accessible" value="{{old('type')}}"
                            name="project" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"
                            required>
                            <option>Seleccionar proyecto</option>
                            @foreach($projects as $row)
                            <option value="{{$row->id}}" @if(isset($project)) @if($project==$row->id)) selected @endif
                                @endif data-select2-id="12">{{$row->project}}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">BUSCAR</button>
                    </div>

                    <div class="form-group form-inline-custom text-right" style="float:right">
                        <span style="padding-right:10px;padding-bottom:5px">Filtro</span>
                        <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}"
                            name="filter" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option selected data-select2-id="12">Seleccionar filtro</option>
                            <option value="Soldador" data-select2-id="12">Tiempo de trabajo</option>
                            <option value="Maestro Soldador" data-select2-id="13">Cumplimiento del objetivo</option>
                            <option value=" Ingeniero" data-select2-id="14"> Unidades terminadas</option>
                            <option value="Vendedor" data-select2-id="15">Unidades con fallas</option>
                            <option value="Tercerizado" data-select2-id="15">Pérdidas valorizadas </option>
                        </select>
                    </div>

                </form>

                <br> @foreach($tasks as $task)
                <div class="row">
                    <div class="container">
                        <h4>Tarea: {{$task->task_name}}</h4>
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>
                            @php
                            if(isset($date)){
                            $d = cal_days_in_month(CAL_GREGORIAN,$date[1],$date[0]);
                            }
                            $monthly_cost = 0;
                            @endphp
                            @for($i=1; $i<=$d; $i++) @if(date('D',strtotime($i.'-'.$date[1].'-'.$date[0])) !='Sun' )
                                @php $date_format=date('Y-m-d',strtotime($i.'-'.$date[1].'-'.$date[0]));
                                $worker_id=DB::table('daily_work_performance')->
                                whereDate('date',$date_format)->where('task_id',$task->id)->where('attendance_status',0)->pluck('employee_id')->first();
                                $worker = DB::table('employees')->where('id',$worker_id)->first();


                                if(isset($worker)){

                                $first_day = $i;
                                $first_worker = $i;
                                break;
                                }

                                @endphp
                                @endif
                                @endfor

                                <tr>
                                    <th>Worker</th>
                                    @for(; $first_day<=$d; $first_day++)
                                        @if(date('D',strtotime($first_day.'-'.$date[1].'-'.$date[0])) !='Sun' ) <th>
                                        {{date('D-d',strtotime($first_day.'-'.$date[1].'-'.$date[0]))}}</th>
                                        @else
                                        <th></th>
                                        @endif
                                        @endfor

                                </tr>
                        </thead>
                        <tbody>


                            @php
                            $All_single_task_workers =
                            DB::table('daily_work_performance')->where('task_id',$task->id)->get();
                            $count = count( $All_single_task_workers);
                            $w = 0;
                            $array[0] = 0;
                            $terminate = 0;

                            @endphp
                            @php

                            $count = sizeof($array)-1;

                            @endphp

                            @for($pointer = 0; $pointer <= $count; $pointer++) @php $array[$pointer]=1; @endphp @endfor
                                @foreach($All_single_task_workers as $single_task_worker) @for($pointer=0; $pointer
                                <=$count; $pointer++) @if($array[$pointer]==$single_task_worker->employee_id)
                                @php
                                $terminate = 1;
                                break;
                                @endphp
                                @else
                                @php
                                $terminate = 2;

                                @endphp
                                @endif
                                @endfor

                                @if($terminate == 1)
                                @php

                                break;

                                @endphp
                                @endif

                                <tr>
                                    @php
                                    $worker_name =
                                    DB::table('employees')->where('id',$single_task_worker->employee_id)->first();
                                    $single_record =
                                    DB::table('daily_work_performance')->where('employee_id',$single_task_worker->employee_id)->where('attendance_status',0)->orderBy('date')->get();
                                    @endphp
                                    @if(isset($worker_name))
                                    <td>{{$worker_name->name}}</td>
                                    @php
                                    $first_worker = $i;
                                    @endphp
                                    @foreach($single_record as $record)


                                    @for(; $first_worker<=$d; $first_worker++) @php
                                        $date_format=date('Y-m-d',strtotime($first_worker.'-'.$date[1].'-'.$date[0]));
                                        @endphp @if($record->date == $date_format)
                                        <td>{{$record->date}}</td>
                                        @php
                                        break;
                                        @endphp
                                        @else
                                        <td></td>
                                        @endif
                                        @endfor
                                        @php
                                        $first_worker = $first_worker + 1;
                                        @endphp
                                        @endforeach
                                        @endif

                                </tr>
                                @php

                                $array[$w] = $single_task_worker->employee_id;
                                $w = $w + 1;

                                @endphp

                                @endforeach











                        </tbody>
                    </table>
                </div>
                @php
                $task_status = DB::table('project_task')->where('id',$task->id)->first();
                @endphp
                @if($task_status->task_status == 0)
                <br>
                <div class="div-btns text-center" style="float:right">
                    <input type="hidden" name="_token" value={{csrf_token()}}>
                    <a href="{{'/Change-Status/'.$task->id}}"><button class="btn btn-primary">Tarea
                            terminada</button></a>
                </div>
                <br>
                @endif
                @if($task_status->task_status == 1)
                <br>
                <div class="div-btns text-center" style="float:right">
                    <input type="hidden" name="_token" value={{csrf_token()}}>
                    <a href="{{'/Change-Statuss/'.$task->id}}"><button class="btn btn-secondary">Reabrir tarea</button></a>
                </div>
                <br>
                @endif
                @endforeach


            </div>
        </div>
    </div>
</div>
@endsection

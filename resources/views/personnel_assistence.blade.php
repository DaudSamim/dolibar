@extends('layout.app')

<?php
use Carbon\Carbon;
use Carbon\CarbonPeriod;
?>
<style>
    table th {
        /* border-top: none !important;
   border-bottom: none !important; */

        text-align: center !important;
    }

    table td {
        /* border-top: none !important; */
        text-align: center !important;
    }

    .form-inline-custom {
        display: flex !important;
        align-items: flex-end !important;
        align-content: center;
    }

    .form-inline-custom label {
        width: 25% !important;
    }

    .btn-grabar {
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
                    <h3 class="card-title">Personnel Assistence</h3>
                    
                </div>
            </div>
            <br>



            <div class="row">

                <div class="col-md-12">
                    <div class="table-responsive">
                    <form class="forms-sample" action="/personel_assistence" method="post" enctype='multipart/form-data'>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Fecha Start </label>
                        <input type="date" class="form-control" value="{{old('start_date')}}" required
                            id="exampleInputPassword1" name="start_date" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div><div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Fecha End </label>
                        <input type="date" class="form-control" value="{{old('end_date')}}" required
                            id="exampleInputPassword1" name="end_date" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">GRABAR</button>
                    </div>

                </form>
                    @if(isset($yes))
                        <table class="table">

                            <thead>

                                <tr>
                                    <th>Name</th>
                                    @foreach($days as $row)
                                    <th>{{$row}}</th>
                                    @endforeach
                                    <th>Total Salary</th>
                                    
                                </tr>
                            </thead>
                            @php 
                            $employees = DB::table('employees')->get(); 
                            $total_salary = 0;
                            $discount = 0;
                            @endphp
                            <tbody>
                                @foreach($employees as $row)
                                <tr>
                                    <td>{{$row->name}}</td>
                                    @foreach($all as $one)
                                    @php 
                                    $attend = DB::table('daily_work_performance')->where('employee_id',$row->id)->where('date',$one)->first();
                                    @endphp
                                    @if(isset($attend))
                                        @if($attend->attendance_status == '0')
                                        <td>Attended
                                        @php 
                                                $cal = $row->salary * $attend->working_time;
                                                $total_salary = $total_salary + $cal;
                                        @endphp
                                            <br>
                                          Salary = {{$cal}}
                                        </td>
                                        @endif
                                        @if($attend->attendance_status == '1')
                                        <td>-</td>
                                        @endif
                                        @if($attend->attendance_status == '2')
                                        <td>X</td>
                                        @endif
                                    @else 
                                    <td>No Attendance</td>
                                    @endif
                                    
                                    @endforeach
                                    <td>{{$total_salary}}</td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                            
                        </table>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

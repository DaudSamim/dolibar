@extends('layout.app')
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
                    <h3 class="card-title">Lista de trabajadoras</h3>
                    
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
                                    <th>Name</th>
                                    <th>Worker Type</th>
                                    <th>Salary</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Working hours</th>
                                    <th>Mobile</th>
                                    <th>Emergency Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($workers as $worker)
                                <tr>

                                    <td>{{$worker->id}}</td>
                                    <td>{{$worker->name}}</td>
                                    <td>{{$worker->workers_type}}</td>
                                    <td>{{$worker->salary}}</td>
                                    @if(isset($worker->email))
                                    <td>{{$worker->email}}</td>
                                    @else 
                                    <td>Not added</td>
                                    @endif
                                    @if(isset($worker->address))
                                    <td>{{$worker->address}}</td>
                                    @else 
                                    <td>Not added</td>
                                    @endif
                                    @if(isset($worker->working_hours))
                                    <td>{{$worker->working_hours}}</td>
                                    @else
                                    <td>Not added</td>
                                    @endif
                                    @if(isset($worker->mobile))
                                    <td>{{$worker->mobile}}</td>
                                    @else
                                    <td>Not Added</td>
                                    @endif
                                    @if(isset($worker->emergency_number))
                                    <td>{{$worker->emergency_number}}</td>
                                    @else
                                    <td>Not added</td>
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

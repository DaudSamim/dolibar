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
                    <h3 class="card-title">Lista de Cliente</h3>
                    
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
                                    <th>RUC/DNI</th>
                                    <th>Type of customer</th>
                                    <th>Bussiness</th>
                                    <th>Address</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Contact person Name</th>
                                    <th>Contact person Cellular</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $array[] = '';
                                $c = 0;
                                $count = count($clients);
                                
                                $check = 'false';
                                @endphp
                                
                                @foreach($clients as $client)
                                @php 
                                $size = count($array) - 1;
                                @endphp
                                    @for($i = 0; $i <= $size; $i++)
                                    @if($array[$i] == $client->ruc)
                                    @php 
                                        $check = 'true';
                                        break;
                                    @endphp
                                    @else
                                    @php 
                                        $check = 'false';
                                    @endphp
                                    @endif
                                    @endfor 
                                @if($check == 'false')
                                <tr>

                                    <td>{{$client->id}}</td>
                                    <td>{{$client->name}}</td>

                                    <td>{{$client->ruc}}</td>
                                    <td>{{$client->type}}</td>
                                    @if(isset($client->bussiness_turnaround))
                                    <td>{{$client->bussiness_turnaround}}</td>
                                    @else 
                                    <td>Not added</td>
                                    @endif
                                    @if(isset($client->address))
                                    <td>{{$client->address}}</td>
                                    @else 
                                    <td>Not added</td>
                                    @endif
                                    @if(isset($client->age))
                                    <td>{{$client->age}}</td>
                                    @else
                                    <td>Not added</td>
                                    @endif
                                    @if(isset($client->sex))
                                    <td>{{$client->sex}}</td>
                                    @else
                                    <td>Not Added</td>
                                    @endif
                                    @php 
                                    $persons_name = DB::table('customers')->where('ruc',$client->ruc)->pluck('contact_person_name');
                                    $persons_cellular = DB::table('customers')->where('ruc',$client->ruc)->pluck('person_cellular');
                                    $array_size = count($persons_name) - 1;
                                    $x = 1;
                                    @endphp
                                    
                                    <td>
                                    @for($z = 0;$z <= $array_size; $z++)
                                    {{$x}}) {{$persons_name[$z]}} <br>
                                    @php 
                                    $x = $x + 1;
                                    @endphp
                                    @endfor
                                    </td>
                                    <td>
                                    @for($z = 0;$z <= $array_size; $z++)
                                        {{$persons_cellular[$z]}}<br>
                                        @endfor
                                        </td>
                                    </tr>
                                    @php
                                    $array[$c] = $client->ruc;
                                    $c = $c + 1;
                                    @endphp
                                    @endif
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

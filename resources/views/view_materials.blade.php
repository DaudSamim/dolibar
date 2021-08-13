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

        @if(Session::has('info'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
        @endforeach
        @endif

        <div class="card p-2">
            <div class="row">

                <div class="col-md-12">
                    <div class="table-responsive">
                        <br>
                        <h4 class="text-center">Material</h4>
                        <table class="table" id="table1">

                            <br>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Unit Of Measure</th>
                                    <th>Available Stock</th>
                                    <th>Stock To Be Collected</th>
                                    <th>Total Stock</th>
                                    <th>Action</th>


                                </tr>
                                
                            </thead>
                            <tbody>
                            <tr>
                                    <th style="color:red"class="text-left">Servicios Metalmecánic </th>
                                    </tr>
                                    <tr><th class="text-left">Corte de planchas</th></tr>
                                    
                                    
                                
                                @php
                                $materials = DB::table('materials')->where('category','Servicios Metalmecánic')->where('model','Corte de planchas')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Corte y doblez de planchas</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Servicios Metalmecánic')->where('model','Corte y doblez de planchas')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Rolado de tubos</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Servicios Metalmecánic')->where('model','Rolado de tubos')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Doblado de tubos</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Servicios Metalmecánic')->where('model','Doblado de tubos')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Torno</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Servicios Metalmecánic')->where('model','Torno')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Pintura al horno</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Servicios Metalmecánic')->where('model','Pintura al horno')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Troquelado</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Servicios Metalmecánic')->where('model','Troquelado')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="color:red"class="text-left">Tubos, Perfiles y vigas </th>
</tr>
<tr>                                    <th class="text-left"> Tubos Galvanizados</th>
</tr>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Tubos, Perfiles y vigas')->where('model','Tubos Galvanizados')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Tubos Negros</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Tubos, Perfiles y vigas')->where('model','Tubos Negros')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Vigas</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Tubos, Perfiles y vigas')->where('model','Vigas')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Ángulos</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Tubos, Perfiles y vigas')->where('model','Ángulos')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Platinas</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Tubos, Perfiles y vigas')->where('model','Platinas')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Rieles</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Tubos, Perfiles y vigas')->where('model','Rieles')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="color:red"class="text-left">Planchas </th>
</tr>
<tr>                                    <th class="text-left">Galvanizada</th>
</tr>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Planchas')->where('model','Galvanizada')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Negra</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Planchas')->where('model','Negra')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Estriada</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Planchas')->where('model','Estriada')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Inoxidables</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Planchas')->where('model','Inoxidables')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="color:red"class="text-left">Retazos </th>
</tr><tr>
                                    <th class="text-left">Plancha Galvanizada</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Retazos')->where('model','Plancha Galvanizada')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Plancha Inoxidable</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Retazos')->where('model','Plancha Inoxidable')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Plancha Inoxidable</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Retazos')->where('model','Plancha Negra')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Plancha Estriada</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Retazos')->where('model','Plancha Estriada')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Tubos inoxidables</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Retazos')->where('model','Tubos inoxidables')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Tubos y perfiles</th>
                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Retazos')->where('model','Tubos y perfiles')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="color:red"class="text-left">Coberturas </th>
</tr>
<tr>                                    <th class="text-left">Aluzinc</th>
</tr>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Coberturas')->where('model','Aluzinc')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Eternit</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Coberturas')->where('model','Eternit')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                
                                    <tr>                                    <th style="color:red" class="text-left">Fabricaciones</th>
</tr>
<tr>                                    <th class="text-left">Terminadas</th>
</tr>

                                
                                @php
                                $materials = DB::table('materials')->where('category','Fabricaciones')->where('model','Terminadas')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">En proceso</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Fabricaciones')->where('model','En proceso')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>

                                    <th style="color:red" class="text-left">Prefabricados</th>
</tr><tr>                                    <th class="text-left">Marcos para puerta</th>


                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Prefabricados')->where('model','Marcos para puerta')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="font-size:13px;"class="text-left">Arcos/barandas de tubo negroArcos/barandas de tubo negro</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Prefabricados')->where('model','Arcos/barandas de tubo negroArcos/barandas de tubo negro')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Arcos/barandas de tubo inoxidable</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Prefabricados')->where('model','Arcos/barandas de tubo inoxidable')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Tapas de plancha</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Prefabricados')->where('model','Tapas de plancha')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Cajas</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Prefabricados')->where('model','Cajas')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Chasis de moto</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Prefabricados')->where('model','Chasis de moto')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="color:red"class="text-left">Pernos y tornillos</th>
</tr>
<tr>
                                    <th class="text-left">Pernos</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Pernos y tornillos')->where('model','Pernos')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Tornillos</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Pernos y tornillos')->where('model','Tornillos')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Autoperforantes</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Pernos y tornillos')->where('model','Autoperforantes')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="color:red"class="text-left">Ferretería - Soldad</th>
</tr>
<tr>
                                    <th class="text-left">Discos</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Soldad')->where('model','Discos')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Soldadura</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Soldad')->where('model','Soldadura')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Acabados</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Soldad')->where('model','Acabados')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Gases</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Soldad')->where('model','Gases')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th style="color:red"class="text-left">Ferretería - Inoxidabl</th>
</tr>
<tr>
                                    <th class="text-left">Discos</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Inoxidabl')->where('model','Discos')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Soldadura</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Inoxidabl')->where('model','Soldadura')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Acabados</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Inoxidabl')->where('model','Acabados')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                                <tr>
                                    <th class="text-left">Gases</th>

                                </tr>
                                @php
                                $materials = DB::table('materials')->where('category','Ferretería - Inoxidabl')->where('model','Gases')->get();
                                $count = count($materials)
                                @endphp
                                @if($count >=1)
                                @foreach($materials as $material)
                                <tr>
                                    <td>{{$material->id}}</td>
                                    <td>{{$material->name}}</td>
                                    <td>{{$material->code}}</td>
                                    <td>{{$material->description}}</td>
                                    <td>N/A</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td>{{$material->quantity}}</td>
                                    <td><a href="{{'/delete/'.$material->id}}"><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete
</button></a></td>

                                </tr>
                                @endforeach
                                @else 
                                <td>No materials to show</>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <br>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            "aLengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ],
            "iDisplayLength": 5,
            "order": [
                [0, "desc"]
            ]
        });


    });

</script>
@endsection

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
                        <h4 class="text-center">Kardex de Categorías/Modelos/Artículos
</h4>
<br>
<div class="row">
    <div class="col-8">
        <form class="forms-sample" action="/getpdf" method="post" enctype='multipart/form-data'>
            <div class="form-group form-inline-custom">
                <label for="exampleInputUsername1">Nombre Client</label>
                <input type="text" value="{{old('name')}}" required class="form-control w-50" id="exampleInputUsername1"
                    name="name" autocomplete="off" placeholder="">
            </div>
            <div class="form-group form-inline-custom">
                <label for="exampleInputUsername1">Nombre Mobile Number</label>
                <input type="number" value="{{old('number')}}" required class="form-control w-50"
                    id="exampleInputUsername1" name="number" autocomplete="off" placeholder="">
            </div>
            <div class="form-group form-inline-custom">
                <label for="exampleInputUsername1">Nombre Address</label>
                <input type="address" value="{{old('address')}}" required class="form-control w-50"
                    id="exampleInputUsername1" name="number" autocomplete="off" placeholder="">
            </div>

    </div>
</div>
                        <table class="table" id="table1">

                            <br>
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Motivo</th>
                                    <th>Tipo de Documento (T/D):</th>
                                    <th>Número de documento
</th>
                                    <th>Entidad</th>
                                    <th>Ingreso</th>
                                    <th>Salida</th>
                                    <th>Saldo</th>


                                </tr>
                                
                            </thead>
                            <tbody>
                            
                                
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

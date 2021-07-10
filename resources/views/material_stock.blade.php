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
                <h6 class="card-title">REPORTE DE STOCK DIARIO</h6>
                <br>

                <div class="row">
                    
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>

                            <tr>
                            <td>Código </td>
                            <td>Descripción </td>
                            <td>Unidad de medida (UM)</td>
                            <td>Stock disponible</td>
                            <td>Stock por recoger</td>
                            <td>Stock total</td>
                            
                            </tr>
                            
                        </thead>
                        <tbody>
                        @foreach($materials as $material)
                        <tr>
                        <td>{{$material->id}}</td>
                        <td>{{$material->description}}</td>
                        <td>{{$material->length}}</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
@endsection
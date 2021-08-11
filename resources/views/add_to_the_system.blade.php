@extends('layout.app')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    input::placeholder {
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
<div class="row">
    <div class="col-md-12">
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
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Agregar al sistema</h6>
                <a href="add-client"><button type="submit"  class="btn btn-grabar">Agregar Cliente</button></a>
                <a href="create-materialas"><button type="submit"  class="btn btn-grabar">Agregar Materialas</button></a>
                <a href="add-client"><button type="submit"  class="btn btn-grabar">Agregar Proveedores</button></a>
                <a href="add-client"><button type="submit"  class="btn btn-grabar">Agregar Partes interesadas</button></a>
                <a href="add-client"><button type="submit"  class="btn btn-grabar">Agregar Instrumentos</button></a>
                <br><br>
                <a href="add-client"><button type="submit"  class="btn btn-grabar">Agregar Productos a fabricar</button></a>



            </div>
        </div>
    </div>
</div>



@endsection

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
                <h6 class="card-title">Kardex de Categorías/Modelos/Artículos</h6>
                <form class="forms-sample" action="/work-performance" method="post" enctype='multipart/form-data'>


                    <div class="form-group form-inline-custom">
                        <span style="padding-right:10px;padding-bottom:5px" for="exampleInputPassword1">Status del
                        Seleccionar filtro</span>
                        <select class="js-example-basic-single w-20 select2-hidden-accessible" value="{{old('type')}}"
                            name="status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option selected value="active" data-select2-id="12">Todos los productos</option>
                            <option value="delivered" data-select2-id="13">Categorías</option>
                            <option value="delivered" data-select2-id="13">Modelo</option>
                            <option value="delivered" data-select2-id="13">Por elementos</option>


                        </select>
                    </div>

                    <div class="form-group form-inline-custom">
                        <span style="padding-right:10px;padding-bottom:5px" for="exampleInputPassword1">Fecha
                            </span>
                        <input type="month" class="form-control w-20" id="exampleInputPassword1" required name="date"
                            autocomplete="off" placeholder="" aria-autocomplete="list">
                        
                    </div>

                    <div class="form-group form-inline-custom">
                        <span style="padding-right:10px;padding-bottom:5px" for="exampleInputPassword1">Introduzca el código
                            </span>
                        <input type="text" class="form-control w-20" id="exampleInputPassword1" required name="date"
                            autocomplete="off" placeholder="" aria-autocomplete="list">
                        
                    </div>



                    
                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">BUSCAR</button>
                    </div>

                    

                </form>


                <div class="row">
                    
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>

                            <tr>
                            <td>Fecha</td>
                            <td>Motivo</td>
                            <td>Tipo de Documento (T/D)</td>
                            <td>Número de documento</td>
                            <td>Entidad</td>
                            <td>Ingreso</td>
                            <td>Salida</td>
                            <td>Saldo</td>
                            </tr>
                            
                        </thead>
                        <tbody>
                        <tr>
                        <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
</div>

<div class=container>
<form action="/samim" method="post">
<input type="hidden" name="mapLat">
<input type="hidden" name="mapLong">
<input type="text" name="location">
<div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">GRABAR</button>
                    </div>
</form>

</div>
@endsection

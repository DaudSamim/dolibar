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
    <div class="col-md-8">
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
                <h6 class="card-title">Materiales / Herramientas / Insumos / Fabricaciones</h6>
                <form class="forms-sample" action="/create_materialas" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del Material / Insumo / Herramienta</label>
                        <input type="text" value="{{old('name')}}" class="form-control"
                            id="exampleInputUsername1" name="name" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Categoría del Material / Insumo / Herramienta</label>
                        <input type="text" value="{{old('category')}}" class="form-control"
                            id="exampleInputUsername1" name="category" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Modelo del Material / Insumo / Herramienta</label>
                        <input type="text" value="{{old('model')}}" class="form-control"
                            id="exampleInputUsername1" name="model" autocomplete="off" placeholder="">
                    </div>
                    <ul>
                        <li>Dimensiones
                            <ul>
                                <li>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputPassword1">Altura</label>
                                        <input type="number" value="{{old('height')}}" class="form-control"
                                            id="exampleInputPassword1" name="height" autocomplete="off" placeholder="cm"
                                            aria-autocomplete="list">
                                    </div>
                                </li>

                                <li>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputPassword1">Larga</label>
                                        <input type="number" value="{{old('length')}}" class="form-control"
                                            id="exampleInputPassword1" name="length" autocomplete="off" placeholder="cm"
                                            aria-autocomplete="list">
                                    </div>
                                </li>

                                <li>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputPassword1">Ancho</label>
                                        <input type="number" value="{{old('width')}}" class="form-control"
                                            id="exampleInputPassword1" name="width" maxlength="19" autocomplete="off"
                                            placeholder="cm" aria-autocomplete="list">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputPassword1">Profundidad</label>
                                        <input type="number" value="{{old('depth')}}" class="form-control"
                                            id="exampleInputPassword1" name="depth" autocomplete="off" placeholder="cm"
                                            aria-autocomplete="list">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputPassword1">Diámetro</label>
                                        <input type="number" value="{{old('diameter')}}" class="form-control"
                                            id="exampleInputPassword1" name="diameter" autocomplete="off"
                                            placeholder="cm" aria-autocomplete="list">
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>





                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Descripción</label>
                        <input type="text" value="{{old('description')}}" class="form-control"
                            id="exampleInputPassword1" name="description" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    
                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">GRABAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

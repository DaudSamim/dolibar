@extends('layout.app')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"
    integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <h6 class="card-title">Ingresar Proveedor / Cliente / Interesado</h6>
                <form class="forms-sample" action="/create_client" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre</label>
                        <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputUsername1"
                            name="name" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Dirección</label>
                        <input type="text" value="{{old('address')}}" class="form-control" id="exampleInputUsername1"
                            name="address" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">RUC/DNI</label>
                        <input type="text" value="{{old('ruc')}}" class="form-control" id="exampleInputUsername1"
                            name="ruc" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Giro de negocio</label>
                        <select id="category" name="category">
                            <option value="">Seleccione</option>
                            <option value="Talleres metálicos">Talleres metálicos</option>
                            <option value=" Domicilios"> Domicilios</option>
                            <option value="Empresas">Empresas</option>
                            <option value=" Ing/Arq"> Ing/Arq</option>
                            <option value="Constructora">Constructora</option>
                            <option value="Mobiliario">Mobiliario</option>
                            <option value="Melamine">Melamine</option>
                            <option value="Agroindustria">Agroindustria</option>
                            <option value="Carrocerías">Carrocerías</option>
                            <option value="Electricistas">Electricistas</option>
                            <option value="Concreteras">Concreteras</option>
                            <option value="Ferretería - Madera">Gobierno</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre persona de contacto 1</label>
                        <input type="text" value="{{old('name_contact[]')}}" class="form-control"
                            id="exampleInputPassword1" name="name_contact[]" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Celular</label>
                        <input type="number" value="{{old('mobile_contact[]')}}" class="form-control"
                            id="exampleInputPassword1" name="mobile_contact[]" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Dirección</label>
                        <input type="text" value="{{old('address_contact[]')}}" class="form-control"
                            id="exampleInputPassword1" name="address_contact[]" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <hr>
                    <div class="addings">
                        <div class="div-btns text-center">
                            <button type="button" class="btn btn addmore"> Agregar persona de contacto</button>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Edad</label>
                        <input type="number" value="{{old('age')}}" class="form-control" id="exampleInputUsername1"
                            name="age" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Sexo</label>
                        <input type="text" value="{{old('sex')}}" class="form-control" id="exampleInputUsername1"
                            name="sex" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Ubicación</label>
                        <input type="text" value="{{old('location')}}" class="form-control" id="exampleInputUsername1"
                            name="location" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Producto de interés</label>
                        <input type="text" value="{{old('interest')}}" class="form-control" id="exampleInputUsername1"
                            name="interest" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Profesión</label>
                        <input type="text" value="{{old('profession')}}" class="form-control" id="exampleInputUsername1"
                            name="profession" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Otras variables de compra</label>
                        <input type="text" value="{{old('others')}}" class="form-control" id="exampleInputUsername1"
                            name="others" autocomplete="off" placeholder="">
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

<script>
    c = 1;
    $(document).ready(function(){
  $('.addmore').on('click', function(){
     
  c = c + 1;
    $(this).closest('.addings').before(`
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre persona de contacto ` + c +`</label>
                        <input type="text" value="{{old('name_contact[]')}}" class="form-control"
                            id="exampleInputPassword1" name="name_contact[]" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Celular</label>
                        <input type="text" value="{{old('mobile_contact[]')}}" class="form-control"
                            id="exampleInputPassword1" name="mobile_contact[]" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Dirección</label>
                        <input type="text" value="{{old('address_contact[]')}}" class="form-control"
                            id="exampleInputPassword1" name="address_contact[]" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div> 
                    <hr>`);
               
  });
 });
</script>
@endsection

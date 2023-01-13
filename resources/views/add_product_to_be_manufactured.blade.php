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
                <h6 class="card-title">Agregar Producto a realizar</h6>
                <form class="forms-sample" action="/product-to-be-manufactured" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del producto a realizar</label>
                        <input type="text" value="{{old('name')}}" required class="form-control" id="exampleInputUsername1"
                            name="name" autocomplete="off" placeholder="">
                    </div>

                    <div class="form-group form-inline-custom">
                    <label for="exampleInputUsername1">Matriz / Modalidad maquinaria</label>
                        <select id="category" name="category" required>
                            <option value="">Select</option>
                            <option value="Original">Original</option>
                            <option value="Cuello de cisne">Cuello de cisne</option>
                            <option value="Punzón fino">Punzón fino</option>
                            <option value="chancadora">chancadora</option>

                        </select>
                        {{--  <button type="submit" class="btn btn-sm btn-danger">Agregar</button>  --}}

                    </div>
                    <ul>
                        <li>Corte con cizalla
                            <ul>
                                <li>
                                    <input class="form-check-input shear_cuting_quantity" name="shear_cuting" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Cantidad operarios
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="shear_cuting_quantity" name="shear_cuting_quantity" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input shear_cuting_weather_value" name="shear_cuting_weather" type="checkbox" value="1" >
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Tiempo
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control"
                                    id="shear_cuting_weather_value" name="shear_cuting_weather_value" disabled="disabled" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input" name="shear_cuting_automation" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Automatización
                                    </label>
                                </li>
                               <hr>
                            </ul>
                        </li>

                        <li>Requiere Corte con moladora
                            <ul>
                                <li>
                                    <input class="form-check-input cutting_with_grinder_quantity" name="cutting_with_grinder" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Cantidad operarios
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control"  disabled="disabled"
                                    id="cutting_with_grinder_quantity" name="cutting_with_grinder_quantity" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input cutting_with_grinder_weather_quantity" name="cutting_with_grinder_weather" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Tiempo
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="cutting_with_grinder_weather_quantity" name="cutting_with_grinder_weather_quantity" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input" type="checkbox" name="cutting_with_grinder_automation" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Automatización
                                    </label>
                                </li>
                               <hr>
                            </ul>
                        </li>

                        <li>Requiere Marcado
                            <ul>
                                <li>
                                    <input class="form-check-input marketing_quantity" type="checkbox" name="marketing" value="1" >
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Cantidad operarios
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="marketing_quantity" name="marketing_quantity" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input marketing_weather_value" name="marketing_weather" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Tiempo
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="marketing_weather_value" name="marketing_weather_value" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input" name="marketing_automation" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Automatización
                                    </label>
                                </li>
                                <hr>

                            </ul>
                        </li>

                        <li>Requiere Doblez
                            <ul>
                                <li>
                                    <input class="form-check-input bend_quantity" type="checkbox" name="bend" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Cantidad operarios
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="bend_quantity" name="bend_quantity" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input bend_weather_value" name="bend_weather" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Tiempo
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="bend_weather_value" name="bend_weather_value" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input" name="bend_automation" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Automatización
                                    </label>
                                </li>
                                <hr>

                            </ul>

                        </li>

                        <li>Requiere presentación

                            <ul>
                                <li>
                                    <input class="form-check-input presentation_quantity" type="checkbox" name="presentation" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Cantidad operarios
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="presentation_quantity" name="presentation_quantity" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input presentation_weather_value" name="presentation_weather" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Tiempo
                                    </label>
                                    <input type="number" value="{{old('operators')}}" class="form-control" disabled="disabled"
                                    id="presentation_weather_value" name="presentation_weather_value" autocomplete="off" aria-autocomplete="list">
                                </li>

                                <li>
                                <input class="form-check-input" name="presentation_automation" type="checkbox" value="1">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Automatización
                                    </label>
                                </li>
                                <hr>

                            </ul>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Precio unitario</label>
                        <input type="number" value="{{old('unit_price')}}" class="form-control" required
                            id="exampleInputPassword1" name="unit_price" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Precio por volumen</label>
                        <input type="number" value="{{old('price_per_volume')}}" class="form-control" required
                            id="exampleInputPassword1" name="price_per_volume" autocomplete="off" placeholder=""
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
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <br>
                    <h4 class="text-center">Listado de productos</h4>
                    <table class="table" id="table1">
                        <br>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Matriz / Modalidad maquinaria</th>
                                <th>Precio unitario</th>
                                <th>Precio por volumen</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($search as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{$data->category}}</td>
                                <td>{{$data->unit_price}}</td>
                                <td>{{$data->price_per_volume}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".shear_cuting_quantity").click(function() {
        $("#shear_cuting_quantity").attr("disabled", !this.checked);
    });
    $(".shear_cuting_weather_value").click(function() {
        $("#shear_cuting_weather_value").attr("disabled", !this.checked);
    });
    $(".cutting_with_grinder_quantity").click(function() {
        $("#cutting_with_grinder_quantity").attr("disabled", !this.checked);
    });
    $(".cutting_with_grinder_weather_quantity").click(function() {
        $("#cutting_with_grinder_weather_quantity").attr("disabled", !this.checked);
    });
    $(".marketing_quantity").click(function() {
        $("#marketing_quantity").attr("disabled", !this.checked);
    });
    $(".marketing_weather_value").click(function() {
        $("#marketing_weather_value").attr("disabled", !this.checked);
    });
    $(".bend_quantity").click(function() {
        $("#bend_quantity").attr("disabled", !this.checked);
    });
    $(".bend_weather_value").click(function() {
        $("#bend_weather_value").attr("disabled", !this.checked);
    });
    $(".presentation_quantity").click(function() {
        $("#presentation_quantity").attr("disabled", !this.checked);
    });
    $(".presentation_weather_value").click(function() {
        $("#presentation_weather_value").attr("disabled", !this.checked);
    });




</script>
@endsection

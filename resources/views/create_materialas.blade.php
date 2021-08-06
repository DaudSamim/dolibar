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
                <h6 class="card-title">Materiales / Herramientas / Insumos / Fabricaciones</h6>
                <form class="forms-sample" action="/create_materialas" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del Material / Insumo / Herramienta</label>
                        <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputUsername1"
                            name="name" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Categoría del Material / Insumo / Herramienta</label>
                        <select id="category" name="category">
                            <option value="">Select Category</option>
                            <option value="Servicios Metalmecánic">Servicios Metalmecánic</option>
                            <option value="Tubos, Perfiles y vigas">Tubos, Perfiles y vigas</option>
                            <option value="Planchas">Planchas</option>
                            <option value="Retazos">Retazos</option>
                            <option value="Coberturas">Coberturas</option>
                            <option value="Fabricaciones">Fabricaciones</option>
                            <option value="Prefabricados">Prefabricados</option>
                            <option value="Pernos y tornillos">Pernos y tornillos</option>
                            <option value="Ferretería - Inoxidable">Ferretería - Inoxidable
                            </option>
                            <option value="Ferretería - Soldador">Ferretería - Soldador
                            </option>
                            <option value="Ferretería - Uso común">Ferretería - Uso común
                            </option>
                            <option value="Ferretería - Madera">Ferretería - Madera
                            </option>
                            <option value="Ferretería - Drywall">Ferretería - Drywall
                            </option>
                            <option value="Ferretería - Albañilería">Ferretería - Albañilería
                            </option>
                            <option value="Ferretería - Electricistas">Ferretería - Electricistas
                            </option>





                        </select>
                    </div>

                    <div class="form-group form-inline-custom">


                        <label for="exampleInputUsername1"> Modelo del Material / Insumo / Herramienta</label>
                        <select id="model" name="model">

                        </select>
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Número de serie de herramientas</label>
                        <input type="number" value="{{old('serial_no')}}" class="form-control"
                            id="exampleInputPassword1" name="serial_no" autocomplete="off" aria-autocomplete="list">
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

<script>
    $(document).ready(function () {

        $("#category").change(function (e) {
            // var c = document.getElementById("category");
            // var option = c.options[no.selectedIndex].text;


            document.getElementById("model").innerHTML = '';

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }


            });

            $.ajax({
                url: "get_models_ajax",
                type: "POST",
                data: {
                    date: $('#category').val(),

                },

                success: function (data) {
                    if (data) {
                        document.getElementById("model").innerHTML = data;
                    } else {
                        document.getElementById("model").innerHTML =
                            "<option>No MODEL to this Category</option>";
                    }

                },
                error: function () {
                    document.getElementById("model").innerHTML =
                        "<option>No Such Category Available</option>";
                }
            });

        });



    });

</script>
@endsection

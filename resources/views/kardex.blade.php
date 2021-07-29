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
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"
    integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
                                <form class="forms-sample" action="/searchingsale" method="post"
                                    enctype='multipart/form-data'>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputUsername1">Start Fecha</label>
                                        <input type="date" value="{{old('date')}}" class="form-control w-50"
                                            id="exampleInputPassword1" name="startdate" autocomplete="off"
                                            placeholder="" aria-autocomplete="list">
                                    </div>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputUsername1">End Fecha</label>
                                        <input type="date" value="{{old('date')}}" class="form-control w-50"
                                            id="exampleInputPassword1" name="enddate" autocomplete="off" placeholder=""
                                            aria-autocomplete="list">
                                    </div>
                                    <div class="form-group form-inline-custom">

                                        <label for="exampleInputUsername1">Categoría del Material / Insumo /
                                            Herramienta</label>
                                        <select id="cat" name="category" class="w-50">
                                            <option value="N/A">Select Category</option>
                                            <option value="Servicios Metalmecánic">Servicios Metalmecánic
                                            </option>
                                            <option value="Tubos, Perfiles y vigas">Tubos, Perfiles y vigas
                                            </option>
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
                                            <option value="Ferretería - Electricistas">Ferretería -
                                                Electricistas
                                            </option>





                                        </select>
                                    </div>

                                    <div class="form-group form-inline-custom">


                                        <label for="exampleInputUsername1"> Modelo del Material / Insumo /
                                            Herramienta</label>
                                        <select id="mod" name="model" class="w-50">

                                        </select>
                                    </div>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputUsername1">Nombre del Material / Insumo /
                                            Herramienta</label>
                                        <select id="nam" name="name" class="w-50">

                                        </select>
                                    </div>
                                    <input type="hidden" name="_token" value={{csrf_token()}}>

                                    <button type="submit" class="search btn-danger" id="search">Search</button>
                            </div>
                            </form>
                            <div class="col-4">
                                <h4 for="exampleInputPassword1">Search By Code</h4>
                                <form class="forms-sample" action="/searchingsalecode" method="post"
                                    enctype='multipart/form-data'>
                                    <br>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputUsername1">Start Fecha</label>
                                        <input type="date" value="{{old('date')}}" class="form-control w-100"
                                            id="exampleInputPassword1" name="startdate" autocomplete="off"
                                            placeholder="" aria-autocomplete="list">
                                    </div>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputUsername1">End Fecha</label>
                                        <input type="date" value="{{old('date')}}" class="form-control w-100"
                                            id="exampleInputPassword1" name="enddate" autocomplete="off" placeholder=""
                                            aria-autocomplete="list">
                                    </div>
                                    <div class="form-group form-inline-custom">
                                        <label for="exampleInputPassword1">Enter Code of producto</label>
                                        <input type="number" class="form-control" value="{{old('code')}}" id="code"
                                            name="code" autocomplete="off" placeholder="" aria-autocomplete="list">
                                    </div>
                                    <input type="hidden" name="_token" value={{csrf_token()}}>
                                    <button type="submit" class="search btn-danger" id="searchcode">Search</button>
                                </form>
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
                                @if(isset($quantity))
                                @php
                                $i = 0
                                @endphp
                                @foreach($materials as $material)
                                <tr>
                                    <td>
                                        {{$created_date[$i]}}
                                    </td>
                                    <td>
                                        N/A
                                    </td>
                                    <td>
                                        N/A
                                    </td>
                                    <td>
                                        {{$id[$i]}}
                                    </td>
                                    <td>
                                        N/A
                                    </td>
                                    <td>
                                        {{$income[$i]}}
                                    </td>
                                    <td>
                                        {{$exit[$i]}}
                                    </td>
                                    <td>
                                        {{$income[$i] - $exit[$i]}}
                                    </td>
                                </tr>
                                @php
                                $i = $i + 1;
                                @endphp
                                @endforeach
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




<script>
    $(document).ready(function () {

        $("#cat").change(function (e) {
            // var c = document.getElementById("category");
            // var option = c.options[no.selectedIndex].text;


            document.getElementById("mod").innerHTML = '';

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
                    date: $('#cat').val(),

                },

                success: function (data) {
                    if (data) {
                        document.getElementById("mod").innerHTML = data;
                    } else {
                        document.getElementById("mod").innerHTML =
                            "<option>No MODEL to this Category</option>";
                    }

                },
                error: function () {
                    document.getElementById("mod").innerHTML =
                        "<option>No Projects Available</option>";
                }
            });

        });



    });

</script>

<script>
    $(document).ready(function () {

        $("#mod").change(function (e) {
            // var c = document.getElementById("category");
            // var option = c.options[no.selectedIndex].text;


            document.getElementById("nam").innerHTML = '';

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }


            });

            $.ajax({
                url: "get_name_ajax",
                type: "POST",
                data: {
                    model: $('#mod').val(),
                    category: $('#cat').val(),


                },

                success: function (data) {
                    if (data) {
                        document.getElementById("nam").innerHTML = data;
                    } else {
                        document.getElementById("nam").innerHTML =
                            "<option>No Material to this Category</option>";
                    }

                },
                error: function () {
                    document.getElementById("nam").innerHTML =
                        "<option>No Material Available</option>";
                }
            });

        });



    });

</script>
@endsection

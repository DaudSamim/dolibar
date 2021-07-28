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

    </div>
</div>
<div class="row">
    <div class="col-8">
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
        <button class="search btn-primary" id="search">Buscar</button>
    </div>
    <div class="col-4">
        <h4 for="exampleInputPassword1">Buscar por codigo</h4>
        <br>
        <div class="form-group form-inline-custom">
            <label for="exampleInputPassword1">Enter Code of producto</label>
            <input type="number" class="form-control" value="{{old('code')}}" id="code" name="code" autocomplete="off"
                placeholder="" aria-autocomplete="list">
        </div>
        <button class="search btn-primary" id="searchcode">Buscar</button>

    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="div-flex">
                    <h5> Materiales Stock </h5>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nombre</th>
                                <th>Category</th>
                                <th>Modal</th>
                                <th>Per Unit Price</th>
                                <th>Quantity</th>
                                <th>Importe Bruto</th>





                            </tr>
                        </thead>
                        <tbody id="searchedata">

                        </tbody>

                    </table>

                </div>

                </form>
            </div>

        </div>

    </div>
</div>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
Agregar Item
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Materiales / Herramientas / Insumos / Fabricaciones Stock</h6>
                        <form class="forms-sample" action="/update_materialas" method="post"
                            enctype='multipart/form-data'>

                            <div class="form-group form-inline-custom">
                                <label for="exampleInputUsername1">Categoría del Material / Insumo / Herramienta</label>
                                <select id="category" name="category" class="w-50">
                                    <option value="">Select Category</option>
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


                                <label for="exampleInputUsername1"> Modelo del Material / Insumo / Herramienta</label>
                                <select id="model" name="model">

                                </select>
                            </div>
                            <div class="form-group form-inline-custom">
                                <label for="exampleInputUsername1">Nombre del Material / Insumo / Herramienta</label>
                                <select id="name" name="name">

                                </select>
                            </div>

                            <div class="form-group form-inline-custom">
                                <label for="exampleInputPassword1">Numero de materiales</label>
                                <input type="number" value="{{old('number')}}" class="form-control" id="number"
                                    name="number" autocomplete="off" placeholder="" aria-autocomplete="list">
                            </div>

                            <div class="form-group form-inline-custom">
                                <label for="exampleInputPassword1">Precio por unidad</label>
                                <input type="number" value="{{old('price')}}" class="form-control" id="price"
                                    name="price" autocomplete="off" placeholder="" aria-autocomplete="list">
                            </div>

                            <div class="div-btns text-center">
                                <input type="hidden" name="_token" value={{csrf_token()}}>
                                <button type="submit" class="btn btn-grabar">GRABAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        "<option>No Projects Available</option>";
                }
            });

        });



    });

</script>

<script>
    $(document).ready(function () {

        $("#model").change(function (e) {
            // var c = document.getElementById("category");
            // var option = c.options[no.selectedIndex].text;


            document.getElementById("name").innerHTML = '';

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }


            });

            $.ajax({
                url: "get_names_ajax",
                type: "POST",
                data: {
                    model: $('#model').val(),
                    category: $('#category').val(),


                },

                success: function (data) {
                    if (data) {
                        document.getElementById("name").innerHTML = data;
                    } else {
                        document.getElementById("name").innerHTML =
                            "<option>No Material to this Category</option>";
                    }

                },
                error: function () {
                    document.getElementById("name").innerHTML =
                        "<option>No Material Available</option>";
                }
            });

        });



    });

</script>


<script>
    $(document).ready(function () {

        $("#search").click(function (e) {
            // var c = document.getElementById("category");
            // var option = c.options[no.selectedIndex].text;


            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }


            });

            $.ajax({
                url: "get_searchstocks_ajax",
                type: "POST",
                data: {
                    model: $('#mod').val(),
                    category: $('#cat').val(),
                    name: $('#nam').val(),



                },

                success: function (data) {
                    if (data) {
                        document.getElementById("searchedata").innerHTML = data;
                    } else {
                        document.getElementById("searchedata").innerHTML =
                            "<option>No Material to this Category</option>";
                    }

                },
                error: function () {
                    document.getElementById("searchedata").innerHTML =
                        "<option>No Material Available</option>";
                }
            });

        });



    });

</script>

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

<script>
    $(document).ready(function () {

        $("#searchcode").click(function (e) {
            // var c = document.getElementById("category");
            // var option = c.options[no.selectedIndex].text;


            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }


            });

            $.ajax({
                url: "get_searchcodestocks_ajax",
                type: "POST",
                data: {
                    code: $('#code').val(),




                },

                success: function (data) {
                    if (data) {
                        document.getElementById("searchedata").innerHTML = data;
                    } else {
                        document.getElementById("searchedata").innerHTML =
                            "<option>No Material to this Category</option>";
                    }

                },
                error: function () {
                    document.getElementById("searchedata").innerHTML =
                        "<option>No Material Available</option>";
                }
            });

        });



    });

</script>
@endsection

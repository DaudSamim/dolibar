@extends('layout.app')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"
    integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    table th {
        border-top: none !important;
        border-bottom: none !important;
        color: #727CD4 !important;
        font-size: 14.5px !important;
        text-align: center !important;
    }

    table td {
        border-top: none !important;
        text-align: center !important;
    }

    .div-flex {
        display: flex;
        justify-content: space-between;
        margin: 10px 10px !important
    }

    .div-flex span {
        font-size: 25px;
        color: #0A1160;
    }

    a {
        text-decoration: none !important;
    }

</style>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
@section('content')
@if(Session::has('info'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
@endif
@if ($errors->any())
@foreach ($errors->all() as $error)
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
@endforeach
@endif
<div class="row justify-centent-right">



    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Materiales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
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
                                            <button class="search btn-primary" id="search">Search</button>
                                        </div>
                                        <div class="col-4">
                                            <h4 for="exampleInputPassword1">Search By Code</h4>
                                            <br>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputPassword1">Enter Code of producto</label>
                                                <input type="number" class="form-control" value="{{old('code')}}"
                                                    id="code" name="code" autocomplete="off" placeholder=""
                                                    aria-autocomplete="list">
                                            </div>
                                            <button class="search btn-primary" id="searchcode">Search</button>

                                        </div>
                                    </div>


                                    <div class="div-flex">

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Quantity</th>
                                                    <th>Code</th>
                                                    <th>Nombre</th>
                                                    <th>Categoría</th>
                                                    <th>Modelo</th>
                                                    <th>Precio por unidad</th>

                                                </tr>
                                            </thead>
                                            <tbody id="searchedata">
                                                <!-- @foreach($materials as $material)
                                                @php
                                                $alph =
                                                "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                                                $quantity='';
                                                $lsymbol='';
                                                $type= '';

                                                for($i=0;$i < 7;$i++){ $quantity .=$alph[rand(0, 55)]; } for($i=0;$i <
                                                    7;$i++){ $lsymbol .=$alph[rand(0, 55)]; } for($i=0;$i < 7;$i++){
                                                    $type .=$alph[rand(0, 55)]; } @endphp <tr>
                                                    <td>
                                                        <span style="cursor: pointer;" id="{{$quantity}}">
                                                            <span
                                                                onclick="remove('{{$quantity}}','{{$lsymbol}}','{{$type}}')">
                                                                <i class=" bx bxs-minus-circle"></i>
                                                            </span>
                                                            1
                                                            <input type="hidden" id="{{$type}}" value=1>
                                                            <span id="{{$lsymbol}}"
                                                                onclick="add('{{$quantity}}','{{$lsymbol}}','{{$type}}')">
                                                                <i class=" bx bxs-plus-circle"></i>
                                                            </span>
                                                        </span>
                                                    </td>

                                                    <td style="cursor: pointer;"
                                                        onclick="myFunction('{{$material->id}}','{{$type}}')"
                                                        class="addcart">
                                                        {{$material->code}}
                                                    </td>
                                                    <td style="cursor: pointer;"
                                                        onclick="myFunction('{{$material->id}}','{{$type}}')"
                                                        class="addcart">
                                                        {{$material->name}}
                                                    </td>
                                                    <td style="cursor: pointer;"
                                                        onclick="myFunction('{{$material->id}}','{{$type}}')"
                                                        class="addcart">
                                                        {{$material->category}}
                                                    </td>
                                                    <td style="cursor: pointer;"
                                                        onclick="myFunction('{{$material->id}}','{{$type}}')"
                                                        class="addcart">
                                                        {{$material->model}}
                                                    </td>
                                                    <td style="cursor: pointer;"
                                                        onclick="myFunction('{{$material->id}}','{{$type}}')"
                                                        class="addcart">
                                                        {{$material->per_unit_price}}
                                                    </td>
                                                    <td style="cursor: pointer;"
                                                        onclick="myFunction('{{$material->id}}','{{$type}}')"
                                                        class="addcart">
                                                        <input type="hidden" id="{{$material->id}}"
                                                            value="{{$material->id}}">
                                                    </td>

                                                    </tr>

                                                    @endforeach -->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
    <div class="col-4">
        <div class="form-group form-inline-custom">
            <label for="exampleInputUsername1">Enter RUC/DNI</label>
            <input type="number" value="{{old('ruc')}}"  class="form-control w-100" id="dni" name="ruc"
                autocomplete="off" placeholder="">
        </div>
        <div class="form-group form-inline-custom">
            <label for="exampleInputUsername1"> Typos Perfroma </label>
            <select id="performa" name="type" class="w-100">
                <option value="">Select Performa</option>
                <option value="Sales">Sales</option>
                <option value="Work">Work</option>
                <option value="Construct">Construct</option>
            </select>
        </div>
        <div class="form-group form-inline-custom">
            <label for="exampleInputUsername1">Performa ID</label>
            <select id="cartid" name="cartid" class="w-100">

            </select>

        </div>
        <button class="search btn-danger mb-3" id="searchperforma">Search</button>


    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="div-flex">
                    <h5> Materiales Carro </h5>
                    <button type="button" class="btn btn-primary text-right" data-toggle="modal"
                        data-target="#exampleModal">
                        Search Product
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nombre</th>
                                <th>Precio por unidad</th>
                                <th>Quantity</th>
                                <th>Gross Amount</th>
                                <th></th>



                            </tr>
                        </thead>
                        <tbody id="model">
                            @foreach($carts as $cart)
                            @php
                            $name = DB::table('materials')->where('id',$cart->product_id)->first();
                            @endphp
                            <tr>
                                <td>
                                    {{$name->code}}
                                </td>
                                <td>
                                    {{$name->name}}
                                </td>
                                <td>
                                    {{$cart->per_unit_price}}
                                </td>
                                <td>{{$cart->quantity}}</td>
                                <td>{{$cart->gross_total}}</td>
                                <td>
                                    <a class="removecart" href="{{'remove_cart/'.$cart->id}}"><i
                                            class=" bx bxs-minus-circle"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="font-weight-bold">Total Amount = ${{$amount}}</td>
                            </tr>


                        </tbody>
                    </table>

                </div>
                <div class="div-btns text-center">
                    <input type="hidden" name="_token" value={{csrf_token()}}>
                    <button type="submit" class="btn btn-primary"> Generate Invoice</button>
                    <button type="button" class="btn btn-danger text-right" data-toggle="modal" data-target="#example">
                        Save Performa
                    </button>


                </div>

                </form>
            </div>

        </div>

    </div>

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Save Performa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="/save_performa" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre Client</label>
                        <input type="text" value="{{old('name')}}" required class="form-control w-50"
                            id="exampleInputUsername1" name="name" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">RUC/DNI</label>
                        <input type="ruc" value="{{old('ruc')}}" required class="form-control w-50"
                            id="exampleInputUsername1" name="ruc" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1"> Mobile Number</label>
                        <input type="number" value="{{old('number')}}" required class="form-control w-50"
                            id="exampleInputUsername1" name="number" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1"> Address</label>
                        <input type="address" value="{{old('address')}}" required class="form-control w-50"
                            id="exampleInputUsername1" name="address" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Typos Perfroma</label>
                        <select id="" name="type" class="w-50">
                            <option value="">Select Performa</option>
                            <option value="Sales">Sales</option>
                            <option value="Work">Work</option>
                            <option value="Construct">Construct</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" name="_token" value={{csrf_token()}}>
                <button type="submit" class="btn btn-primary">Save </button>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<script>
    function myFunction(id, type) {
        // var c = document.getElementById("category");
        // var option = c.options[no.selectedIndex].text;

        d = "#" + id;
        t = "#" + type;



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            }


        });

        $.ajax({
            url: "get_cart_ajax",
            type: "POST",
            data: {
                id: $(d).val(),
                quantity: $(t).val(),


            },

            success: function (data) {
                if (data) {
                    document.getElementById("model").innerHTML = data;
                } else {
                    document.getElementById("model").innerHTML =
                        "<option>Error</option>";
                }

            },
            error: function () {
                document.getElementById("model").innerHTML =
                    "<option>No Cart Available</option>";
            }
        });

    };

</script>

<script>
    function myremoveFunction(id) {
        // var c = document.getElementById("category");
        // var option = c.options[no.selectedIndex].text;

        d = "#" + id;



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            }


        });

        $.ajax({
            url: "get_cartremove_ajax",
            type: "POST",
            data: {
                id: $(d).val(),

            },

            success: function (data) {
                if (data) {
                    document.getElementById("model").innerHTML = data;
                } else {
                    document.getElementById("model").innerHTML =
                        "<option>uyg</option>";
                }

            },
            error: function () {
                document.getElementById("model").innerHTML =
                    "<option>No Cart Available</option>";
            }
        });

    };

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
                url: "get_search_ajax",
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
                url: "get_searchcode_ajax",
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

<script>
    function add(quantity, add, type) {
        q = '#' + quantity;
        a = '#' + add;
        t = '#' + type;
        
        limits = $("#limit").val();
        number = $(t).val();
        limit = parseInt(limits, 10);
        integer = parseInt(number, 10);

        if(limit > integer){
        added = integer + 1;
        document.getElementById(quantity).innerHTML = `<span onclick="remove('` + quantity + `','` + add + `','` +
            type + `')"> <i class=" bx bxs-minus-circle"></i> ` + added + `
                                                            </span>
                                        <input type="hidden" id="` + type + `" value ="` + added + `">
                                         <span id="` + add + `"onclick="add('` + quantity + `','` + add + `','` +
            type + `')">
                                          <i class=" bx bxs-plus-circle"></i>
                                        </span>`;
        }
    }

</script>

<script>
    function remove(quantity, add, type) {
        q = '#' + quantity;
        a = '#' + add;
        t = '#' + type;
        number = $(t).val();
        integer = parseInt(number, 10);
        added = integer - 1;
        if (added < 1) {
            added = 1;
        }
        document.getElementById(quantity).innerHTML = `<span onclick="remove('` + quantity + `','` + add + `','` +
            type + `')"> <i class=" bx bxs-minus-circle"></i> ` + added + `
                                                            </span>
                                        <input type="hidden" id="` + type + `" value ="` + added + `">
                                         <span id="` + add + `"onclick="add('` + quantity + `','` + add + `','` +
            type + `')">
                                          <i class=" bx bxs-plus-circle"></i>
                                        </span>`;
    }

</script>


@endsection

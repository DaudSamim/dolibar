@extends('layout.app')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/your-embed-code.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css"
    integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css"
    integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


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
                <span class="card-title">Crear proyecto</span><button style="float:right!important" type="button" class=" ml-3 mb-3 btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Materialas
</button>
<button type="button" style="float:right!important" class="ml-3 mb-3 btn btn-danger" data-toggle="modal" data-target="#exampleModal2">
  Agregar cliente
</button>
<br>
<br>
<br>
                <form class="forms-sample" action="/create_project" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del proyecto</label>
                        <input type="text" required value="{{old('project')}}" class="form-control" id="exampleInputUsername1"
                            name="project" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputEmail1">Ubicación</label>
                        <input type="text"required value="{{old('location')}}" class="form-control" id="exampleInputEmail1"
                            name="location" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputEmail1">Unidad de cantidad / m2</label>
                        <input type="number"required value="{{old('unidad')}}" class="form-control" id="exampleInputEmail1"
                            name="unidad" placeholder="">
                    </div>
                    
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Client</label>

                        <select class="js-example-basic-single w-90 select2-hidden-accessible"required id="ubicación"
                            value="{{old('customer')}}" name="customer" data-width="100%" data-select2-id="1"
                            tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="3">Seleccione
                            </option>
                            @foreach($clients as $client)
                            <option value="{{$client->id}}" data-select2-id="3">{{$client->name}}
                            </option>
                            @endforeach


                        </select>
                    </div>
                    
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Ingeniero Encargado</label>
                        <select class="js-example-basic-single w-90 select2-hidden-accessible"required id="ubicación"
                            value="{{old('engineer_incharge')}}" name="engineer_incharge" data-width="100%"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="3">Seleccione
                            </option>
                            @foreach($workers as $worker)
                            <option value="{{$worker->id}}" data-select2-id="3">{{$worker->name}}
                            </option>
                            @endforeach


                        </select>
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Producto a fabricar</label>
                        <select class="js-example-basic-single w-90 select2-hidden-accessible"required id="ubicación"
                            value="{{old('product_to_be_manufactured')}}" name="product_to_be_manufactured"
                            data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="" data-select2-id="3">Seleccione
                            </option>
                            @foreach($product as $row)
                            <option value="{{$row->id}}" data-select2-id="3">{{$row->name}}
                            </option>
                            @endforeach


                        </select>
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Precio de venta</label>
                        <input type="number" value="{{old('amount')}}" class="form-control"required id="exampleInputPassword1"
                            name="amount" autocomplete="off" placeholder="" aria-autocomplete="list">
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Fecha de inicio</label>
                        <input type="date" value="{{old('start_date')}}" class="form-control"required id="exampleInputPassword1"
                            name="start_date" autocomplete="off" placeholder="" aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Fecha de entrega </label>
                        <input type="date" class="form-control" value="{{old('delivery_date')}}"required
                            id="exampleInputPassword1" name="delivery_date" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputEmail1">Project File</label>
                        <input class="form-control" type="file" name="video">
                        @if ($errors->has('video'))
                        <span class="text-danger">
                            <small class="font-weight-bold">{{ $errors->first('video') }}</small>
                        </span>
                        @endif
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div>
                        <div class="col-lg-10">
                            <ul>
                                <h4>Tarea 1</h4>

                            </ul>
                        </div>
                        <div class="col-2"></div>
                        <div class="row ">
                            <div class="col-2"><br></div>
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="">
                                            <div class="form-group form-inline-custom">
                                            <input type="hidden" id="" name="total_task[]" value="1"
                                                    class="js-example-basic-single w-90"></input>
                                                <label for="exampleInputUsername1">Nombre </label>

                                                <input value="{{old('name_task[]')}}" id="nombre" name="name_task[]"required
                                                    class="js-example-basic-single w-90"></input>

                                                <input value="{{old('count_op[]')}}" id="myop" name="count_op[]"required
                                                    type="hidden" value="1"
                                                    class="js-example-basic-single w-90"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad objetivo</label>
                                                <input value="{{old('target_quantity[]')}}" type="number"required
                                                    name="target_quantity[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="cantidad" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">


                                                <label for="exampleInputUsername1"> Ubicación</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    id="ubicación" value="{{old('task_location[]')}}"
                                                    name="task_location[]" data-width="100%" data-select2-id="1"
                                                    tabindex="-1" aria-hidden="true">

                                                    <option value="" data-select2-id="3">Lista desplegable:
                                                    </option>
                                                    <option value="Obra" data-select2-id="3">Obra
                                                    </option>
                                                    <option value="Taller" data-select2-id="3">Taller
                                                    </option>
                                                    <option value="Tercerizado" data-select2-id="3">Tercerizado
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Indicaciones para los operarios
                                                    (Subir
                                                    archivo)
                                                </label>
                                                <textarea value="{{old('task_directions_operator[]')}}"required
                                                    id="indicaciones" name="task_directions_operator[]"
                                                    class="js-example-basic-single w-90"></textarea>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputEmail1"></label>
                                                <input class="form-control" id="filer" type="file" name="document[]">
                                                @if ($errors->has('file'))
                                                <span class="text-danger">
                                                    <small class="font-weight-bold">{{ $errors->first('file') }}</small>
                                                </span>
                                                @endif
                                            </div>

                                        </div>




                                        <!-- <div class="div-btns text-center">
                              <button type="button" id="addmore" class="btn btn">Add More</button>
                           </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <hr>

                        <br>
                        <div class="row ">
                            <div class="col-2"><br></div>
                            <div class="col-10">

                                <li>Operarios</li>
                                <br>


                                <div class="card">
                                    <div class="card-body">
                                        <div class="addings">

                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1"> Tipo de operario</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    value="{{old('type_operator[]')}}" id="type" name="type_operator[]"
                                                    data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">

                                                    <option value="" data-select2-id="3">Lista desplegable:
                                                    </option>
                                                    <option value="Técnico" data-select2-id="3">Técnico
                                                    </option>
                                                    <option value="Maestro" data-select2-id="3">Maestro

                                                    </option>
                                                    <option value="Ayudante" data-select2-id="3">Ayudante</option>
                                                    <option value="Por destajo" data-select2-id="3">Por destajo</option>
                                                    <option value="Vendedor" data-select2-id="3">Vendedor</option>
                                                    <option value="Tercerizado" data-select2-id="3">Tercerizado</option>
                                                    <option value="Ingeniero" data-select2-id="3">Ingeniero</option>


                                                </select>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad de operarios</label>
                                                <input value="{{old('operator_number[]')}}" type="number"required
                                                    name="operator_number[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="nooperators" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <input type="number" value="{{old('total_hours[]')}}"required
                                                    name="total_hours[]" class="js-example-basic-single w-90">
                                            </div>

                                        </div>
                                        <div class="addings">
                                            <div class="div-btns text-center">
                                                <button type="button" class="btn btn addmore">Agregar otro tipo de
                                                    operario</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row ">
                            <div class="col-2"><br></div>
                            <div class="col-10">

                                <li>Material</li>
                                <br>


                                <div class="card">
                                    <div class="card-body">
                                        <div id="addings1">

                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Nombre del material</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    id="ubicación" value="{{old('material_name[]')}}" name="material_name[]"
                                                    data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" data-select2-id="3">Seleccione
                                                    </option>
                                                    @foreach($materials as $material)
                                                    <option value="{{$material->id}}" data-select2-id="3">
                                                        {{$material->name}}
                                                    </option>
                                                    @endforeach


                                                </select>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad</label>
                                                <input value="{{old('material_quantity[]')}}" name="material_quantity[]" type="number"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1"
                                                    tabindex="-1"></input>
                                            </div>

                                        </div>
                                        <div class="addings1">
                                            <div class="div-btns text-center">
                                                <button type="button" class="btn btn addmore1">Agregar otro tipo de
                                                    materiales</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row ">
                            <div class="col-2"><br></div>
                            <div class="col-10">


                                <li>Herramientas</li>
                                <br>


                                <div class="card">
                                    <div class="card-body">
                                        <div id="addings2">

                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Nombre de la herramienta</label>
                                                <input value="{{old('tool_name[]')}}" name="tool_name[]"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="name_tool" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad</label>
                                                <input value="{{old('tool_quantity[]')}}" name="tool_quantity[]"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>

                                        </div>
                                        <div class="div-btns text-center">
                                            <button type="button" id="addmore2" class="btn btn addmore2">Agregar otro tipo de
                                                herramienta</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div>
                            <h4 id="yeen" class=" text-center" style="margin-bottom:10px"></h4>
                        </div>
                        <!-- <div id="addings3">
                            <div class="div-btns text-center">
                                <button id="save_task" class="btn btn-grabar">GRABAR TAREA</button>
                            </div>
                        </div> -->

                        <div class="addtasks">
                            <br>
                            <div class="div-btns text-center">
                                <button type="button" id="addmore3" class="btn btn tasks">Add More Task</button>
                            </div>
                        </div>
                    </div>
                    <div class="div-btns text-center"id="array">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" id="save_project" class="btn btn-grabar">GRABAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                    <div class="addling">
                        <div class="div-btns text-center">
                            <button type="button" class="btn btn addless"> Agregar persona de contacto</button>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    fon = 1;
    $(document).ready(function(){
  $('.addless').on('click', function(){
     
  fon = fon + 1;
    $(this).closest('.addling').before(`
                    <div class="minus">
                    <button style="float:right!important" type="button" onclick="removecontact('` + fon + `')"id="` + fon + `" class="btn btn addmore"><h5 style="color:red;">X</h5></button>
                    <br>
                    <br>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre persona de contacto </label>
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
                    <hr>
                    </div>`);
               
  });
 });
</script>
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
<script>
    var tool = 1;
    $("#save_project").click(function () {
        array[counter] = [[operator,material,tool]] ;


        $("#array").append(`<input value="` + array[counter] + `" name="limits[][]" type="hidden"
                                                    class="js-example-basic-single w-90"></input>
                              `);
        
    });

</script>

<script>
    var tool = 1;
    var q = 7000;
    
    $("#addmore2").click(function () {


        $("#addings2").append(`<div class="aaa"> <hr>
        <div style="float:right!important">
            <button type="button" onclick="removetooling('` + q + `')"id="` + q + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br>
        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre de la herramienta</label>
                                            <input value="{{old('tool_name[]')}}" name="tool_name[]"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('tool_quantity[]')}}" name="tool_quantity[]" type="number"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div> 
                                            </div>
                              `);
        q = q + 1;
        tool = tool + 1;
    });

</script>

<script>
    var operator = 1;
    var b = 0;
    var p = 5000;
    $(document).ready(function () {
        $('.addmore').on('click', function () {


            if (b == 0) {
                $(this).closest('.addings').before(`<div class="aaa"><hr>
            <div style="float:right!important">
            <button type="button" onclick="removeop('` + p + `')"id="` + p + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br>
            
            <div class="form-group form-inline-custom">
            

                                                <label for="exampleInputUsername1"> Tipo de operario</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    value="{{old('type_operator[]')}}" name="type_operator[]" data-width="100%"
                                                    data-select2-id="1" tabindex="-1" aria-hidden="true">

                                                    <option value="" data-select2-id="3">Lista desplegable:
                                                    </option>
                                                    <option value="Soldador" data-select2-id="3">Soldador
                                                    </option>
                                                    <option value="Maestro soldador" data-select2-id="3">Maestro soldador
                                                    </option>
                                                    <option value="Ayudante" data-select2-id="3">Ayudante
                                                    </option>
                                                    <option value="Ingeniero" data-select2-id="3">Ingeniero
                                                    </option>


                                                </select>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad de operarios</label>
                                                <input value="{{old('operator_number[]')}}"type="number" name="operator_number[]"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <input value="{{old('total_hours[]')}}" name="total_hours[]"type="number"required
                                                    class="js-example-basic-single w-90">
                                            </div>
                                            </div>
                                        
                                    `);
                z = p;
                p = p + 1;
                b = b + 1;
                operator = operator + 1;
            } else if (b > 0) {
                w = "#" + z;

                $(this).closest('.addings').before(`<div class="aaa"><hr>
            <div style="float:right!important">
            <button type="button" onclick="removeop('` + p + `')"id="` + p + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br>
            
            <div class="form-group form-inline-custom">
            

                                                <label for="exampleInputUsername1"> Tipo de operario</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    value="{{old('type_operator[]')}}" name="type_operator[]" data-width="100%"
                                                    data-select2-id="1" tabindex="-1" aria-hidden="true">

                                                    <option value="" data-select2-id="3">Lista desplegable:
                                                    </option>
                                                    <option value="Soldador" data-select2-id="3">Soldador
                                                    </option>
                                                    <option value="Maestro soldador" data-select2-id="3">Maestro soldador
                                                    </option>
                                                    <option value="Ayudante" data-select2-id="3">Ayudante
                                                    </option>
                                                    <option value="Ingeniero" data-select2-id="3">Ingeniero
                                                    </option>


                                                </select>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad de operarios</label>
                                                <input value="{{old('operator_number[]')}}"type="number" name="operator_number[]"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <input value="{{old('total_hours[]')}}" name="total_hours[]"type="number"required
                                                    class="js-example-basic-single w-90">
                                            </div>
                                            </div>
                                        
                                    `);
                z = p;

                p = p + 1;
                operator = operator + 1;

            }
        });
    });

</script>

<script>
    var material = 1;
    var t = 6000;
    $(document).ready(function () {
        $('.addmore1').on('click', function () {

            $(this).closest('.addings1').before(`<div class="aaa"><hr><br>
            <div style="float:right!important">
            <button type="button" onclick="removematerial('` + t + `')"id="` + t + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br>
    <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre del material</label>
                                            <select class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="ubicación" value="{{old('material_name[]')}}" name="material_name[]"required
                                                    data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" data-select2-id="3">Seleccione
                                                    </option>
                                                    @foreach($materials as $material)
                                                    <option value="{{$material->id}}" data-select2-id="3">
                                                        {{$material->name}}
                                                    </option>
                                                    @endforeach


                                                </select>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('material_quantity[]')}}" name="material_quantity[]" type="number"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1"
                                                    tabindex="-1"></input>
                                            </div>
                                        
                                    `);
            t = t + 1
            material = material + 1;
        });
    });

</script>

<script>
    var counter = 0;
    let array = [];
    var c = 1;
    var k = 500;
    var j = 1000;
    var u = 1500;
    var m = 2000;
    var n = 2500;
    var x = 3000;
    $(document).ready(function () {
        $('.tasks').on('click', function () {
            let text;
  let person = prompt("", "You wont be able to add more operators, materials and tools in the previous tasks");
  if (person == null || person == "") {
    text = "User cancelled the prompt.";
  } else {
    $('.addmore2').remove();
        $('.addmore').remove();
        $('.addmore1').remove();
  
            c = c + 1;
             
             array[counter] = [[operator,material,tool]] ;
    console.log(array);
    counter = counter + 1;


            $(this).closest('.addtasks').before(`<div class="yoo">
    <hr><br>
    
    <div class="col-lg-10 ">
                        <ul>
                            <h4>Tarea ` + c + `</h4> <button  type="button" onclick="yeen('` + c + `')"id="` + c + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
                            
                  
                        </ul>
                    </div>
                    <div class="col-2"></div>

                    <div class="row ">
                        <div class="col-2"><br></div>
                        <div class="col-10">
                            <div class="card">
                                <div class="card-body">
                                    <div id="">
                                    <div class="form-group form-inline-custom">
                                    <input type="hidden" value="` + array[counter - 1] + `" name="limits[][]" 
                                                    class="js-example-basic-single w-90"></input>

                                                    <input type="hidden" id="" name="total_task[]" value="` + c + `"
                                                    class="js-example-basic-single w-90"></input>
                                                <label for="exampleInputUsername1">Nombre </label>
                                                <input value="{{old('name_task[]')}}" name="name_task[]"required
                                                    class="js-example-basic-single w-90"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad objetivo</label>
                                                <input value="{{old('target_quantity[]')}}"type="number" name="target_quantity[]"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">


                                                <label for="exampleInputUsername1"> Ubicación</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    value="{{old('task_location[]')}}" name="task_location[]" data-width="100%"
                                                    data-select2-id="1" tabindex="-1" aria-hidden="true">

                                                    <option value="" data-select2-id="3">Lista desplegable:
                                                    </option>
                                                    <option value="Obra" data-select2-id="3">Obra
                                                    </option>
                                                    <option value="Taller" data-select2-id="3">Taller
                                                    </option>
                                                    <option value="Tercerizado" data-select2-id="3">Tercerizado
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Indicaciones para los operarios
                                                    (Subir
                                                    archivo)
                                                </label>
                                                <textarea value="{{old('task_directions_operator[]')}}" name="task_directions_operator[]"required
                                                    class="js-example-basic-single w-90"></textarea>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputEmail1"></label>
                                                <input class="form-control"  type="file" name="document[]">
                                                @if ($errors->has('file'))
                                                <span class="text-danger">
                                                    <small
                                                        class="font-weight-bold">{{ $errors->first('file') }}</small>
                                                </span>
                                                @endif
                                            </div>
                                        
                                    </div>
                                    <!-- <div class="div-btns text-center">
                              <button type="button" id="addmore" class="btn btn">Add More</button>
                           </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <hr>

                    <br>
                    <div class="">
                    
                    <div class="row ">
                        <div class="col-2"><br>
                        </div>
                        <div class="col-10">

                            <li>Operarios </li> 
                            
                                        
                            <br>


                            <div class="card">
                                <div class="card-body">
                                    <div class="addings">

                                    <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1"> Tipo de operario</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    value="{{old('type_operator[]')}}" name="type_operator[]" data-width="100%"
                                                    data-select2-id="1" tabindex="-1" aria-hidden="true">

                                                    <option value="" data-select2-id="3">Lista desplegable:
                                                    </option>
                                                    <option value="Soldador" data-select2-id="3">Soldador
                                                    </option>
                                                    <option value="Maestro soldador" data-select2-id="3">Maestro soldador
                                                    </option>
                                                    <option value="Ayudante" data-select2-id="3">Ayudante
                                                    </option>
                                                    <option value="Ingeniero" data-select2-id="3">Ingeniero
                                                    </option>


                                                </select>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad de operarios</label>
                                                <input value="{{old('operator_number[]')}}" type="number" name="operator_number[]"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <input value="{{old('total_hours[]')}}" name="total_hours[]"type="number"required
                                                    class="js-example-basic-single w-90">
                                            </div>
                                        
                                    </div>
                                    <div class="addings5">
                                    <div class="div-btns text-center">
                                        <button type="button"onclick="myFunction('` + k + `')"id="` + k + `"  class="btn btn addmore">Agregar otro tipo de
                                            operario</button>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <br>
                    <br>

                    <div class="row ">
                        <div class="col-2"><br></div>
                        <div class="col-10">

                            <li>Material</li>
                            <br>


                            <div class="card">
                                <div class="card-body">
                                    <div id="addings1">

                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre del material</label>
                                            <select class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="ubicación" value="{{old('material_name[]')}}" name="material_name[]"required
                                                    data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" data-select2-id="3">Seleccione
                                                    </option>
                                                    @foreach($materials as $material)
                                                    <option value="{{$material->id}}" data-select2-id="3">
                                                        {{$material->name}}
                                                    </option>
                                                    @endforeach


                                                </select>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('material_quantity[]')}}" name="material_quantity[]"type="number"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>

                                    </div>
                                    <div class="addings">
                                    <div class="div-btns text-center">
                                        <button type="button" onclick="myFunction2('` + u + `')"id="` + u + `" class="btn btn addmore1">Agregar otro tipo de
                                            materiales</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row ">
                        <div class="col-2"><br></div>
                        <div class="col-10">


                            <li>Herramientas</li>
                            <br>


                            <div class="card">
                                <div class="card-body">
                                    <div id="addings2">

                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre de la herramienta</label>
                                            <input value="{{old('subtasks')}}" name="tool_name[]"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('tool_quantity[]')}}" name="tool_quantity[]" type="number"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>

                                    </div>
                                    <div class="addings">
                                    <div class="div-btns text-center">
                                        <button type="button" onclick="myFunction3('` + n + `')"id="` + n + `" class="btn btn addmore2">Agregar otro tipo de
                                            herramienta</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                                        
                                    `);
            k = k + 1;
            j = j + 1;
            u = u + 1;
            m = m + 1;
            n = n + 1;
            x = x + 1;
            material = material + 1;
            tool = tool + 1;
            operator = operator + 1;
  }
        });
    });

</script>

<script>
    function myFunction(p1) {
        // var closest = element.closest(p1);

        var y = "#" + p1;
        $(y).closest('.addings5').before(` 
        <div class="aaa"> <hr>
        <div style="float:right!important">
            <button type="button" onclick="removeop('` + j + `')"id="` + j + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br>
        <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1"> Tipo de operario</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    value="{{old('type_operator[]')}}" name="type_operator[]" data-width="100%"
                                                    data-select2-id="1" tabindex="-1" aria-hidden="true">

                                                    <option value="" data-select2-id="3">Lista desplegable:
                                                    </option>
                                                    <option value="Soldador" data-select2-id="3">Soldador
                                                    </option>
                                                    <option value="Maestro soldador" data-select2-id="3">Maestro soldador
                                                    </option>
                                                    <option value="Ayudante" data-select2-id="3">Ayudante
                                                    </option>
                                                    <option value="Ingeniero" data-select2-id="3">Ingeniero
                                                    </option>


                                                </select>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad de operarios</label>
                                                <input value="{{old('operator_number[]')}}" type="number" name="operator_number[]"required
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <input value="{{old('total_hours[]')}}" name="total_hours[]"type="number"required
                                                    class="js-example-basic-single w-90">
                                            </div>  
                                            </div>`);
        k = k + 1;
        j = j + 1;
        operator = operator + 1;




    }

</script>



<script>
    function myFunction2(p1) {
        // var closest = element.closest(p1);

        var y = "#" + p1;
        $(y).closest('.addings').before(`<div class="aaa"> <hr>
        <div style="float:right!important">
            <button type="button" onclick="removemat('` + m + `')"id="` + m + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br> <div class="form-group form-inline-custom">
            <label for="exampleInputUsername1">Nombre del material</label>
        <select class="js-example-basic-single w-90 select2-hidden-accessible"required
                                                    id="ubicación" value="{{old('material_name[]')}}" name="material_name[]"
                                                    data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true">
                                                    <option value="" data-select2-id="3">Seleccione
                                                    </option>
                                                    @foreach($materials as $material)
                                                    <option value="{{$material->id}}" data-select2-id="3">
                                                        {{$material->name}}
                                                    </option>
                                                    @endforeach


                                                </select>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('material_quantity[]')}}" name="material_quantity[]"type="number"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>
                                            </div>
                                        </div>
        `);
        m = m + 1;
        u = u + 1;
        material = material + 1;



    }

    function removemat(yes) {

        var o = "#" + yes;
        // var closest = element.closest(p1);
        $(o).closest('.aaa').remove();
        material = material - 1;
    }


    function myFunction3(p1) {
        // var closest = element.closest(p1);

        var y = "#" + p1;
        $(y).closest('.addings').before(`<div class="aaa"> <hr>
        <div style="float:right!important">
            <button type="button" onclick="removetool('` + x + `')"id="` + x + `" class="btn btn addmore"><h5 style="color:red">X</h5></button>
            </div>
            <br>
            <br><div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre de la herramienta</label>
                                            <input value="{{old('tool_name[]')}}" name="tool_name[]"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('tool_quantity[]')}}" name="tool_quantity[]"type="number"required
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>
                                            </div>
                                        </div>

        `);
        n = n + 1;
        x = x + 1;
        tool = tool + 1;



    }

    function removetool(yes) {

        var o = "#" + yes;
        // var closest = element.closest(p1);
        $(o).closest('.aaa').remove();
        tool = tool - 1;
    }

</script>






<script>
    function yeen(yes) {

        var r = "#" + yes;
        c = c - 1;
        // var closest = element.closest(p1);
        $(r).closest('.yoo').remove();
        material = material - 1;
        tool = tool - 1;
        operator = operator -1;
        counter = counter - 1;
    }

</script>

<script>
    function removeop(yes) {

        var o = "#" + yes;
        var g = "#" + (yes - 1);
        // var closest = element.closest(p1);
        $(o).closest('.aaa').remove();
        $(g).removeClass('d-none');
        operator = operator - 1;

    }
    function removematerial(yes) {

var o = "#" + yes;
var g = "#" + (yes - 1);
// var closest = element.closest(p1);
$(o).closest('.aaa').remove();
$(g).removeClass('d-none');
material = material - 1;

}
function removetooling(yes) {

var o = "#" + yes;
var g = "#" + (yes - 1);
// var closest = element.closest(p1);
$(o).closest('.aaa').remove();
$(g).removeClass('d-none');
tool = tool - 1;

}
function removecontact(yes) {
    var o = "#" + yes;
    $(o).closest('.minus').remove();
    fon = fon - 1;
}

</script>




@endsection

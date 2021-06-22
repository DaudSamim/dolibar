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
                <h6 class="card-title">Crear proyecto</h6>
                <form class="forms-sample" action="/create_project" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del proyecto</label>
                        <input type="text" value="{{old('project')}}" class="form-control" id="exampleInputUsername1"
                            name="project" autocomplete="off" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputEmail1">Ubicación</label>
                        <input type="text" value="{{old('location')}}" class="form-control" id="exampleInputEmail1"
                            name="location" placeholder="">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Cliente</label>
                        <input type="text" value="{{old('customer')}}" class="form-control" id="exampleInputPassword1"
                            name="customer" autocomplete="off" placeholder="" aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Persona de contacto</label>
                        <input type="number" value="{{old('contact_person')}}" class="form-control"
                            id="exampleInputPassword1" name="contact_person" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Ingeniero Encargado</label>
                        <input type="text" value="{{old('engineer_incharge')}}" class="form-control"
                            id="exampleInputPassword1" name="engineer_incharge" maxlength="19" autocomplete="off"
                            placeholder="" aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Producto a fabricar</label>
                        <input type="text" value="{{old('engineer_incharge')}}" class="form-control"
                            id="exampleInputPassword1" name="product_to_be_manufactured" maxlength="19" autocomplete="off"
                            placeholder="" aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Precio de venta</label>
                        <input type="number" value="{{old('amount')}}" class="form-control" id="exampleInputPassword1"
                            name="amount" autocomplete="off" placeholder="" aria-autocomplete="list">
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Fecha de inicio</label>
                        <input type="date" value="{{old('start_date')}}" class="form-control" id="exampleInputPassword1"
                            name="start_date" autocomplete="off" placeholder="" aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Fecha de entrega </label>
                        <input type="date" class="form-control" value="{{old('delivery_date')}}"
                            id="exampleInputPassword1" name="delivery_date" autocomplete="off" placeholder=""
                            aria-autocomplete="list">
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputEmail1">Project File</label>
                        <input class="form-control"  type="file" name="video">
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
                                                <label for="exampleInputUsername1">Nombre </label>
                                                <input value="{{old('name_task[]')}}" name="name_task[]"
                                                    class="js-example-basic-single w-90"></input>

                                                    <input value="{{old('count_op[]')}}" id="myop" name="count_op[]"type="hidden"value="1"
                                                    class="js-example-basic-single w-90"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad objetivo</label>
                                                <input value="{{old('target_quantity[]')}}"type="number" name="target_quantity[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">


                                                <label for="exampleInputUsername1"> Ubicación</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"
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
                                                <textarea value="{{old('task_directions_operator[]')}}" name="task_directions_operator[]"
                                                    class="js-example-basic-single w-90"></textarea>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputEmail1"></label>
                                                <input class="form-control"  type="file" name="file[]">
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
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"
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
                                                <input value="{{old('operator_number[]')}}" type="number" name="operator_number[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <textarea value="{{old('total_hours[]')}}" name="total_hours[]"
                                                    class="js-example-basic-single w-90"></textarea>
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
                                                <input value="{{old('subtasks')}}" name="subtasks"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad</label>
                                                <input value="{{old('subtasks')}}" name="subtasks"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
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
                                                <input value="{{old('subtasks')}}" name="subtasks"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>

                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad</label>
                                                <input value="{{old('subtasks')}}" name="subtasks"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>

                                        </div>
                                        <div class="div-btns text-center">
                                            <button type="button" id="addmore2" class="btn btn">Agregar otro tipo de
                                                herramienta</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div id="addings3">

                        </div>
                        <div class="addtasks">
                            <br>
                            <div class="div-btns text-center">
                                <button type="button" id="addmore3" class="btn btn tasks">Add More Task</button>
                            </div>
                        </div>
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
    var q = 7000;
    $("#addmore2").click(function () {


        $("#addings2").append(`<div class="aaa"> <hr>
        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre de la herramienta</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div> 
                                        <button type="button" onclick="removeop('` + q + `')"id="` + q + `" class="btn btn addmore">Remove Tool</button>
                                            </div>
                              `);
        q = q + 1;
    });

</script>

<script>
    var p = 5000;
    $(document).ready(function () {
        $('.addmore').on('click', function () {
            
            // $("#myop").val( s + 1) ;

            $(this).closest('.addings').before(`<div class="aaa"><hr><br>
            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1"> Tipo de operario</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"
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
                                                <input value="{{old('operator_number[]')}}"type="number" name="operator_number[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <textarea value="{{old('total_hours[]')}}" name="total_hours[]"
                                                    class="js-example-basic-single w-90"></textarea>
                                            </div>
                                        <button type="button" onclick="removeop('` + p + `')"id="` + p + `" class="btn btn addmore">Remove Opperator</button>
                                            </div>
                                        
                                    `);
            p = p + 1;
        });
    });

</script>

<script>
    var t = 6000;
    $(document).ready(function () {
        $('.addmore1').on('click', function () {

            $(this).closest('.addings1').before(`<div class="aaa"><hr><br>
    <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre del material</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>
                                        <button type="button" onclick="removeop('` + t + `')"id="` + t + `" class="btn btn addmore">Remove Material</button>
                                            </div>
                                        
                                    `);
            t = t + 1
        });
    });

</script>

<script>
    var c = 1;
    var k = 500;
    var j = 1000;
    var u = 1500;
    var m = 2000;
    var n = 2500;
    var x = 3000;
    $(document).ready(function () {
        $('.tasks').on('click', function () {
            c = c + 1;




            $(this).closest('.addtasks').before(`<div class="yoo">
    <hr><br>
    
    <div class="col-lg-10 ">
                        <ul>
                            <h4>Tarea ` + c + `</h4> <button type="button"  onclick="yeen('` + c + `')"id="` + c + `" class="btn btn addmore uoo">Remove</button>
                                        
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
                                                <label for="exampleInputUsername1">Nombre </label>
                                                <input value="{{old('name_task[]')}}" name="name_task[]"
                                                    class="js-example-basic-single w-90"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Cantidad objetivo</label>
                                                <input value="{{old('target_quantity[]')}}"type="number" name="target_quantity[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">


                                                <label for="exampleInputUsername1"> Ubicación</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"
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
                                                <textarea value="{{old('task_directions_operator[]')}}" name="task_directions_operator[]"
                                                    class="js-example-basic-single w-90"></textarea>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputEmail1"></label>
                                                <input class="form-control"  type="file" name="file[]">
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
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"
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
                                                <input value="{{old('operator_number[]')}}" type="number" name="operator_number[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <textarea value="{{old('total_hours[]')}}" name="total_hours[]"
                                                    class="js-example-basic-single w-90"></textarea>
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
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
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
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>

                                    </div>
                                    <div class="addings">
                                    <div class="div-btns text-center">
                                        <button type="button" onclick="myFunction3('` + n + `')"id="` + n + `" class="btn btn">Agregar otro tipo de
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
        });
    });

</script>

<script>
    function myFunction(p1) {
        // var closest = element.closest(p1);

        var y = "#" + p1;
        $(y).closest('.addings5').before(` 
        <div class="aaa"> <hr><div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1"> Tipo de operario</label>
                                                <select class="js-example-basic-single w-90 select2-hidden-accessible"
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
                                                <input value="{{old('operator_number[]')}}" type="number" name="operator_number[]"
                                                    class="js-example-basic-single w-90 select2-hidden-accessible"
                                                    id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                    aria-hidden="true"></input>
                                            </div>
                                            <div class="form-group form-inline-custom">
                                                <label for="exampleInputUsername1">Horas hombre total</label>
                                                <textarea value="{{old('total_hours[]')}}" name="total_hours[]"
                                                    class="js-example-basic-single w-90"></textarea>
                                            </div>  
                                        <button type="button" onclick="removeop('` + j + `')"id="` + j + `" class="btn btn addmore">Remove Opperator</button>
                                            </div>`);
        k = k + 1;
        j = j + 1;



    }

</script>

<script>
    function yeen(yes) {

        var r = "#" + yes;
        c = c - 1;
        // var closest = element.closest(p1);
        $(r).closest('.yoo').addClass('d-none');
    }

</script>

<script>
    function removeop(yes) {

        var o = "#" + yes;
        // var closest = element.closest(p1);
        $(o).closest('.aaa').addClass('d-none');
    }

</script>

<script>
    function myFunction2(p1) {
        // var closest = element.closest(p1);

        var y = "#" + p1;
        $(y).closest('.addings').before(`<div class="aaa"> <hr> <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre del material</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>
                                        <button type="button" onclick="removemat('` + m + `')"id="` + m + `" class="btn btn addmore">Remove Material</button>
                                            </div>
                                        </div>
        `);
        m = m + 1;
        u = u + 1;



    }

    function removemat(yes) {

        var o = "#" + yes;
        // var closest = element.closest(p1);
        $(o).closest('.aaa').addClass('d-none');
    }


    function myFunction3(p1) {
        // var closest = element.closest(p1);

        var y = "#" + p1;
        $(y).closest('.addings').before(`<div class="aaa"> <hr><div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Nombre de la herramienta</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>
                                        <button type="button" onclick="removetool('` + x + `')"id="` + x + `" class="btn btn addmore">Remove Tool</button>
                                            </div>
                                        </div>

        `);
        n = n + 1;
        x = x + 1;



    }

    function removetool(yes) {

        var o = "#" + yes;
        // var closest = element.closest(p1);
        $(o).closest('.aaa').addClass('d-none');
    }

</script>









@endsection

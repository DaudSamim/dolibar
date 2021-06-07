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
                        <input type="text" value="{{old('contact_person')}}" class="form-control"
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
                        <label for="exampleInputPassword1">Monto</label>
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
                        <input class="form-control" accept="video/*" type="file" name="video">
                        @if ($errors->has('video'))
                        <span class="text-danger">
                            <small class="font-weight-bold">{{ $errors->first('video') }}</small>
                        </span>
                        @endif
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="col-lg-10">
                        <ul>
                            <h4>Tarea</h4>
                            <li style="margin-left:30px">Subtarea</li>
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
                                            <label for="exampleInputUsername1">Nombre</label>
                                            <select class="js-example-basic-single w-90 select2-hidden-accessible"
                                                value="{{old('task_id')}}" name="task_id" data-width="100%"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                @foreach($tasks as $task)
                                        <option value="{{$task->id}}" data-select2-id="3">{{$task->task}}</option>
                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad objetivo</label>
                                            <input value="{{old('quantity')}}" name="quantity"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Ubicación	</label>
                                            <textarea value="{{old('location')}}" name="locations"
                                                class="js-example-basic-single w-90"></textarea>
                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Indicaciones para los operarios (Subir archivo)
	</label>
                                            <textarea value="{{old('directions')}}" name="directions"
                                                class="js-example-basic-single w-90"></textarea>
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
                                    <div id="addings">

                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Tipo de operario</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>

                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Cantidad de operarios</label>
                                            <input value="{{old('subtasks')}}" name="subtasks"
                                                class="js-example-basic-single w-90 select2-hidden-accessible"
                                                id="project" data-width="100%" data-select2-id="1" tabindex="-1"
                                                aria-hidden="true"></input>
                                        </div>
                                        <div class="form-group form-inline-custom">
                                            <label for="exampleInputUsername1">Horas hombre total</label>
                                            <textarea value="{{old('description')}}" name="description"
                                                class="js-example-basic-single w-90"></textarea>
                                        </div>
                                    </div>
                                    <div class="div-btns text-center">
                                        <button type="button" id="addmore" class="btn btn">Agregar otro tipo de
                                            operario</button>
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
                                    <div class="div-btns text-center">
                                        <button type="button" id="addmore1" class="btn btn">Agregar otro tipo de materiales</button>
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
                                        <button type="button" id="addmore2" class="btn btn">Agregar otro tipo de herramienta</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
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
    $("#addmore").click(function () {


        $("#addings").append(` <hr>
       <div class="form-group form-inline-custom">
                                 <label for="exampleInputUsername1">Tipo de operario</label>
                                 <input value="{{old('subtasks')}}"name="subtasks" class="js-example-basic-single w-90 select2-hidden-accessible"id="project" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"></input>
                                
                              </div>
                              <div class="form-group form-inline-custom">
                                 <label for="exampleInputUsername1">Cantidad de operarios</label>
                                 <input value="{{old('subtasks')}}"name="subtasks" class="js-example-basic-single w-90 select2-hidden-accessible"id="project" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true"></input>
                              </div>
                              <div class="form-group form-inline-custom">
                                 <label for="exampleInputUsername1">Horas hombre total</label>
                                 <textarea value="{{old('description')}}"name="description" class="js-example-basic-single w-90"></textarea>
                              </div> 
                              `);
    });

</script>

<script>
    $("#addmore1").click(function () {


        $("#addings1").append(` <hr>
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
                              `);
    });

</script>

<script>
    $("#addmore2").click(function () {


        $("#addings2").append(` <hr>
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
                              `);
    });

</script>
@endsection

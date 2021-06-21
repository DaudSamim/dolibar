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
    <div class="col-md-12">
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
                <h6 class="card-title">Desempeño de la obra</h6>
                <form class="forms-sample" action="/work-performance" method="post" enctype='multipart/form-data'>
                <div class="form-group form-inline-custom">
                    <label for="exampleInputUsername1">Projecto</label>
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}" name="project" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                        @foreach($projects as $row)
                        <option value="{{$row->id}}" data-select2-id="12">{{$row->project}}</option>
                        @endforeach
                    </select>
                   

                </div>
               <!--  <div class="form-group form-inline-custom">
                    <label for="exampleInputEmail1">Tarea</label>
                    <input type="text" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" name="task" required placeholder="">
                </div> -->
                <div class="form-group form-inline-custom">
                    <label for="exampleInputPassword1">Fecha</label>
                    <input type="week" value="{{old('date')}}" class="form-control" id="exampleInputPassword1" required name="date" autocomplete="off" placeholder="" aria-autocomplete="list">
                </div>

                <div class="form-group form-inline-custom">
                    <label for="exampleInputPassword1">Status del proyecto</label>
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}" name="status" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected value="active" data-select2-id="12">Activo</option>
                        <option value="delivered" data-select2-id="13">Entregado</option>
                       
                    </select>
                </div>

                <div class="form-group form-inline-custom">
                    <label for="exampleInputPassword1">Filtro</label>
                    <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}" name="filter" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected data-select2-id="12">Seleccionar filtro</option>
                        <option value="Soldador" data-select2-id="12">Tiempo de trabajo</option>
                        <option value="Maestro Soldador" data-select2-id="13">Cumplimiento del objetivo</option>
                        <option value=" Ingeniero" data-select2-id="14"> Unidades terminadas</option>
                        <option value="Vendedor" data-select2-id="15">Unidades con fallas</option>
                        <option value="Tercerizado" data-select2-id="15">Pérdidas valorizadas </option>
                    </select>
                </div>
                <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">GRABAR</button>
                    </div>
                </form>
            
<br>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <thead>
                            <tr>

                                <th>Trabajador</th>
                                <th>Lun</th>
                                <th>Mar</th>
                                <th>Miér</th>
                                <th>juev</th>
                                <th>vier</th>
                                <th>Sábado</th>
                                <th><strong>Cantidad semanal</strong></th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($workers as $row) 
                            <tr>
                                <td>{{$row->name}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach

                             <tr>
                                <td><strong>Cantidad diaria</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>


                           
                        </tbody>
                       
                    </table>

                </div>
                <br><br>
                
                <div class="div-btns text-left">
                        <button type="submit" class="btn btn-grabar"style="width:200px!important">Completar Tarea</button>
                </div>
                <br>
                <div class="div-btns text-left">
                        <button type="submit" class="btn btn-grabar"style="width:200px!important">Proyecto Completar</button>
                </div>
                <br>
                <div class="div-btns text-left">
                        <button type="submit" class="btn btn-grabar"style="width:200px!important">Reabrir Proyecto</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection

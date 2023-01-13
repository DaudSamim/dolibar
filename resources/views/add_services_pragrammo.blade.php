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
                <h6 class="card-title">Programar Servicio Metalmecánico</h6>
                <form class="forms-sample" action="/create_service" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Tipo de Servicio</label>
                        <select id="category" name="category">
                            <option value="">Select</option>
                            <option value="Solo corte">Solo corte</option>
                            <option value="Solo doblez">Solo doblez</option>
                            <option value="Corte y Doblez">Corte y Doblez</option>
                            <option value="Rolado tubos">Rolado tubos</option>
                            <option value="Doblado Tubos">Doblado Tubos</option>
                            <option value="Torno">Torno</option>
                        </select>
                        {{--  <button type="submit" class="btn btn-sm btn-danger">Agregar</button>  --}}

                    </div>
                    <ul>
                        <li>Producto a realizar <button type="button" id="add_producto" class="btn btn-danger">Agregar Producto</button>
                            <ul>
                                <li>
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Prioridad</th>
                                            </tr>
                                        </thead>
                                    <tbody id="paste_producto">

                                        <tr>
                                            <td><input type="text" value="{{old('operators')}}"
                                                    class="form-control" id="exampleInputPassword1" name="product_name[]"
                                                    autocomplete="off" aria-autocomplete="list"></td>
                                            <td><input type="number" value="{{old('operators')}}"
                                                    class="form-control" id="exampleInputPassword1" name="product_quantity[]"
                                                    autocomplete="off" aria-autocomplete="list"></td>
                                            <td><input type="number" value="{{old('operators')}}"
                                                    class="form-control" id="exampleInputPassword1" name="product_priority[]"
                                                    autocomplete="off" aria-autocomplete="list"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </li>
                                <hr>
                            </ul>
                        </li>

                        <li>Material a trabajar <button type="button" id="add_material" class="btn btn-danger">Agregar Material</button>
                            <ul>
                                <li>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Prioridad</th>
                                            </tr>
                                        </thead>
                                        <tbody id="paste_material">
                                            <tr>
                                                <td><input type="text" value="{{old('operators')}}"
                                                        class="form-control" id="exampleInputPassword1" name="material_name[]"
                                                        autocomplete="off" aria-autocomplete="list"></td>
                                                <td><input type="number" value="{{old('operators')}}"
                                                        class="form-control" id="exampleInputPassword1" name="material_quantity[]"
                                                        autocomplete="off" aria-autocomplete="list"></td>
                                                <td><input type="number" value="{{old('operators')}}"
                                                        class="form-control" id="exampleInputPassword1" name="material_priority[]"
                                                        autocomplete="off" aria-autocomplete="list"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <hr>

                            </ul>
                        </li>
                        <li>Days
                            <ul>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="days[]" value="Hoy" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Hoy
                                    </label>
                                    <br>

                                    <input class="form-check-input" type="checkbox" name="days[]" value="Mañana" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Mañana
                                    </label>
                                </li>
                                <hr>

                            </ul>
                        </li>
                        <li>Time
                            <ul>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="time[]" value="Mañana Temprano (8am - 10am)">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Mañana Temprano (8am - 10am)
                                    </label>
                                    <br>

                                    <input class="form-check-input" type="checkbox" name="time[]" value="Antes de almuerzo (10am - 1pm)">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Antes de almuerzo (10am - 1pm)
                                    </label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="time[]" value="Después de almuerzo (2 a 4pm)">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Después de almuerzo (2 a 4pm)
                                    </label>
                                    <br>

                                    <input class="form-check-input" type="checkbox" name="time[]" value="Al cierre (4 a 6pm)">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Al cierre (4 a 6pm)
                                    </label>
                                </li>
                                <hr>

                            </ul>
                        </li>
                        <li>
                            <label class="form-check-label" for="flexCheckDefault">
                                Fecha
                            </label>
                            <input class="form-control" type="date" value="" name="date">
                            <br>


                        </li>
                        <li>
                            <label class="form-check-label" for="flexCheckDefault">
                                Entrega
                            </label>
                            <input class="form-control" name="delivery" type="text" value="">
                            <br>
                        </li>
                        <li>
                            <label class="form-check-label" for="flexCheckDefault">
                                Comentarios
                            </label>
                            <textarea class="form-control" name="comments"></textarea>
                            <br>
                        </li>
                    </ul>
                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">GRABAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    th{
        text-align: center;
    }
</style>

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
                                <th>SR NO</th>
                                <th>Matriz</th>
                                <th>Products</th>
                                <th>Materials</th>
                                <th>Days</th>
                                <th>Time</th>
                                <th>Fecha</th>
                                <th>Entrega</th>
                                <th>Comentarios</th>
                            </tr>
                        </thead>
                        <tbody>
<?php $i=0; ?>
                        @foreach($services as $service)
                      <?php
                      $i++;
                      $product_name=json_decode($service->product_name);
                      $product_quantity=json_decode($service->product_quantity);
                      $product_priority=json_decode($service->product_priority);
                      $material_name=json_decode($service->material_name);
                      $material_quantity=json_decode($service->material_quantity);
                      $material_priority=json_decode($service->material_priority);
                      $days=json_decode($service->days);
                      $time=json_decode($service->time);

                      ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{$service->category}}</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Name</td>
                                            <td>Quantity</td>
                                            <td>Priority</td>
                                        </tr>
                                        @foreach ($product_name as $key=> $item)
                                            <tr>
                                                <td>{{ $item }}</td>
                                                <td>{{ $product_quantity[$key] }}</td>
                                                <td>{{ $product_priority[$key] }}</td>
                                            </tr>
                                        @endforeach



                                    </table>
                                </td>
                                <td>
                                    <table>
                                    <tr>
                                        <td>Name</td>
                                        <td>Quantity</td>
                                        <td>Priority</td>
                                    </tr>
                                    @foreach ($material_name as $keys=> $material)
                                        <tr>
                                            <td>{{ $material }}</td>
                                            <td>{{ $material_quantity[$keys] }}</td>
                                            <td>{{ $material_priority[$keys] }}</td>
                                        </tr>
                                    @endforeach
                                    </table>
                                    </td>

                            <td>@foreach ($days as $day )
                                {{ $day }}<br><br>
                                @endforeach</td>
                                <td>@foreach ($time as $ti )
                                    {{ $ti }}<br><br>
                                    @endforeach</td>
                            <td>{{$service->date}}</td>
                            <td>{{$service->delivery}}</td>
                            <td>{{$service->comments}}</td>
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
    $("#add_producto").click(function () {
        $("#paste_producto").append(`<tr>
        <td><input type="text" value="{{old('operators')}}"
            class="form-control" id="exampleInputPassword1" name="product_name[]"
            autocomplete="off" aria-autocomplete="list"></td>
        <td><input type="number" value="{{old('operators')}}"
            class="form-control" id="exampleInputPassword1" name="product_quantity[]"
            autocomplete="off" aria-autocomplete="list"></td>
        <td><input type="number" value="{{old('operators')}}"
            class="form-control" id="exampleInputPassword1" name="product_priority[]"
            autocomplete="off" aria-autocomplete="list"></td>
    </tr>`);

    });

    $("#add_material").click(function () {

        $("#paste_material").append(`<tr>
            <td><input type="text" value="{{old('operators')}}"
                    class="form-control" id="exampleInputPassword1" name="material_name[]"
                    autocomplete="off" aria-autocomplete="list"></td>
            <td><input type="number" value="{{old('operators')}}"
                    class="form-control" id="exampleInputPassword1" name="material_quantity[]"
                    autocomplete="off" aria-autocomplete="list"></td>
            <td><input type="number" value="{{old('operators')}}"
                    class="form-control" id="exampleInputPassword1" name="material_priority[]"
                    autocomplete="off" aria-autocomplete="list"></td>
              </tr>`);

    });
</script>
@endsection

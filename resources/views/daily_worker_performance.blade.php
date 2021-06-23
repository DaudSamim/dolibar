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

    .form-control,
    select,
    .email-compose-fields .select2-container--default .select2-selection--multiple,
    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--single .select2-search__field,
    .typeahead,
    .tt-query,
    .tt-hint {
        width: 75% !important;
    }

    .w-100,
    .dataTables_wrapper.dt-bootstrap4 .dataTables_length select {
        width: 75% !important;
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
                <h6 class="card-title">Desempeño diario del trabajador</h6>
                <form class="forms-sample" action="/daily_worker_performance" method="post"
                    enctype='multipart/form-data'>
                    <div class=row>
                        <div class="col-8"></div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input"  type="checkbox"  id="flexCheckChecked1"
                                    name="attendance">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Did not attend
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="flexCheckChecked2"
                                    name="break">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Paid break
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Nombre del trabajador</label>
                        <select style="width: 75% !important" value="{{old('employee_id')}}" id="name"
                            class="js-example-basic-single w-100 select2-hidden-accessible" name="employee_id"
                            data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">

                            @foreach($employees as $row)
                            <option value="{{$row->id}}" data-select2-id="3">{{$row->name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group form-inline-custom">
                        <label for="exampleInputEmail1">Fecha</label>
                        <input type="date" value="{{old('date')}}" class="form-control" id="date" name="date"
                            placeholder="">
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputEmail1">Proyecto actual</label>
                        <!-- <input type="text"id="banks" value="{{old('project_id')}}"class="form-control" name="project_id" placeholder=""> -->
                        <select id="projects" name="projects">

                        </select>
                    </div>

                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Tarea Actual</label>
                        <select id="tasks" name="tasks">

                        </select>
                    </div>
                    <div class="" id="removeclass">
                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Requerimiento de la tarea</label>
                            <input type="text" value="{{old('requirements')}}" class="form-control"
                                id="exampleInputPassword1" name="requirements" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Tiempo de trabajo</label>
                            <input type="text" value="{{old('working_time')}}" class="form-control"
                                id="exampleInputPassword1" name="working_time" maxlength="19" autocomplete="off"
                                placeholder="" aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Unidades terminadas</label>
                            <input type="number" value="{{old('finished_units')}}" class="form-control"
                                id="exampleInputPassword1" name="finished_units" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Cumplimiento del objetivo</label>
                            <select style="width: 75% !important" value="{{old('objective')}}"
                                class="js-example-basic-single w-100 select2-hidden-accessible" name="objective"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="Sí" data-select2-id="3">Sí</option>
                                <option value="No" data-select2-id="3">No</option>
                                <option value="Incompleto" data-select2-id="3">Incompleto</option>

                            </select>
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Unidades con fallas </label>
                            <input type="number" class="form-control" value="{{old('faulty_units')}}"
                                id="exampleInputPassword1" name="faulty_units" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Pérdida Valorizada </label>
                            <input type="number" class="form-control" value="{{old('valued_loss')}}"
                                id="exampleInputPassword1" name="valued_loss" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Comentario </label>
                            <input type="text" class="form-control" value="{{old('commentary')}}"
                                id="exampleInputPassword1" name="commentary" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
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
    $(document).ready(function () {

        $("#name").change(function (e) {
            document.getElementById("tasks").innerHTML = '';
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }


            });

            $.ajax({
                url: "get_projects_ajax",
                type: "POST",
                data: {
                    date: $('#date').val(),
                    name: $('#name').val()
                },

                success: function (data) {
                    if (data) {
                        document.getElementById("projects").innerHTML = data;
                    } else {
                        document.getElementById("projects").innerHTML =
                            "<option>No Projects Available</option>";
                    }

                },
                error: function () {
                    document.getElementById("projects").innerHTML =
                        "<option>No Projects Available</option>";
                }
            });

        });

        $("#projects").change(function (e) {

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }


            });

            $.ajax({
                url: "get_tasks_ajax",
                type: "POST",
                data: {
                    name: $('#name').val(),
                    project: $('#projects').val(),
                },

                success: function (data) {
                    if (data) {
                        document.getElementById("tasks").innerHTML = data;
                    } else {
                        document.getElementById("tasks").innerHTML =
                            "<option>No Tasks Available</option>";
                    }

                },
                error: function () {
                    document.getElementById("tasks").innerHTML =
                        "<option>No Tasks Available</option>";
                }
            });

        });


    });

</script>
<script>

   function myFunction() {

      document.getElementById("removeclass").innerHTML = "" ;
//   document.getElementById("fname").value = document.getElementById("fname").value.toUpperCase();
};

function myFunction2() {

//   document.getElementById("fname").value = document.getElementById("fname").value.toUpperCase();
};
</script>
<script>
$('#flexCheckChecked1').click(function() {
    if($(this).is(':checked')){
    document.getElementById("removeclass").innerHTML = "" ;
    document.getElementById("flexCheckChecked2").checked = false;
   }

    else
    document.getElementById("removeclass").innerHTML = `<div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Requerimiento de la tarea</label>
                            <input type="text" value="{{old('requirements')}}" class="form-control"
                                id="exampleInputPassword1" name="requirements" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Tiempo de trabajo</label>
                            <input type="text" value="{{old('working_time')}}" class="form-control"
                                id="exampleInputPassword1" name="working_time" maxlength="19" autocomplete="off"
                                placeholder="" aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Unidades terminadas</label>
                            <input type="number" value="{{old('finished_units')}}" class="form-control"
                                id="exampleInputPassword1" name="finished_units" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Cumplimiento del objetivo</label>
                            <select style="width: 75% !important" value="{{old('objective')}}"
                                class="js-example-basic-single w-100 select2-hidden-accessible" name="objective"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="Sí" data-select2-id="3">Sí</option>
                                <option value="No" data-select2-id="3">No</option>
                                <option value="Incompleto" data-select2-id="3">Incompleto</option>

                            </select>
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Unidades con fallas </label>
                            <input type="number" class="form-control" value="{{old('faulty_units')}}"
                                id="exampleInputPassword1" name="faulty_units" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Pérdida Valorizada </label>
                            <input type="number" class="form-control" value="{{old('valued_loss')}}"
                                id="exampleInputPassword1" name="valued_loss" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Comentario </label>
                            <input type="text" class="form-control" value="{{old('commentary')}}"
                                id="exampleInputPassword1" name="commentary" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>` ;
});
</script>


<script>
$('#flexCheckChecked2').click(function() {
    if($(this).is(':checked')){
    document.getElementById("removeclass").innerHTML = "" ;
    document.getElementById("flexCheckChecked1").checked = false; 
   }

    else
    document.getElementById("removeclass").innerHTML = `<div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Requerimiento de la tarea</label>
                            <input type="text" value="{{old('requirements')}}" class="form-control"
                                id="exampleInputPassword1" name="requirements" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Tiempo de trabajo</label>
                            <input type="text" value="{{old('working_time')}}" class="form-control"
                                id="exampleInputPassword1" name="working_time" maxlength="19" autocomplete="off"
                                placeholder="" aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Unidades terminadas</label>
                            <input type="number" value="{{old('finished_units')}}" class="form-control"
                                id="exampleInputPassword1" name="finished_units" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Cumplimiento del objetivo</label>
                            <select style="width: 75% !important" value="{{old('objective')}}"
                                class="js-example-basic-single w-100 select2-hidden-accessible" name="objective"
                                data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="Sí" data-select2-id="3">Sí</option>
                                <option value="No" data-select2-id="3">No</option>
                                <option value="Incompleto" data-select2-id="3">Incompleto</option>

                            </select>
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Unidades con fallas </label>
                            <input type="number" class="form-control" value="{{old('faulty_units')}}"
                                id="exampleInputPassword1" name="faulty_units" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Pérdida Valorizada </label>
                            <input type="number" class="form-control" value="{{old('valued_loss')}}"
                                id="exampleInputPassword1" name="valued_loss" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>

                        <div class="form-group form-inline-custom">
                            <label for="exampleInputPassword1">Comentario </label>
                            <input type="text" class="form-control" value="{{old('commentary')}}"
                                id="exampleInputPassword1" name="commentary" autocomplete="off" placeholder=""
                                aria-autocomplete="list">
                        </div>` ;
});
</script>

@endsection

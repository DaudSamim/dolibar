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
                <h6 class="card-title">Materiales / Herramientas / Insumos / Fabricaciones Stock</h6>
                <form class="forms-sample" action="/update_materialas" method="post" enctype='multipart/form-data'>
                    
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Categoría del Material / Insumo / Herramienta</label>
                        <input type="text" value="{{old('category')}}" class="form-control" id="category"
                            name="category" autocomplete="off" placeholder="">
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
                        <input type="number" value="{{old('number')}}" class="form-control"
                            id="number" name="number" autocomplete="off" placeholder=""
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
@endsection

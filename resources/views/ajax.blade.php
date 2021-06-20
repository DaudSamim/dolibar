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
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <h6 class="card-title">Crear trabajador</h6>
                <form class="forms-sample" action="" method="">
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Apellidos</label>
                        <input type="text" value="{{old('surname')}}" class="form-control" id="exampleInputUsername1"
                            name="surname" autocomplete="off" placeholder="">

                    </div>




                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Tipo de cuenta</label>
                        <select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('bank')}}"
                            name="account_type" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="cuenta de ahorros" data-select2-id="3">cuenta de ahorros</option>
                            <option value="cuenta corriente" data-select2-id="12">cuenta corriente</option>
                            <option value="cuenta de ahorros" data-select2-id="13">cuenta de ahorros</option>
                            <option value="Cuenta suelda" data-select2-id="14">Cuenta suelda</option>
                            <option value="Otros" data-select2-id="15">Otros</option>
                        </select>
                    </div>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputPassword1">Banco</label>

                        <select class="js-example-basic-single w-100 select2-hidden-accessible"id="banks" value="{{old('bank')}}"
                            name="bank" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="BCP" data-select2-id="3">BCP</option>
                            <option value="Banco de la" data-select2-id="12">Banco de la</option>
                            <option value="Nacion" data-select2-id="13">Nacion</option>
                            <option value="BBVA Continental" data-select2-id="14">BBVA Continental</option>
                            <option value="Interbank" data-select2-id="15">Interbank</option>
                            <option value="Banco pichincha" data-select2-id="15">Banco pichincha</option>
                            <option value="BanBif" data-select2-id="15">BanBif</option>
                        </select>
                    </div>







                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" id="ajaxButton" class="btn btn-grabar">GRABAR</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    console.log('hi');

    $('#ajaxButton').click(function(e){
         e.preventDefault();
         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN': $("meta[name='_token']").attr('content')
             }
             console.log($("meta[name='_token']").attr('content'));

         })
        $.ajax({
            url: "{{url('/ajax')}}",
            method: 'POST',
            data:{surname: $('#exampleInputUsername1').val()},
            success: function(result){
                console.log(result);
            }
        });

    })
})
</script>

<script>
// $('#ajaxButton').click(function(e){
//          e.preventDefault();
         
//         $.ajax({
//             url: "{{url('/ajax')}}",
//             method: 'POST',
//             data:{surname: $('#exampleInputUsername1').val()},
//             success: function(result){
//                 console.log(result);
//             }
//         });

//     });

</script>
<script>
// $('#ajaxButton').click(function(e){
//     e.preventDefault();
//        data = document.getElementById("exampleInputUsername1").value;
//        alert(data);
//        var = req = new XMLHttpRequest();
//        req.open("GET","ajax ="+ data,true);
//        req.send();

//        req.onreadystatechange = function(){
//            if(req.readyState==4 && req.status = 200){
//             document.getElementById("banks").innerHTML = req.responseText;
//            }
//        }
// });    
</script>
@endsection

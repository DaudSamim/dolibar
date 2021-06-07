@extends('layout.app')
<script src="js/jquery-3.3.1.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
   .form-inline-custom{
   display: flex !important;
   align-items: flex-end !important;
   align-content: center;
   }
   .form-inline-custom label{
   width: 35% !important;
   }
   select{
   color: #495057 !important
   }
   .btn-grabar{
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
            <h6 class="card-title">Registrar la adquisición de Materiales / Herramientas / Insumos</h6>
            <form class="forms-sample"action="/register_material" method="post"enctype='multipart/form-data' >
            <div id="nuyaa">
               <div class="form-group form-inline-custom">
                  <label for="exampleInputUsername1">Número de Factura </label>
                  <input type="text"value="{{old('invoice')}}" class="form-control" id="exampleInputUsername1"name="invoice" autocomplete="off" placeholder="">
               </div>
               <div class="form-group form-inline-custom">
                  <label for="exampleInputEmail1">Fecha</label>
                  <input type="date" value="{{old('date')}}"class="form-control" id="exampleInputEmail1"name="date" placeholder="cm">
               </div>
               <div class="form-group form-inline-custom">
                  <label for="exampleInputEmail1">Proveedor</label>
                  <input type="text" value="{{old('supplier')}}"class="form-control" id="exampleInputEmail1"name="supplier" placeholder="cm">
               </div>
               <br>
               <hr>
               <br>
               <div class="form-group form-inline-custom">
                  <label for="exampleInputPassword1">Nombre del Item</label>
                  <input type="text"value="{{old('item')}}"class="form-control" id="exampleInputPassword1"name="item[]" autocomplete="off" placeholder="cm" aria-autocomplete="list">
               </div>
               <div class="form-group form-inline-custom">
                  <label for="exampleInputPassword1">Cantidad</label>
                  <input type="number"value="{{old('quantity')}}"class="form-control" id="exampleInputPassword1"name="quantity[]" autocomplete="off" placeholder="cm" aria-autocomplete="list">
               </div>
               <div class="form-group form-inline-custom" id="yoo">
                  <label for="exampleInputPassword1">Precio</label>
                  <input type="number"value="{{old('price')}}"class="form-control" id="exampleInputPassword1"name="price[]"maxlength = "19" autocomplete="off" placeholder="cm" aria-autocomplete="list">
               </div>
               <br>
               </div>
               <div class="div-btns text-center">
                  <button type="button" id="addmore" class="btn btn">Add More</button>
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
$("#addmore").click(function(){
    
    $("#nuyaa").append(`<hr>
               <br>
               <div class="form-group form-inline-custom">
                  <label for="exampleInputPassword1">Nombre del Item</label>
                  <input type="text"value="{{old('item')}}"class="form-control" id="exampleInputPassword1"name="item[]" autocomplete="off" placeholder="cm" aria-autocomplete="list">
               </div>
               <div class="form-group form-inline-custom">
                  <label for="exampleInputPassword1">Cantidad</label>
                  <input type="number"value="{{old('quantity')}}"class="form-control" id="exampleInputPassword1"name="quantity[]" autocomplete="off" placeholder="cm" aria-autocomplete="list">
               </div>
               <div class="form-group form-inline-custom" id="yoo">
                  <label for="exampleInputPassword1">Precio</label>
                  <input type="number"value="{{old('price')}}"class="form-control" id="exampleInputPassword1"name="price[]"maxlength = "19" autocomplete="off" placeholder="cm" aria-autocomplete="list">
               </div>
               <br>`);
  });
</script>


<!-- <script>
        function addmore() {
            document.getElementById("nuyaa").innerHTML += 
              "<div class="form-group form-inline-custom" id="yoo">
                  <label for="exampleInputPassword1">Ancho</label>
                  <input type="number"value="{{old('width')}}"class="form-control" id="exampleInputPassword1"name="width"maxlength = "19" autocomplete="off" placeholder="cm" aria-autocomplete="list">
               </div>";
        }
    </script> -->

@endsection
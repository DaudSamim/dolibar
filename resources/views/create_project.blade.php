@extends('layout.app')

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
								<h6 class="card-title">Crear proyecto</h6>
								<form class="forms-sample"action="/add_emloyee" method="post">
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Nombre del proyecto</label>
										<input type="text"value="{{old('surname')}}" class="form-control" id="exampleInputUsername1"name="surname" autocomplete="off" placeholder="">
									
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputEmail1">Ubicación</label>
										<input type="text"	  value="{{old('name')}}"class="form-control" id="exampleInputEmail1"name="name" placeholder="">
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Cliente</label>
										<input type="text"value="{{old('address')}}"class="form-control" id="exampleInputPassword1"name="address" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Persona de contacto</label>
										<input type="text"value="{{old('province')}}"class="form-control" id="exampleInputPassword1"name="province" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Ingeniero Encargado</label>
										<input type="number"value="{{old('mobile')}}"class="form-control" id="exampleInputPassword1"name="mobile"maxlength = "19" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
									
                                   
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Monto</label>
										<input type="email" value="{{old('email')}}"class="form-control" id="exampleInputPassword1"name="email" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Fecha de inicio</label>
										<input type="date"	  value="{{old('account_number')}}"class="form-control" id="exampleInputPassword1"name="account_number" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									
									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Fecha de entrega </label>
										<input type="date" class="form-control"value="{{old('emergency_number')}}" id="exampleInputPassword1"name="emergency_number" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Adjuntar archivo de los planos </label>
										<input type="file" class="form-control"value="{{old('emergency_number')}}" id="exampleInputPassword1"name="emergency_number" autocomplete="off" placeholder="" aria-autocomplete="list">
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
@endsection

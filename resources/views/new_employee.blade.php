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
								<h6 class="card-title">Crear trabajador</h6>
								<form class="forms-sample"action="/add_emloyee" method="post">
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Apellidos</label>
										<input type="text"value="{{old('surname')}}" class="form-control" id="exampleInputUsername1"name="surname" autocomplete="off" placeholder="">
									
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputEmail1">Nombre</label>
										<input type="text"	  value="{{old('name')}}"class="form-control" id="exampleInputEmail1"name="name" placeholder="">
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Direccion</label>
										<input type="text"value="{{old('address')}}"class="form-control" id="exampleInputPassword1"name="address" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Privincia</label>
										<input type="text"value="{{old('province')}}"class="form-control" id="exampleInputPassword1"name="province" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Movil</label>
										<input type="number"value="{{old('mobile')}}"class="form-control" id="exampleInputPassword1"name="mobile"maxlength = "19" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
									
                                   
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">E-mail</label>
										<input type="email" value="{{old('email')}}"class="form-control" id="exampleInputPassword1"name="email" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Numero de cuenta</label>
										<input type="text"	  value="{{old('account_number')}}"class="form-control" id="exampleInputPassword1"name="account_number" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
                                    <label for="exampleInputPassword1">Tipo de cuenta</label>
									<select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('bank')}}"name="account_type" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="cuenta de ahorros" data-select2-id="3">cuenta de ahorros</option>
                                 <option value="cuenta corriente" data-select2-id="12">cuenta corriente</option>
                                 <option value="cuenta de ahorros" data-select2-id="13">cuenta de ahorros</option>
                                 <option value="Cuenta suelda" data-select2-id="14">Cuenta suelda</option>
                                 <option value="Otros" data-select2-id="15">Otros</option>
                              </select>
							  </div>
									<div class="form-group form-inline-custom">
                                    <label for="exampleInputPassword1">Banco</label>

									<select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('bank')}}"name="bank" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="BCP" data-select2-id="3">BCP</option>
                                 <option value="Banco de la" data-select2-id="12">Banco de la</option>
                                 <option value="Nacion" data-select2-id="13">Nacion</option>
                                 <option value="BBVA Continental" data-select2-id="14">BBVA Continental</option>
                                 <option value="Interbank" data-select2-id="15">Interbank</option>
                                 <option value="Banco pichincha" data-select2-id="15">Banco pichincha</option>
                                 <option value="BanBif" data-select2-id="15">BanBif</option> 
                              </select>
							  </div>

								

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Movil de emergencia</label>
										<input type="number" class="form-control"value="{{old('emergency_number')}}" id="exampleInputPassword1"name="emergency_number" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Sueldo</label>
										<input type="number" class="form-control"value="{{old('salary')}}" id="exampleInputPassword1"name="salary" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Horas de trabajo</label>
										<input type="number" class="form-control"value="{{old('working_hours')}}" id="exampleInputPassword1"name="working_hours" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Tipo de trabajador</label>
										<select class="js-example-basic-single w-100 select2-hidden-accessible" value="{{old('type')}}"name="type" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                              <option value="" data-select2-id="3">Lista desplegable</option>
                                 <option value="Soldador" data-select2-id="12">Soldador</option>
                                 <option value="Maestro Soldador" data-select2-id="13">Maestro Soldador</option>
                                 <option value=" Ingeniero" data-select2-id="14"> Ingeniero</option>
                                 <option value="Vendedor" data-select2-id="15">Vendedor</option>
                                 <option value="Tercerizado" data-select2-id="15">Tercerizado</option>
                                 <option value="Ayudante" data-select2-id="15">Ayudante</option> 
                              </select>
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

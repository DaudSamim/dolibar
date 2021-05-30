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
								<form class="forms-sample"action="/save_changes_employee" method="post">
								<input type="hidden" name="id" value="{{$edit_employee->id}}">
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Apellidos</label>
										<input type="text" value="{{$edit_employee->surname}}" class="form-control" id="exampleInputUsername1"name="surname" autocomplete="off" placeholder="">
									
									</div>
									<div class="form-group form-inline-custom">
										<label for="exampleInputEmail1">Nombre</label>
										<input type="text"	  value="{{$edit_employee->name}}"class="form-control" id="exampleInputEmail1"name="name" placeholder="">
									</div>
									
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Privincia</label>
										<input type="text"value="{{$edit_employee->province}}"class="form-control" id="exampleInputPassword1"name="province" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Movil</label>
										<input type="number"value="{{$edit_employee->mobile}}"class="form-control" id="exampleInputPassword1"name="mobile"maxlength = "19" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>
									
                                   
                                    <div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">E-mail</label>
										<input type="email" value="{{$edit_employee->email}}"class="form-control" id="exampleInputPassword1"name="email" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Numero de cuenta</label>
										<input type="text"	  value="{{$edit_employee->account_number}}"class="form-control" id="exampleInputPassword1"name="account_number" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Tipo de cuenta</label>
										<input type="text" class="form-control"value="{{$edit_employee->account_type}}"id="exampleInputPassword1"name="account_type" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Banco</label>
										<input type="text" class="form-control"	  value="{{$edit_employee->bank}}"id="exampleInputPassword1"name="bank" autocomplete="off" placeholder="" aria-autocomplete="list">
									</div>

									<div class="form-group form-inline-custom">
										<label for="exampleInputPassword1">Movil de emergencia</label>
										<input type="number" class="form-control"value="{{$edit_employee->emergency_number}}" id="exampleInputPassword1"name="emergency_number" autocomplete="off" placeholder="" aria-autocomplete="list">
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

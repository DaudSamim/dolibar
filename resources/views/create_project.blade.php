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
<form class="forms-sample"action="/create_project" method="post"enctype='multipart/form-data'>
<div class="form-group form-inline-custom">
<label for="exampleInputUsername1">Nombre del proyecto</label>
<input type="text"value="{{old('project')}}" class="form-control" id="exampleInputUsername1"name="project" autocomplete="off" placeholder="">

</div>
<div class="form-group form-inline-custom">
<label for="exampleInputEmail1">Ubicación</label>
<input type="text" value="{{old('location')}}"class="form-control" id="exampleInputEmail1"name="location" placeholder="">
</div>
<div class="form-group form-inline-custom">
<label for="exampleInputPassword1">Cliente</label>
<input type="text"value="{{old('customer')}}"class="form-control" id="exampleInputPassword1"name="customer" autocomplete="off" placeholder="" aria-autocomplete="list">
</div>
<div class="form-group form-inline-custom">
<label for="exampleInputPassword1">Persona de contacto</label>
<input type="text"value="{{old('contact_person')}}"class="form-control" id="exampleInputPassword1"name="contact_person" autocomplete="off" placeholder="" aria-autocomplete="list">
</div>
<div class="form-group form-inline-custom">
<label for="exampleInputPassword1">Ingeniero Encargado</label>
<input type="text"value="{{old('engineer_incharge')}}"class="form-control" id="exampleInputPassword1"name="engineer_incharge"maxlength = "19" autocomplete="off" placeholder="" aria-autocomplete="list">
</div>


<div class="form-group form-inline-custom">
<label for="exampleInputPassword1">Monto</label>
<input type="number" value="{{old('amount')}}"class="form-control" id="exampleInputPassword1"name="amount" autocomplete="off" placeholder="" aria-autocomplete="list">
</div>

<div class="form-group form-inline-custom">
<label for="exampleInputPassword1">Fecha de inicio</label>
<input type="date" value="{{old('start_date')}}"class="form-control" id="exampleInputPassword1"name="start_date" autocomplete="off" placeholder="" aria-autocomplete="list">
</div>


<div class="form-group form-inline-custom">
<label for="exampleInputPassword1">Fecha de entrega </label>
<input type="date" class="form-control"value="{{old('delivery_date')}}" id="exampleInputPassword1"name="delivery_date" autocomplete="off" placeholder="" aria-autocomplete="list">
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
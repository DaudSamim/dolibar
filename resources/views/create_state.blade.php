@extends('layout.app')

<style>
    .form-inline-custom{
        display: flex !important;
    align-items: flex-end !important;
    align-content: center;
    }
    .form-inline-custom label{
        width: 25% !important;
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
        <div class="card">
              <div class="card-body">
								<h6 class="card-title">Crear Estado</h6>
								<form class="forms-sample">
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Nombre</label>
										<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
									</div>
									
									<div class="div-btns text-center">
                                  
                                    <button class="btn btn-grabar">GRABAR</button>
                                    </div>
								</form>
                                <h6 class="card-title">Crear ubicacian</h6>
								<form class="forms-sample">
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Nombre</label>
										<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
									</div>
									
									<div class="div-btns text-center">
                                  
                                    <button class="btn btn-grabar">GRABAR</button>
                                    </div>
								</form>
                                <h6 class="card-title">Tipo</h6>
								<form class="forms-sample">
									<div class="form-group form-inline-custom">
										<label for="exampleInputUsername1">Nombre</label>
										<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="">
									</div>
									
									<div class="div-btns text-center">
                                  
                                    <button class="btn btn-grabar">GRABAR</button>
                                    </div>
								</form>
              </div>
            </div>
        </div>
    </div>
@endsection

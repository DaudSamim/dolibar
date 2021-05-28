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
				<h6 class="card-title">Basic Form</h6>
				<form class="forms-sample">
					<div class="form-group form-inline-custom">
						<label for="exampleInputUsername1">Username</label>
						<input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
					</div>
					<div class="form-group form-inline-custom">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					</div>
					<div class="form-group form-inline-custom">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
					</div>
                    <div class="form-group form-inline-custom">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
					</div>
                    <div class="form-group form-inline-custom">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
					</div>
					<div class="form-group form-inline-custom">
						<label for="exampleInputPassword1">Password</label>
                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                 <option value="TX" data-select2-id="3">Texas</option>
                 <option value="NY" data-select2-id="12">New York</option>
                 <option value="FL" data-select2-id="13">Florida</option>
                 <option value="KN" data-select2-id="14">Kansas</option>
                 <option value="HW" data-select2-id="15">Hawaii</option>
              </select>
					</div>
                    <div class="form-group form-inline-custom">
						<label for="exampleInputPassword1">Password</label>
                        <select class="js-example-basic-single w-100 select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                 <option value="TX" data-select2-id="3">Texas</option>
                 <option value="NY" data-select2-id="12">New York</option>
                 <option value="FL" data-select2-id="13">Florida</option>
                 <option value="KN" data-select2-id="14">Kansas</option>
                 <option value="HW" data-select2-id="15">Hawaii</option>
              </select>
					</div>
                    <div class="form-group form-inline-custom">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" aria-autocomplete="list">
					</div>
					<div class="div-btns text-center">
                    <button class="btn mr-4 btn-grabar">ANULAR</button>
                    <button class="btn btn-grabar">GRABAR</button>
                    </div>
				</form>
              </div>
            </div>
        </div>
    </div>
@endsection

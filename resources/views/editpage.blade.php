@extends('layout.app')
<style>
   table th{
   border-top: none !important;
   border-bottom: none !important;
   text-align: center !important;
   }
   table td{
   border-top: none !important;
   text-align: center !important;
   }
   .form-inline-custom{
   display: flex !important;
   align-items: flex-end !important;
   align-content: center;
   }
   .form-inline-custom label{
   width: 25% !important;
   }
   .btn-grabar{
   background-color: #9B75A6 !important;
   color: #fff !important;
   padding: 10px 15px !important;
   font-size: 16px !important;
   }
   .form-check-input{
   margin-left: 0px !important;
   }
</style>
@section('content')
<div class="row">
   <div class="col-md-12">
      <h2 class="text-center">Edit User</h2>
      @if(Session::has('info'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
      @endforeach
      @endif
   </div>
</div>
<div class="row ">
   <div class="col-3"></div>
   <div class="col-6">
      <div class="card" style="">
         <div class="card-body">
            <form id="btn-submit"action="/save_changes" method="post">
               <input name="id" type="hidden" value="{{$edit_user->id}}">
               <div class="form-group">
                  <div class="form-group">
                     <label for="exampleInputEmail1">Username</label>
                     <input style="width: 100% !important;;" type="text" required class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username" name="username"  aria-describedby="emailHelp"value="{{$edit_user->username}}" placeholder="Name">
                  </div>
               </div>
               <div class="form-group container">
                  <label for="exampleInputEmail1">User Permissions</label>
                  <div class="row">
                     <div class="col-md-6">
                        <br>
                        <small>Trabajador </small> 
                        @if($edit_user->new_employee == 1)   
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="new_employee"checked>
                           <label class="form-check-label" for="flexCheckDefault">
                           nuevo Trabajador
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="new_employee">
                           <label class="form-check-label" for="flexCheckDefault">
                           nuevo Trabajador
                           </label>
                        </div>
                        @endif
                        @if($edit_user->list_employees == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="list_employees"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           listado Trabajador
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="list_employees">
                           <label class="form-check-label" for="flexCheckChecked">
                           listado Trabajador
                           </label>
                        </div>
                        @endif
                        @if($edit_user->history_employees == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="history_employees"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           histórico de Trabajadores
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="history_employees">
                           <label class="form-check-label" for="flexCheckChecked">
                           histórico de Trabajadores
                           </label>
                        </div>
                        @endif
                        <br>
                        <small>Asignar trabajador </small>
                        @if($edit_user->project_list == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="project_list"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           listado proyectos
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="project_list">
                           <label class="form-check-label" for="flexCheckChecked">
                           listado proyectos
                           </label>
                        </div>
                        @endif
                        @if($edit_user->production == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="production"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           producción
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="production">
                           <label class="form-check-label" for="flexCheckChecked">
                           producción
                           </label>
                        </div>
                        @endif
                        @if($edit_user->dedicated_time == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="dedicated_time"checked>
                           <label class="form-check-label" for="flexCheckDefault">
                           tiempos dedicados
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="dedicated_time">
                           <label class="form-check-label" for="flexCheckDefault">
                           tiempos dedicados
                           </label>
                        </div>
                        @endif
                     </div>
                     <div class="col-md-6">
                        <br>
                        <small>Equipo / Herramienta </small>
                        @if($edit_user->create_tool == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="create_tool"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           Crear Equipo / Herramienta
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="create_tool">
                           <label class="form-check-label" for="flexCheckChecked">
                           Crear Equipo / Herramienta
                           </label>
                        </div>
                        @endif
                        @if($edit_user->list_tools == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="list_tools"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           listado Equipo / Herramienta
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="list_tools">
                           <label class="form-check-label" for="flexCheckChecked">
                           listado Equipo / Herramienta
                           </label>
                        </div>
                        @endif
                        @if($edit_user->history_tools == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="history_tools"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           histórico Equipo
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="history_tools">
                           <label class="form-check-label" for="flexCheckChecked">
                           histórico Equipo
                           </label>
                        </div>
                        @endif
                        @if($edit_user->create_state == 1)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="create_state"checked>
                           <label class="form-check-label" for="flexCheckChecked">
                           estado, ubicacion, tipo
                           </label>
                        </div>
                        @else
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="create_state">
                           <label class="form-check-label" for="flexCheckChecked">
                           estado, ubicacion, tipo
                           </label>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="submit" id="action_button" class="btn btn-primary btn-block" value="Save Changes" />
                  <span
                     className="close cursor-pointer"
                     data-dismiss="modal"
                     aria-label="Close"
                     id="myModalClose"></span>
                  <input type="hidden" name="_token" value={{csrf_token()}}>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="col-3"></div>
</div>
@endsection
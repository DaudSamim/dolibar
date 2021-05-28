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
   .btn-primary{
    background-color: #9B75A6 !important;
    border: none !important;
    color: #fff;
   }
</style>
@section('content')
<div class="row">
   <div class="col-md-12">
      <h2 class="text-center">Users</h2>
      @if(Session::has('info'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
      @endif

      @if ($errors->any())
         @foreach ($errors->all() as $error)
             <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
         @endforeach
     @endif
      <div class="card p-2">
         <br>
         <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-3 pb-3 pr-5">
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">
               Add User
               </button>
              
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th style="background: gainsboro;">
                              <span>ID</span> <br>
                           </th>
                           <th style="background: gainsboro;">
                              <span>Name</span> <br>
                           </th>
                           <th style="background: gainsboro;">
                              <span>Created At</span> <br>
                           </th>
                           <th style="background: gainsboro;">
                              <span>Actions</span> <br>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @if(isset($view_users))
                        @foreach($view_users as $view_user)
                        <tr>
                           <td>{{$view_user->id}}</td>
                           <td>{{$view_user->username}}</td>
                           <td>{{$view_user->created_at}}</td>
                           <td>
                            <a href="{{'edit_user/'.$view_user->id}}"><button type="button" class=" btn btn-primary   text-white" name="create_record" id="create_product">
                              Edit
                              </button></a>
                               <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="{{'#exampleMod'.$view_user->id}}">
                              Delete
                              </button>
                              
               </div>
               </td>
               </tr>

               <div class="modal fade" id="{{'exampleMod'.$view_user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          Are you sure you want to DELETE user?
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="{{'delete_user/'.$view_user->id}}"><button type="button" class=" btn btn-danger   text-white" name="create_record" id="create_product">
                                          Delete
                                          </button></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
               @endforeach   
               @endif
               </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</div>


 <!-- Modal -->
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <form id="btn-submit"action="/add_user" method="post">
                              <div class="form-group ">
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input style="width: 100% !important;;" type="text" required class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username" name="username"  aria-describedby="emailHelp" placeholder="Name">
                                 </div>
                              </div>
                              <div class="form-group ">
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input style="width: 100% !important;;" type="password" required class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password"  aria-describedby="emailHelp" placeholder="Password">
                                 </div>
                                 <div class="form-group ">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input style="width: 100% !important;;" type="password" required class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="confirm_password"  aria-describedby="emailHelp" placeholder="Password">
                                 </div>
                              </div>

                               <div class="form-group  container">
                                 <label for="exampleInputEmail1">User Permissions</label>
                                 <div class="row mt-2">
                                    <div class="col-md-4">
                                
                                 <small>Trabajador </small>    
                                 <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="new_employee">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    nuevo Trabajador
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="list_employees">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    listado Trabajador
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="history_employees">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    histórico de Trabajadores
                                  </label>
                                </div>

                                
                                

                                   </div>
                                   <div class="col-md-4">
                                     
                                <small>Asignar trabajador </small>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="project_list">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    listado proyectos
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="production">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    producción
                                  </label>
                                </div>


                                 <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="dedicated_time">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    tiempos dedicados
                                  </label>
                                </div>

                                   </div>
                                   <div class="col-md-4">
                                
                            
                                <small>Equipo / Herramienta </small>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="create_tool">
                                  <label class="form-check-label" for="flexCheckChecked">
                                     Crear Equipo / Herramienta
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="list_tools">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    listado Equipo / Herramienta
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="history_tools">
                                  <label class="form-check-label" for="flexCheckChecked">
                                    histórico Equipo
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="create_state">
                                  <label class="form-check-label" for="flexCheckChecked">
                                     estado, ubicacion, tipo
                                  </label>
                                </div>

                             

                                   </div>
                                 </div>


                               </div>



                              <div class="modal-footer">
                                 
                                 <input type="submit" id="action_button" class="btn btn-primary btn-block" value="Add" />
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
               </div>
@endsection
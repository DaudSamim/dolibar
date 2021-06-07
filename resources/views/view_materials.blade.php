@extends('layout.app')
<style>
     table th{
   /* border-top: none !important;
   border-bottom: none !important; */
   
   text-align: center !important;
   }
   table td{
   /* border-top: none !important; */
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
</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        
        @if(Session::has('info'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
      @endforeach
      @endif
            
      <div class="card p-2">
        <div class="row">
            
                    <div class="col-md-12">
                                                <div class="table-responsive">
                                                <br>
                                                <h4 class="text-center">Material</h4>
                                                        <table class="table"id="table1">
                                                        
                                                        <br>
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Nombre de la fabrica</th>
                                                                    <th>Dimensiones</th>
                                                                    <th>Altura</th>
                                                                    <th>Ancho</th>
                                                                    <th>Larga</th>
                                                                    <th>Diámetro</th>
                                                                    <th>Profundidad</th>
                                                                    <th>Tipo de material</th>
                                                                    <th>Calidad de acabados</th>
                                                                    <th>Action</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($materials as $material)
                                                                <tr>
                                                                    <td>{{$material->id}}</td>
                                                                    <td>{{$material->manufacturer_name}}</td>
                                                                    <td>{{$material->dimension}}</td>
                                                                    <td>{{$material->height}}</td>
                                                                    <td>{{$material->width}}</td>
                                                                    <td>{{$material->length}}</td>
                                                                    <td>{{$material->diameter}}</td>
                                                                    <td>{{$material->depth}}</td>
                                                                    <td>{{$material->types_of_materials}}</td>
                                                                    <td>{{$material->quality_of_finishes}}</td>
                                                                    <td>
                                                                    
                                                                    <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="{{'#exampleMod'.$material->id}}">Delete</button>
                                                                    
                                                                    </td>
                                                            
                                                                </tr>

                                                                <div class="modal fade" id="{{'exampleMod'.$material->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                          <a href="{{'/delete/'.$material->id}}"><button type="button" class=" btn btn-danger   text-white" name="create_record" id="create_product">
                                          Delete
                                          </button></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                </div>

                        </div>
        </div>
        </div>
<br>
</div>
</div>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>


<script>
  $(document).ready(function() {
    $('#table1').DataTable({"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
        "iDisplayLength": 5,
        "order": [[ 0, "desc" ]]});
    
    
} );
 </script>
@endsection
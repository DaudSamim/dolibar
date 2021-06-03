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
                                                <h4 class="text-center">Tareas</h4>
                                                        <table class="table"id="table1">
                                                        
                                                        <br>
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Tasks</th>
                                                                    <th>Description</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($tasks as $task)
                                                                <tr>
                                                                    <td>{{$task->id}}</td>
                                                                    <td>{{$task->task}}</td>
                                                                    <td>{{$task->description}}</td>
                                                            
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                </div>

                        </div>
        </div>
        </div>
<br>
<div class="card p-2">
        <div class="row">
            
                    <div class="col-md-12">
                                                <div class="table-responsive">
                                                <br>
                                                <h4 class="text-center">Subtareas</h4>
                                                        <table class="table"id="table2">
                                                        
                                                        <br>
                                                            <thead>
                                                                <tr>
                                                                    <th>Id</th>
                                                                    <th>Tasks</th>
                                                                    <th>Subtasks</th>
                                                                    <th>Description</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($subtasks as $subtask)
                                                                <tr>
                                                            @php 
                                                            $task_name = DB::table('tasks')->where('id',$subtask->task_id)->first();
                                                            @endphp

                                                                    <td>{{$subtask->id}}</td>

                                                                    <td>
                                                                    @if(isset($task_name))
                                                                    {{$task_name->task}}
                                                                    @endif
                                                                    </td>
                                                                    <td>{{$subtask->subtasks}}</td>
                                                                    <td>{{$subtask->desciption}}</td>
                                                            
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                </div>

                        </div>
        </div>

</div>
</div>
</div>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>
  $(document).ready(function() {
    $('#table2').DataTable({"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
        "iDisplayLength": 5,
        "order": [[ 0, "desc" ]]});
} );
 </script>

<script>
  $(document).ready(function() {
    $('#table1').DataTable({"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
        "iDisplayLength": 5,
        "order": [[ 0, "desc" ]]});
    
    
} );
 </script>
@endsection
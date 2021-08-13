@extends('layout.app')
<style>
    .form-inline-custom {
        display: flex !important;
        align-items: flex-end !important;
        align-content: center;
    }

    .form-inline-custom label {
        width: 35% !important;
    }

    select {
        color: #495057 !important
    }

    .btn-grabar {
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
                <h6 class="card-title">Buscar producto para fabricar</h6>
                <form class="forms-sample" action="/product-to-be-manufactured" method="post" enctype='multipart/form-data'>
                    <div class="form-group form-inline-custom">
                        <label for="exampleInputUsername1">Producto a fabricar</label>
                        <select value="{{old('project_id')}}"
                            class="js-example-basic-single w-100 select2-hidden-accessible" id="project"
                            name="product_id" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            @php 
                                $count = count($search);
                            @endphp
                            @if($count > 0)
                            <option value="" data-select2-id="3">Select</option>
                            @foreach($search as $id)
                            @php
                            $name = DB::table('materials')->where('id',$id->product_manufacturing)->first();
                            @endphp
                            @if(isset($name))
                            <option value="{{$id->id}}" data-select2-id="3">{{$name->name}}</option>
                            @endif
                            @endforeach
                            @else 
                            <option value="" data-select2-id="3">No Product Available</option>
                            @endif

                        </select>
                    </div>
                    <div class="div-btns text-center">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                        <button type="submit" class="btn btn-grabar">Búsqueda</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <br>
                    <h4 class="text-center">Listado de productos</h4>
                    <table class="table" id="table1">
                        <br>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Product Name</th>
                                <th>Task Name</th>
                                <th>Project Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $size = count($get_product_id);
                            @endphp
                            @if($size > 0)
                        @foreach($get_product_id as $id)
                            @php
                                $name = DB::table('materials')->where('id',$id->product_manufacturing)->first();
                                $tasks = DB::table('project_task')->where('project_id',$id->id)->get();
                            @endphp
                            <tr>
                                <td>{{$id->id}}</td>
                                @if(isset($name))
                                <td>
                                {{$name->name}}
                                </td>
                                @else
                                <td>The material was deleted</td>
                                @endif
                                <td>
                                    @foreach($tasks as $task)
                                    <span>{{$task->task_number}})</span>
                                    <span>{{$task->task_name}}</span>
                                    <br>
                                    @endforeach

                                </td>
                                <td>
                                    {{$id->project}}
                                </td>
                            
                            </tr>
                        @endforeach
                        @else
                        <h4>No Product Available to show</h4>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

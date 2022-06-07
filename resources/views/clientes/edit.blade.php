@extends('layouts.app')

@section('title', $titulo .' | '.config('app.name'))

@section('style')

@endsection

@section('content')

<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Dashboard </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ url ('admin/clientes')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('admin/clientes')}}" class="kt-subheader__breadcrumbs-link">
                {{ $titulo }}</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                Crear </a>
            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">{{ $titulo }}</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form method="post" class="form-horizontal" action="{{ url('admin/clientes/'.$data->id.'/edit')}}" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body"> 
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo tercero </label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_tercero" id="tipo_tercero">
                                                @foreach ($clientes as $tercero)
                                                <option value="{{$tercero->id}}" @if($data->tipo_tercero==$tercero->id) selected @endif> {{ $tercero->opcion, $data->tipo_tercero }}</option>
                                                @endforeach 
                                                </select>
                                            </div>
                                        </div>                                  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre 1</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nombre1" name="nombre1" value="{{ old('nombre1', $data->nombre1) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre 2</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nombre2" name="nombre2" value="{{ old('nombre2', $data->nombre2) }}" required="">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Apellido 1</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="apellido1" name="apellido1" value="{{ old('apellido1', $data->apellido1) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Apellido 2</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="apellido2" name="apellido2" value="{{ old('apellido2', $data->apellido2) }}" required="">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo documento </label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_id" id="tipo_id">
                                                @foreach ($tipos as $tipo)
                                                <option value="{{$tipo->id}}" @if($data->tipo_id==$tipo->id) selected @endif> {{ $tipo->opcion, $data->tipo_id }}</option>
                                                @endforeach 
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">N° documento </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="n_documento" name="n_documento" value="{{ old('n_documento', $data->n_documento) }}" required="">
                                            </div>
                                        </div>                                 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Razón social </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ old('razonsocial', $data->razonsocial) }}" required="">
                                            </div>
                                        </div>    

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $data->email) }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Celular</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular', $data->celular) }}" required="">
                                            </div>
                                        </div>                                                                                        
                                    </div>
                                </div>    
                            </div>
                            <div class="col-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">  
                                    
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Teléfono 1</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono1" name="telefono1" value="{{ old('telefono1', $data->telefono1) }}" required="">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Teléfono 2</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono2" name="telefono2" value="{{ old('telefono2', $data->telefono2) }}" required="">
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Dirección </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $data->direccion) }}" required="">
                                            </div>
                                        </div>                                        

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Sitio web </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="sitioweb" name="sitioweb" value="{{ old('sitioweb', $data->sitioweb) }}" required="">
                                            </div>
                                        </div>                              

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Ciudad </label>
                                            <div class="col-9">
                                                <select class="form-control" name="ciudad_id" id="ciudad_id">
                                                @foreach ($ciudades as $ciudad)
                                                <option value="{{$ciudad->id}}" @if($data->ciudad_id==$ciudad->id) selected @endif> {{ $ciudad->nombre, $data->ciudad_id }}</option>
                                                @endforeach                                         
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Facebook</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="redsocial1" name="redsocial1" value="{{ old('redsocial1', $data->redsocial1) }}" required="">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Instagram</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="redsocial2" name="redsocial2" value="{{ old('redsocial2', $data->redsocial2) }}" required="">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Twitter</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="redsocial3" name="redsocial3" value="{{ old('redsocial3', $data->redsocial3) }}" required="">
                                            </div>
                                        </div>                                                       

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                                        <div class="kt-form__actions">
                                            @can('clientes.update')
                                            <button type="submit" class="btn btn-primary" name="enviar">Actualizar</button>
                                            @endcan
                                            <a href="{{ url ('admin/clientes')}}" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>

<!-- end:: Content -->

@endsection
    
@section('scripts')

@endsection

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
                <a href="{{ url ('admin/empresas')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('admin/empresas')}}" class="kt-subheader__breadcrumbs-link">
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
                    <form method="post" class="form-horizontal" action="{{ url('admin/empresas/store')}}" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">                                         

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Raz??n social </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo documento </label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_id" id="tipo_id">
                                                @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}"> {{ $tipo->opcion }}</option>
                                                @endforeach                                         
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">N?? documento </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="n_documento" name="n_documento" value="{{ old('n_documento') }}" required="">
                                            </div>
                                        </div>     

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Direcci??n </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tel??fono </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required="">
                                            </div>
                                        </div>                                                               
                                    </div>
                                </div>    
                            </div>
                            <div class="col-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">   

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required="">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Sitio web </label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="sitioweb" name="sitioweb" value="{{ old('sitioweb') }}" required="">
                                            </div>
                                        </div>                              

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Ciudad </label>
                                            <div class="col-9">
                                                <select class="form-control" name="ciudad_id" id="ciudad_id">
                                                @foreach ($ciudades as $ciudad)
                                                <option value="{{ $ciudad->id }}"> {{ $ciudad->nombre }}</option>
                                                @endforeach                                         
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Sector </label>
                                            <div class="col-9">
                                                <select class="form-control" name="sector_id" id="sector_id">
                                                @foreach ($sectores as $sector)
                                                <option value="{{ $sector->id }}"> {{ $sector->opcion }}</option>
                                                @endforeach                                         
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Im??gen</label>
                                            <div class="col-9">
                                            <input type="file" class="form-control-file" name="imagen" id="imagen">
                                            </div>
                                        </div>                                       

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                                        <div class="kt-form__actions">
                                            @can('empresas.create')
                                            <button type="submit" class="btn btn-primary" name="enviar">Crear</button>
                                            @endcan
                                            <a href="{{ url ('admin/empresas')}}" class="btn btn-secondary">Cancelar</a>
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

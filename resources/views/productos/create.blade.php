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
                <a href="{{ url ('admin/productos')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url ('admin/productos')}}" class="kt-subheader__breadcrumbs-link">
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
                    <form method="post" class="form-horizontal" action="{{ url('admin/productos/store')}}" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field()}}
                        <div class="row">
                            <div class="col-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body"> 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Tipo</label>
                                            <div class="col-9">
                                                <select class="form-control" name="tipo_producto" id="tipo_producto">
                                                @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}"> {{ $tipo->opcion }}</option>
                                                @endforeach                                         
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Categoría </label>
                                            <div class="col-9">
                                                <select class="form-control" name="categoria_id" id="categoria_id">
                                                @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"> {{ $categoria->nombre }}</option>
                                                @endforeach                                         
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Subcategoría </label>
                                            <div class="col-9">
                                                <select class="form-control" name="subcategoria_id" id="subcategoria_id">
                                                @foreach ($subcategorias as $sub)
                                                <option value="{{ $sub->id }}"> {{ $sub->nombre }}</option>
                                                @endforeach                                         
                                                </select>
                                            </div>
                                        </div>                                 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Nombre</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">EAN</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="ean" name="ean" value="{{ old('ean') }}" required="">
                                            </div>
                                        </div>  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">EAN 13</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="ean13" name="ean13" value="{{ old('ean13') }}" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Peso</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="peso" name="peso" value="{{ old('peso') }}" required="">
                                            </div>
                                        </div>                                       

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Costo estático</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="costoestadistico" name="costoestadistico" value="{{ old('costoestadistico') }}" required="">
                                            </div>
                                        </div>                                                                                        
                                    </div>
                                </div>    
                            </div>
                            <div class="col-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">  

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Largo</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="largo" name="largo" value="{{ old('largo') }}" required="">
                                            </div>
                                        </div>                                 

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Ancho</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="ancho" name="ancho" value="{{ old('ancho') }}" required="">
                                            </div>
                                        </div>    

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Alto</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="alto" name="alto" value="{{ old('alto') }}" required="">
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">SKU</label>
                                            <div class="col-9">
                                            <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}" required="">
                                            </div>
                                        </div>                                                                                           

                                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                                        <div class="kt-form__actions">
                                            @can('productos.create')
                                            <button type="submit" class="btn btn-primary" name="enviar">Crear</button>
                                            @endcan
                                            <a href="{{ url ('admin/productos')}}" class="btn btn-secondary">Cancelar</a>
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

<script type="text/javascript">
    $('#categoria_id').on('change', function(e){
    var empresa_id = {{ $empresa }};
    var categoria_id = e.target.value;

        $.get('http://localhost/mueblapp/public/api/subcategorias/' + empresa_id + '/' + categoria_id, function(data) {
            console.log(data);

            $('#subcategoria_id').empty();

            $.each(data, function(index, regenciesObj){
            $('#subcategoria_id').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.nombre +'</option>');
            })
        });
    });
</script>

@endsection

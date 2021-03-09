@extends('layouts.app')

@section('title',  $titulo  .' | '.config('app.name'))

@section('style')
<link href="{{ asset('assets/css/pages/tables/style.css')}}" rel="stylesheet" type="text/css" />
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
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                {{ $titulo }}</a>
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
@if (session('danger'))
    <div class="alert alert-danger fade show" role="alert">
        <div class="alert-text">{{ session('danger') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-like"></i></div>
        <div class="alert-text">{{ session('success') }}</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
@endif
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                   {{ $titulo }}
                </h3>
            </div>
            @can('terceros.create')
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ url ('admin/terceros/create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Crear
                        </a>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        <div class="kt-portlet__body">
            <div class="table-responsive">
            <!--begin: Datatable -->
             <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Tercero</th> 
                    <th>Nombre1</th> 
                    <th>Nombre2</th> 
                    <th>Apellido1</th> 
                    <th>Apellido2</th> 
                    <th>Tipo</th> 
                    <th>N° documento</th> 
                    <th>Razón social</th>
                    <th>Ciudad</th> 
                    <th>Dirección</th> 
                    <th>Teléfono1</th> 
                    <th>Teléfono2</th> 
                    <th>Celular</th> 
                    <th>Email</th>
                    <th>Web</th>                         
                    <th>RedSocial1</th>    
                    <th>RedSocial2</th>    
                    <th>RedSocial3</th>    
                    <th>Estado</th>
                    <th></th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Tercero</th> 
                    <th>Nombre1</th> 
                    <th>Nombre2</th> 
                    <th>Apellido1</th> 
                    <th>Apellido2</th> 
                    <th>Tipo</th> 
                    <th>N° documento</th> 
                    <th>Razón social</th>
                    <th>Ciudad</th> 
                    <th>Dirección</th> 
                    <th>Teléfono1</th> 
                    <th>Teléfono2</th> 
                    <th>Celular</th> 
                    <th>Email</th>
                    <th>Web</th>                         
                    <th>RedSocial1</th>    
                    <th>RedSocial2</th>    
                    <th>RedSocial3</th>    
                    <th>Estado</th>
                    <th></th>
                </tr>
                </tfoot>
                </table>
            </div>
            <!--end: Datatable -->
        </div>
    </div>
</div>

<!-- end:: Content -->
                        


@endsection

   
@section('scripts')

<script src="{{ asset('plugins/dataTables/datatables.min.js')}}"></script>

<!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
    $('.dataTables-example').DataTable({

        "serverSide":true,
        "ajax": "{{ route('terceros.datatable')}}",
        "columns":[
            {data: 'id'},
            {data: 'nom_tercero'},            
            {data: 'nombre1'},
            {data: 'nombre2'},
            {data: 'apellido1'},
            {data: 'apellido2'},
            {data: 'nom_tipo'},
            {data: 'n_documento'},            
            {data: 'razonsocial'},
            {data: 'nom_ciudad'},
            {data: 'direccion'},
            {data: 'telefono1'},
            {data: 'telefono2'},            
            {data: 'celular'},
            {data: 'email'},
            {data: 'sitioweb'},   
            {data: 'redsocial1'},
            {data: 'redsocial2'},
            {data: 'redsocial3'},

            {data: 'estado_elemento'},
            {data: 'btn'},
        ],


        "order": [[ 0 ,"asc" ]], //or asc 
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            //{ extend: 'copy'},
            //{extend: 'csv'},
            //{extend: 'excel', title: 'ExampleFile'},
            //{extend: 'pdf', title: 'ExampleFile'},

            /*{extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }*/
        ],
        "language":{
            "info": "_TOTAL_ registros",
            "search": "Buscar",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": 'Ver <select>'+
                        '<option value="10">10</option>'+
                        '<option value="30">30</option>'+
                        '<option value="-1">Todo</option>'+
                        '</select> registros | ',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "infoEmpty": "",
            "infoFiltered": ""
        }

    });

});

</script>
@endsection

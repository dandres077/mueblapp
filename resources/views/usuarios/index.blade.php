@extends('layouts.app')

@section('title', 'Usuarios'.' | '.config('app.name'))

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
                Crear</a>
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
                   Usuarios
                </h3>
            </div>
            @can('usuarios.create')
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ url ('admin/usuarios/create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
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
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Colegio</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $users)
                <tr class="gradeX">
                    <td>{{$users->id}}</td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->last}}</td>                     
                    <td>{{$users->email}}</td>
                    <td>{{$users->nom_colegio}}</td>
                    <td>                     
                    @can('usuarios.active')        
                    @if ($users->status==1)
                        <form method="post" action="{{ url('admin/usuarios/'.$users->id.'/inactive')}}">
                            {{ csrf_field() }}
                            <button type="submit" rel="tooltip" title="Cambiar" class="btn btn-warning btn-elevate btn-pill btn-elevate-air btn-sm"> Inactivar <i class="fa fa-repeat"></i></button>
                        </form>

                    @else
                        <form method="post" action="{{ url('admin/usuarios/'.$users->id.'/active')}}">
                            {{ csrf_field() }}
                            <button type="submit" rel="tooltip" title="Cambiar" class="btn btn-success btn-elevate btn-pill btn-elevate-air btn-sm"> Activar<i class="fa fa-repeat"></i></button>
                        </form>
                    @endif        
                    @endcan                
                    </td>
                    <td>
                    @can('usuarios.edit')
                        <a href="{{ url('admin/usuarios/'.$users->id.'/edit')}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                          <i class="la la-edit"></i>
                        </a>
                    @endcan
                    </td>
                </tr>
                @endforeach 
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Colegio</th>
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
        "order": [[ 2 ,"asc" ]], //or asc 
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
            "info": "_TOTAL_ records",
            "search": "Search",
            "paginate":{
                "next": "Next",
                "previous": "Previous",
            },
            "lengthMenu": 'Show <select>'+
                        '<option value="10">10</option>'+
                        '<option value="30">30</option>'+
                        '<option value="-1">All</option>'+
                        '</select> records | ',
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

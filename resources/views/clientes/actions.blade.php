<div class="dropdown dropdown-inline">
	<button type="button" class="btn btn-brand btn-elevate-hover btn-icon btn-sm btn-icon-md btn-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="flaticon-more-1"></i>
	</button>
	<div class="dropdown-menu dropdown-menu-right">
        @can('clientes.edit')
		<a class="dropdown-item" href="{{ url('admin/clientes/'.$id.'/edit')}}"><i class="la la-edit"></i>Editar</a>
		@endcan

		@can('clientes.destroy')
		<form method="post" action="{{ url('admin/clientes/'.$id)}}">
            @method('DELETE')
            {{ csrf_field() }}

            <button type="submit" type="button" class="dropdown-item"> <i class="la la-trash"></i>&nbsp;&nbsp;&nbsp;Eliminar</button>
        </form>  
        @endcan

        @if ($status==118)
            @can('clientes.inactive')
            <form method="post" action="{{ url('admin/clientes/'.$id.'/inactive')}}">
                {{ csrf_field() }}
                <button type="submit" type="button" class="dropdown-item"><i class="la la-info-circle"></i>&nbsp;&nbsp;&nbsp;Inactivar</button>
            </form>
            @endcan
        @else
            @can('clientes.active')
            <form method="post" action="{{ url('admin/clientes/'.$id.'/active')}}">
                {{ csrf_field() }}
                <button type="submit" type="button" class="dropdown-item"><i class="la la-info-circle"></i>&nbsp;&nbsp;&nbsp;Activar</button>
            </form>
            @endcan
        @endif

	</div>
</div>

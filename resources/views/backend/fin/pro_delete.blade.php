<div class="dropdown custom-dropdown">
    @if(auth()->user()->can('finpro-edit') || auth()->user()->can('finpro-delete'))
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="las la-cog"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
        @can('finpro-edit')
        <a class="dropdown-item" href="javascript:void(0);" onClick="editPro({{ $id }})">{{__('Edit')}}</a>
        @endcan
        @can('finpro-delete')
        <a class="dropdown-item" href="javascript:void(0);" onClick="deletePro({{ $id }})">{{__('Delete')}}</a>
        @endcan
    </div>
    @endif
    
</div>
<div class="dropdown custom-dropdown">
    @if(auth()->user()->can('finlav-edit') || auth()->user()->can('finlav-delete'))
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="las la-cog"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
        @can('finlav-edit')
        <a class="dropdown-item" href="javascript:void(0);" onClick="editLav({{ $id }})" data-toggle="modal" data-target="#lav_add">{{__('Edit')}}</a>
        @endcan
        @can('finlav-delete')
        <a class="dropdown-item" href="javascript:void(0);" onClick="deleteLav({{ $id }})">{{__('Delete')}}</a>
        @endcan
    @endif
        
    </div>
</div>
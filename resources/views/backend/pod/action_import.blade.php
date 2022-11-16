<div class="dropdown custom-dropdown">
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="las la-cog"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
        @can('pod-edit')
            <a class="dropdown-item" href="javascript:void(0);" onClick="editImport({{ $id }})">{{__('Edit')}}</a>    
        @endcan
        @can('pod-delete')
            <a class="dropdown-item" href="javascript:void(0);" onClick="deleteImport({{ $id }})">{{__('Delete')}}</a>
        @endcan            
        
    </div>
</div>
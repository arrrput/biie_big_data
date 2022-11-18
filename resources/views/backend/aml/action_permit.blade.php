<div class="dropdown custom-dropdown">
    @can('permit aml-manage')
        <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="las la-cog"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
            @can('permit aml-edit')
                <a class="dropdown-item" href="javascript:void(0);" onClick="editPermit({{ $id }})">{{__('Edit')}}</a>
            @endcan
            @can('permit aml-delete')
                <a class="dropdown-item" href="javascript:void(0);" onClick="deletePermit({{ $id }})">{{__('Delete')}}</a>            
            @endcan
    
        </div>
    @endcan
    
  </div>
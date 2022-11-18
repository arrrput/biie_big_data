<div class="dropdown custom-dropdown">
  @can('contract aml-manage')
  <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="las la-cog"></i>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
    @can('contract aml-edit')
        <a class="dropdown-item" href="javascript:void(0);" onClick="editIzin({{ $id }})">{{__('Edit')}}</a>
    @endcan  
    @can('contract aml-delete')
        <a class="dropdown-item" href="javascript:void(0);" onClick="deleteIzin({{ $id }})">{{__('Delete')}}</a>
    @endcan
    
  </div>
  @endcan
  
</div>
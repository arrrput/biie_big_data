<div class="dropdown custom-dropdown">
  <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="las la-cog"></i>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
      <a class="dropdown-item" href="javascript:void(0);" onClick="editTown({{ $id }})">{{__('Edit')}}</a>
      <a class="dropdown-item" href="javascript:void(0);" onClick="deleteTown({{ $id }})">{{__('Delete')}}</a>
  </div>
</div>
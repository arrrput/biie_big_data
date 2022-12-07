@if ($verify_hod == 0)
<div class="dropdown custom-dropdown">
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="las la-cog"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
        <a class="dropdown-item" href="javascript:void(0);" onClick="editReq({{ $id }})">{{__('Edit')}}</a>
        <a class="dropdown-item" href="javascript:void(0);" onClick="deleteReq({{ $id }})">{{__('Delete')}}</a>
    </div>
  </div>

@elseif ($verify_hod == 1)
<a class="font-20 text-warning" href="javascript:void(0);" onClick="viewReq({{ $id }})">
    <i class="las la-eye"></i>
</a>
@else
<a class="font-20 text-danger" >
    <i class="las la-ban"></i>
</a>
    
@endif

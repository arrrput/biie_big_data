<div class="dropdown custom-dropdown">
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="las la-cog"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
        <a class="dropdown-item" href="javascript:void(0);" onClick="editInc({{ $id }})" data-toggle="modal" data-target="#lav_add">{{__('Edit')}}</a>
        <a class="dropdown-item" href="javascript:void(0);" onClick="deleteInc({{ $id }})">{{__('Delete')}}</a>
    
        
    </div>
</div>
@if ($verify_user == '1')
<i class="las la-check-double text-primary"></i>
@elseif ($status==2)
<i class="las la-clock"></i>
@else
<a class="font-20 text-warning" href="javascript:void(0);" onClick="viewReq({{ $id }})">
    <i class="las la-eye"></i>
</a>
@endif

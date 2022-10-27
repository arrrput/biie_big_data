@php  
    $now = Carbon\Carbon::now();
    if($due_date > $now){
@endphp    
    @php $beda_hari = $now->diffInDays($due_date);  
    if ($beda_hari < 10){
        echo '<span class="badge  badge-danger text-center" > <i class="far fa-circle" style="padding: 1px;"> </i> </span>';
    }elseif ($beda_hari < 30) {
        echo '<span class="badge  badge-warning text-center" > <i class="far fa-circle" style="padding: 1px;"> </i> </span>';
    }else {
        echo '<span class="badge  badge-success text-center" > <i class="far fa-circle" style="padding: 1px;"> </i> </span>';
    }
    @endphp  
    
@php    }else { @endphp
    <span class="badge badge-primary">Done</span>
@php } @endphp


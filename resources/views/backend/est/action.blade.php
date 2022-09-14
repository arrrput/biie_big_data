
{{-- @php
    $download =  EstateDownload::select('*')->where('user_id',Auth::user()->id);
@endphp --}}

<a href="{{ route('estate.show', $kode_bangunan) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Show</a>

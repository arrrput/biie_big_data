@if ($document != '')
<a href="{{ route('aml.download_contract',$document) }}" class="btn bg-gradient-warning font-10  text-white">
    <i class="las la-download"></i>  Download
</a>    
@endif

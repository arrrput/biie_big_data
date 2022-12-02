<a @if ($document != null || $document != '')
    href="{{ route('ims.download.master',$document) }}"
@endif  class="btn btn-sm bg-gradient-warning font-10  text-white">
    <i class="las la-download"></i>  Download
</a>
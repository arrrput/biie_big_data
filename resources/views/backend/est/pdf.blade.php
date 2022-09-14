@extends('layouts.backend')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sg-12">
                <iframe src="{{ URL::asset('storage/file/'.$filename) }}"  style="width:1000px; height:800px;" frameborder="0">
                </iframe>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('prepend-script')
<script>
    $(function(){
        $('#download').hide();
        $('#download').hide();
        document.getElementById('download').style.visibility = 'hidden';
    });
    </script>
@endpush


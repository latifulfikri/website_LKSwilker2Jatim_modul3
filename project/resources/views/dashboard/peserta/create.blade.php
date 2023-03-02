@extends('../template')

@section('page-title', 'Beranda | Register Peserta')

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-md-6 card p-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h1><b>Registrasi Peserta</b></h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ url('/dashboard/peserta') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <peserta-create></peserta-create>
        </div>
    </div>
</div>
@endsection
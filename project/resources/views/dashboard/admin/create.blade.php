@extends('../template')

@section('page-title', 'Beranda | Register Admin')

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-md-6 card p-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h1><b>Registrasi Admin</b></h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <admin-create></admin-create>
        </div>
    </div>
</div>
@endsection
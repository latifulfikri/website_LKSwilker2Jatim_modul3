@extends('../template')

@section('page-title', 'Beranda | Tambah Vaksin Center')

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-md-6 card p-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h1><b>Tambah data vaksin center</b></h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ url('/dashboard/vac-center/') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <vac-center-create></vac-center-create>
        </div>
    </div>
</div>
@endsection
@extends('../template')

@section('page-title', 'Beranda')

@section('content')
<div class="container pt-4">
    <div class="row card p-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <h1><b>Data Admin</b></h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ url('/dashboard/admin/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah data</a>
                </div>
            </div>
            <admin-read></admin-read>
        </div>
    </div>
</div>
@endsection
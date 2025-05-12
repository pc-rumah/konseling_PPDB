@extends('dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card bg-info bg-gradient">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Forms</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('kelas.update', $kelas) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control" id="nama_kelas"
                                    aria-describedby="nama_kelas" value="{{ $kelas->nama_kelas }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

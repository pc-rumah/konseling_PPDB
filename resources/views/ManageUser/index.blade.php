@extends('dashboard')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h4>Kelola Data User</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card  bg-info bg-gradient">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <div class="row">
                            <div class="col-lg-8">
                                <a href="{{ route('muser.create') }}" type="button" class="btn btn-light">Tambah
                                    Data</a>
                            </div>
                            <div class="col-lg-4">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                @if ($errors->any())
                                    <div class="div div-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="card">
                            <div class="card-body">
                                <!-- Default Table -->
                                <table class="table">
                                    <thead>
                                        <tr class="bg-info bg-gradient bg-opacity-75 text-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    @if ($item->trashed())
                                                        <!-- Perhatikan $user di sini -->
                                                        <span class="badge bg-danger">Terhapus</span>
                                                    @elseif(!$item->is_active)
                                                        <span class="badge bg-warning">Nonaktif</span>
                                                    @else
                                                        <span class="badge bg-success">Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->hasRole('admin'))
                                                        Admin
                                                    @elseif ($item->hasRole('guru_bk'))
                                                        Guru BK
                                                    @elseif ($item->hasRole('siswa'))
                                                        Siswa
                                                    @elseif ($item->hasRole('wali_kelas'))
                                                        Wali Kelas
                                                    @endif
                                                <td class="d-flex gap-2">
                                                    @if ($item->is_active)
                                                        <form action="{{ route('muser.deactivate', $item) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn btn-danger">Nonaktifkan</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('muser.reactivate', $item) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success">Aktifkan</button>
                                                        </form>
                                                    @endif
                                                    <a href="{{ route('muser.edit', $item) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#alert-hapus-kategori{{ $item->id }}">
                                                        Delete
                                                    </button>
                                                    <!-- Modal delete foto -->
                                                    @if (isset($item))
                                                        <div class="modal fade" id="alert-hapus-kategori{{ $item->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="confirmDeleteModal{{ $item->id }}Label"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="confirmDeleteModal{{ $item->id }}Label">
                                                                            Konfirmasi Hapus Data</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus
                                                                        Data
                                                                        ini?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <form id="deleteForm{{ $item->id }}"
                                                                            action="{{ route('muser.destroy', $item->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Hapus</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!-- End Default Table Example -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

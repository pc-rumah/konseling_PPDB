@extends('dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card bg-info bg-gradient">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Forms</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('muser.store') }}" id="userForm">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-control" id="role" required>
                                    <option value="">Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="guru_bk">Guru BK</option>
                                    <option value="wali_kelas">Wali Kelas</option>
                                    <option value="siswa">Siswa</option>
                                </select>
                            </div>

                            <!-- Dynamic Field: Kelas (Hanya untuk Siswa/Wali Kelas) -->
                            <div class="mb-3" id="kelasField" style="display: none;">
                                <label for="kelas_id" class="form-label">Kelas</label>
                                <select name="kelas_id" class="form-control" id="kelas_id">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <script>
                            // Tampilkan field sesuai role yang dipilih
                            document.getElementById('role').addEventListener('change', function() {
                                const role = this.value;
                                const kelasField = document.getElementById('kelasField');

                                kelasField.style.display = 'none';

                                if (role === 'siswa') {
                                    kelasField.style.display = 'block';
                                } else if (role === 'wali_kelas') {
                                    kelasField.style.display = 'block';
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

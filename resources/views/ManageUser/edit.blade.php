@extends('dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card bg-info bg-gradient">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Forms</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('muser.update', $user) }}" id="userForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $user->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-control" id="roleSelect" required>
                                    <option value="">Pilih Role</option>
                                    <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                                    <option value="guru_bk" {{ $user->hasRole('guru_bk') ? 'selected' : '' }}>Guru BK
                                    </option>
                                    <option value="wali_kelas" {{ $user->hasRole('wali_kelas') ? 'selected' : '' }}>Wali
                                        Kelas</option>
                                    <option value="siswa" {{ $user->hasRole('siswa') ? 'selected' : '' }}>Siswa</option>
                                </select>
                            </div>

                            <!-- Input Kelas (Selalu Tampil Tapi Conditional Disabled) -->
                            <div class="mb-3">
                                <label for="kelas_id" class="form-label">Kelas</label>
                                <select name="kelas_id" class="form-control" id="kelasSelect"
                                    {{ $user->hasRole('siswa') || $user->hasRole('wali_kelas') ? '' : 'disabled' }}>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}"
                                            {{ $user->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                                            {{ $kelasItem->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <script>
                            // Conditional Disabled berdasarkan Role
                            document.getElementById('roleSelect').addEventListener('change', function() {
                                const selectedRole = this.value;
                                const kelasSelect = document.getElementById('kelasSelect');

                                // Enable hanya untuk siswa dan wali kelas
                                if (selectedRole === 'siswa' || selectedRole === 'wali_kelas') {
                                    kelasSelect.disabled = false;
                                    kelasSelect.required = true; // Tambah validasi jika perlu
                                } else {
                                    kelasSelect.disabled = true;
                                    kelasSelect.required = false;
                                    kelasSelect.value = ''; // Kosongkan nilai jika non-siswa/wali
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

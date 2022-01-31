<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="formInputModal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Tambah Data User</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="user" method="POST">
                                    @csrf
                                    <div id="method"></div>
                                    <div class="card-body">
                                        <input type="hidden" id="id" name="id">
                                            <div class="form-group mb3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input class="form-control  @error ('name') is-invalid @enderror" name="name" type="text" placeholder="your name">
                                                @error ('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb3">
                                                <label for="username" class="form-label">Username</label>
                                                <input class="form-control  @error ('username') is-invalid @enderror" name="username" type="text" placeholder="username">
                                                @error ('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb3">
                                                <label for="password" class="form-label">Password</label>
                                                <input class="form-control  @error ('password') is-invalid @enderror" name="password" type="password" placeholder="password">
                                                @error ('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb3">
                                                <label for="id_outlet" class="form-label">ID Outlet</label>
                                                <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="id_outlet" name="id_outlet">
                                                    <option selected>Pilih Outlet</option>
                                                    @foreach ($outlet as $o )
                                                    <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group mb3">
                                                <label for="role" class="form-label">Role</label>
                                                <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="role" name="role">
                                                    <option>Masuk Sebagai</option>
                                                    <option name="role" value="admin">Administrator</option>
                                                    <option name="role" value="kasir">Kasir</option>
                                                    <option name="role" value="owner">Owner</option>
                                                    </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-submit" class="btn btn-info">Tambah User</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->
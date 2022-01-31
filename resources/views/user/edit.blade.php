<div class="row">
    <div class="col-md-6">
        <div class="card">
                <!-- Info Header Modal -->
                <div id="formEditModal{{ $u->id }}" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="info-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel">Tambah Data Pengguna</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('user.update',$u->id) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div id="method"></div>
                                    <div class="card-body">
                                        <input type="hidden" id="id" name="id">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" id="name" name="name" value="{{ $u->name }}" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" id="username" name="username" value="{{ $u->username }}" class="form-control" placeholder="Username" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="text" id="password" name="password" value="{{ $u->password }}" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group mb3">
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="id_outlet" name="id_outlet">
                                                <option selected>{{ $u->id_outlet }}</option>
                                                @foreach ($outlet as $o )
                                                <option value="{{ $o->id }}">{{ $o->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb3">
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" id="role" name="role">
                                                <option>{{ $u->role }}</option>
                                                <option name="role" value="admin">Administrator</option>
                                                <option name="role" value="kasir">Kasir</option>
                                                <option name="role" value="owner">Owner</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-submit" class="btn btn-info">Edit Outlet</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->
<?php include 'partial/header.php'; ?>
<div class="container-fluid mt-5">
   <div class="row">
        <div class="col-lg-12">
            <header class="py-2">
                <h1 class="text-center">Data user</h1>
                <div class="text-end">
                    <button id="addBtn" class="btn btn-primary">Tambah Data</button>
                </div>
            </header>    
            <table id="tabel_user" class="table table-bordered w-100">
                <thead>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>         
</div>
<!-- modal -->
 <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalAddLabel">Tambah Data User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-dismiss="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form id="userForm">
                <input type="hidden" name="userId" id="userId">
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                    <div class="mb-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="simpanBtn" class="btn btn-primary">Simpan Data</button>
                    <button type="button" id="ubahBtn" class="btn btn-primary">Ubah Data</button>
            </div>
               </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabel_user').DataTable();

        tampil_data();

        $('#addBtn').click(function() {
            $('#ModalAddLabel').text('Tambah Data User');
            $('#ModalAdd').modal('show');
            $('#userForm')[0].reset();
            $('#simpanBtn').show();
            $('#ubahBtn').hide();
    });

    $('#simpanBtn').click(function(e) {
        var username = $('#username').val();
        var password = $('#password').val();
        e.preventDefault();
        if (username && password) {
            $.ajax({
                type: "POST",
                url: "user/add.php",
                data: $('#userForm').serialize(),
                success: function() {
                    $('#ModalAdd').modal('hide');
                    tampil_data();
                    alert('Data berhasil disimpan');
                },
                error: function() {
                    alert('Gagal Menyimpan Data');
                }
            });
        } else {
            alert('Semua Field Harus Diisi!')
        }
    });
     
    $('#tabel_user').on('click', '.editBtn', function() {
        var userId = $(this).data('id');
        $.ajax({
            url: "user/get.php",
            type: "GET",
            data: {
                userId: userId
            },
            success: function(data) {
                var user = JSON.parse(data);
                $('#userId').val(user.user_id);
                $('#username').val(user.username);
                $('#password').val(user.password);
                $('#ModalAddLabel').text('Edit Data User');
                $('#ModalAdd').modal('show');
                $('#simpanBtn').hide();
                $('#ubahBtn').show();
            }
        });
    });

    $('#ubahBtn').click(function(e) {
        e.preventDefault();
        var userId = $('#userId').val();
        var username = $('#username').val();
        var password = $('#password').val();   
        if (userId && username && password) {
            $.ajax({
                url: "user/update.php",
                type: "POST",
                data: $('#userForm').serialize(),
                success: function() {
                    $('#ModalAdd').modal('hide');
                    tampil_data();
                    alert('Data berhasil diubah');
                },
                error: function() {
                    alert('Gagal Mengubah Data');
                }
            });
        } else {
            alert('Semua Field Harus Diisi!')
        }
    });

    $('#tabel_user').on('click', '.deleteBtn', function() {
        var userId = $(this).data('id');
        if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: "user/delete.php",
                type: "POST",
                data: {
                    userId: userId
                },
                success: function(response) {
                    tampil_data();
                    alert('Data Berhasil Dihapus');
                },
                error: function() {
                    alert('Gagal Menghapus Data');  
                }
            });
        }
    });

    function tampil_data() {
        $.ajax({
            type: "GET",
            url: "user/read.php",
            success: function(data) {
                $('#tabel_user tbody').html(data);
            }
        })
     }
});
</script>
<?php include 'partial/footer.php'; ?>
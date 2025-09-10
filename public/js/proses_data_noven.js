// =============== PROFIL KATEGORI START ===============
function tambah_data_profilkat(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Profil Kategori');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-profilkategori/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_profilkat(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Profil Kategori');
    $(modal + 'Isi').html(loading);

    $.get('/admin/data-profilkategori/' + id + '/edit', { _token: token }, function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function(xhr) {
        $(modal + 'Isi').html('<div class="text-danger">Terjadi kesalahan saat memuat data!</div>');
        console.error(xhr.responseText);
    });
}


function hapus_data_profilkat(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/data-profilkategori/' + id,
                type: 'DELETE',
                data: { _token: token },
                success: function(data) {
                    Swal.fire('Dihapus!', 'Data Berhasil Dihapus!', 'success')
                        .then(() => location.reload());
                },
                error: function(xhr){
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        }
    });
}

// =============== PROFIL KATEGORI END ===============

// =============== PROFIL DATA START ===============
function tambah_data_profildata(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Profil Data');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-profildata/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_profildata(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Profil Kategori');
    $(modal + 'Isi').html(loading);

    var act = '/admin/data-profildata/edit?id=' + id; // query string
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function(xhr){
        $(modal + 'Isi').html('<div class="text-danger">Terjadi kesalahan: ' + xhr.status + '</div>');
    });
}



function hapus_data_profildata(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-profildata/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}
// =============== PROFIL DATA END ===============

// =============== DATA SLIDER START ===============
function tambah_data_slider(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Slider');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data_slider/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_slider(id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Slider');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data_slider/' + id + '/edit';
    $.get(act, function (data) {
        $(modal + 'Isi').html(data);
    });
}

function hapus_data_slider(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data_slider/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}
// =============== DATA SLIDER END ===============

// =============== DATA VIDEO START ===============
function tambah_data_video(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Video');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-video/create';
    $.get(act, function (data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_video(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Video');
    $(modal + 'Isi').html('Loading...');
    var act = '/admin/data-video/' + id + '/edit';
    $.get(act)
        .done(function(data) {
            $(modal + 'Isi').html(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat data: ' + errorThrown + '</div>');
            console.error('Error loading edit form:', textStatus, errorThrown);
        });
}

function hapus_data_video(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-video/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}
// =============== DATA VIDEO END ===============

// =============== DATA GALERI FOTO START ===============
function tambah_data_galerifoto(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Galeri Foto');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-galerifoto/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_galerifoto(token, id, modal) {
    var act = event.currentTarget.getAttribute('data-url'); // ambil dari tombol

    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Foto');
    $(modal + 'Isi').html(loading);

    $.post(act, { _token: token, id: id })
        .done(function (data) {
            $(modal + 'Isi').html(data);
        })
        .fail(function(xhr) {
            $(modal + 'Isi').html("<div class='alert alert-danger'>Error: " + xhr.responseText + "</div>");
        });
}



function hapus_data_galerifoto(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-galerifoto/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}
// =============== DATA GALERI FOTO END ===============

// =============== DATA FOTO START ===============
function tambah_data_foto(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Foto');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-foto/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_foto(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Foto');
    $(modal + 'Isi').html('<div class="text-center">Loading...</div>');

    $.get('/admin/data-foto/edit/' + id, function(data){
        $(modal + 'Isi').html(data);
    }).fail(function(xhr){
        $(modal + 'Isi').html(
            "<div class='alert alert-danger'>Error: " + xhr.responseText + "</div>"
        );
    });
}


function hapus_data_foto(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-foto/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}

// =============== DATA FOTO END ===============

// =============== BG MENU START ===============
function ubah_data_bgmenu(token, id, modal) {
    // Tampilkan modal
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Background Menu');
    $(modal + 'Isi').html('<div class="text-center">Loading...</div>');

    // URL untuk edit, pastikan route GET
    var act = '/admin/data-bgmenu/' + id + '/edit';

    $.ajax({
        url: act,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function(data) {
            // Muat form edit ke modal
            $(modal + 'Isi').html(data);
        },
        error: function(xhr, status, error) {
            console.error(error);
            $(modal + 'Isi').html('<div class="text-danger text-center">Terjadi kesalahan. Silakan coba lagi.</div>');
        }
    });
}
// =============== BG MENU END ===============

// =============== DATA PENGUMUMAN START ===============
function tambah_data_pengumuman(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Pengumuman');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-pengumuman/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_pengumuman(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Pengumuman');
    $(modal + 'Isi').html(loading);

    $.ajax({
        url: '/admin/data-pengumuman/edit', // <-- koma di sini penting
        type: 'POST',
        data: {
            _token: token,
            id: id
        },
        success: function (data) {
            $(modal + 'Isi').html(data);
        },
        error: function (xhr) {
            $(modal + 'Isi').html('<p style="color:red;">Gagal memuat data!</p>');
            console.error('Error status:', xhr.status);
            console.error('Error detail:', xhr.responseText);
        }
    });
}



function hapus_data_pengumuman(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-pengumuman/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}
// =============== DATA PENGUMUMAN END ===============

// =============== DATA BERITA START ===============
function tambah_data_berita(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Berita');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-berita/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_berita(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Berita');
    $(modal + 'Isi').html('<p>Loading...</p>'); // bisa diganti animasi loading

    var act = '/admin/data-berita/' + id + '/edit'; // URL sesuai route GET

    $.get(act, function (data) {
        $(modal + 'Isi').html(data); // masukkan HTML dari controller
    }).fail(function (xhr) {
        $(modal + 'Isi').html('<p class="text-danger">Gagal memuat data. ' + xhr.status + '</p>');
    });
}


function hapus_data_berita(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-berita/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}
// =============== DATA BERITA END ===============

// =============== DATA KOMENTAR START ===============
function ubah_status_komen(token, id) {
    Swal.fire({
        title: 'Ubah Status Data?',
        text: "Status data akan berubah",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Ya, Ubah!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-komentar/' + id + '/ubah', {_token: token})
            .done(function(data) {
                Swal.fire(
                    'Data Berhasil Diubah!',
                    '',
                    'success'
                ).then(() => {
                    location.reload();
                });
            })
            .fail(function() {
                Swal.fire(
                    'Terjadi Kesalahan!',
                    '',
                    'error'
                );
            });
        }
    });
}

function hapus_data_komen(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Komentar?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-komentar/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Komentar Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus komentar.',
                        'error'
                    );
                });
        }
    });
}

// =============== DATA SOSMED START ===============
function tambah_data_sosmed(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Sosial Media');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-sosmed/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_sosmed(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Sosial Media');
    $(modal + 'Isi').html('<div class="text-center py-4"><i class="fa fa-spinner fa-spin fa-2x"></i></div>');

    $.get('/admin/data-sosmed/' + id + '/edit')
        .done(function(data) {
            $(modal + 'Isi').html(data);

            // Handle form submission
            $('#formEditSosmed').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function() {
                        // Redirect setelah update
                        window.location.href = "{{ route('sosmed.index') }}";
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });
        })
        .fail(function() {
            $(modal + 'Isi').html(
                '<div class="alert alert-danger">Gagal memuat form</div>'
            );
        });
}

function hapus_data_sosmed(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-sosmed/' + id + '/delete', { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}
// =============== DATA SOSMED END ===============


// =============== DATA PPRG START ===============
function tambah_data_pprg(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data PPRG');
    $(modal + 'Isi').html(loading);
    var act = '/admin/pprg/create';
    $.post(act, {
        _token: token
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_pprg(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Link');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-link_linkbypass/edit';
    $.post(act, {
        _token: token,
        id: id
    },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_data_pprg(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/hapus_pprg/' + id, { _token: token })
                .done(function() {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .fail(function() {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                });
        }
    });
}

// =============== DATA PPRG END ===============


// =============== DATA LINK TERKAIT START ===============
function tambah_data_linkterkait(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Link');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-link_linkterkait/create';
    $.get(act, function (data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_linkterkait(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Link');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-link_linkterkait/' + id + '/edit';
    $.get(act, function (data) {
        $(modal + 'Isi').html(data);
    });
}
function hapus_data_linkterkait(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-link_linkterkait/' + id + '/delete', { _token: token }, function(data) {
                Swal.fire(
                    'Dihapus!',
                    'Data Berhasil Dihapus!',
                    'success'
                ).then(() => {
                    location.reload();
                });
            }).fail(() => {
                Swal.fire(
                    'Gagal!',
                    'Terjadi kesalahan saat menghapus data.',
                    'error'
                );
            });
        }
    });
}



// =============== DATA LINK TERKAIT END ===============

// =============== DATA LINK BYPASS START ===============
function tambah_data_linkbypass(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Link');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-link_linkbypass/create';
    $.get(act, function (data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_linkbypass(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Link');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-link_linkbypass/' + id + '/edit';
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    });
}


function hapus_data_linkbypass(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('/admin/data-link_linkbypass/' + id + '/delete', { _token: token }, function(data) {
                Swal.fire(
                    'Dihapus!',
                    'Data Berhasil Dihapus!',
                    'success'
                ).then(() => {
                    location.reload();
                });
            }).fail(() => {
                Swal.fire(
                    'Gagal!',
                    'Terjadi kesalahan saat menghapus data.',
                    'error'
                );
            });
        }
    });
}


// =============== DATA LINK BYPASS END ===============
// Handle form submit untuk tambah dan edit
$(document).on('submit', '#formPolicybrief', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    var url = $(this).attr('action');
    var method = $(this).attr('method');

    $.ajax({
        url: url,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.status === 'success') {
                $('#modalPolicybrief').modal('hide');
                Swal.fire('Berhasil!', response.message, 'success')
                    .then(() => location.reload());
            } else {
                Swal.fire('Error!', response.message, 'error');
            }
        },
        error: function(xhr) {
            Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data.', 'error');
        }
    });
});

// =============== DATA POLICYBRIEF START ===============
// Tambah Data
function tambah_data_policybrief(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Policy Brief');
    $(modal + 'Isi').html(loading);

    $.get('/admin/policybrief/create', function (data) {
        $(modal + 'Isi').html(data);
    }).fail(() => {
        $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat form.</div>');
    });
}

// Ubah Data
function ubah_data_policybrief(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Policy Brief');
    $(modal + 'Isi').html(loading);

    $.get('/admin/policybrief/edit/' + id, function (data) {
        $(modal + 'Isi').html(data);
    }).fail(() => {
        $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat form.</div>');
    });
}

// Hapus Data
function hapus_data_policybrief(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/policybrief/delete/' + id,   // ✅ Sesuai route
                type: 'POST',
                data: {
                    _token: token,
                    _method: 'DELETE'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire('Dihapus!', response.message, 'success')
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                }
            });
        }
    });
}

// =============== DATA POLICYBRIEF END ===============

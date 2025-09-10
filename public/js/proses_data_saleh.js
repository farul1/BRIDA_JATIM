// --- START DATA BIDANG ---
function tambah_data_bidang(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data bidang');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-bidang/create';
    $.post(act, {
            _token: token
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_bidang(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data bidang');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-bidang/edit';
    $.post(act, {
            _token: token,
            id: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_data_bidang(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/data-bidang/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

// --- END DATA BIDANG ---

// --- START DATA USER diblade master ---

function tambah_data_user(modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data User');
    $(modal + 'Isi').html(loading);
    $.get('/admin/data-user/create', function(data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_user(id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data User');
    $(modal + 'Isi').html(loading);
    $.get('/admin/data-user/edit/' + id, function(data) {
        $(modal + 'Isi').html(data);
    });
}

function hapus_data_user(token, id) {
    console.log("fungsi hapus_data_user terpanggil, id:", id); // debug
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data User?',
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
                url: '/admin/data-user/' + id,
                type: 'DELETE',
                data: { _token: token },
                success: function(response) {
                    Swal.fire(
                        'Dihapus!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data.',
                        'error'
                    );
                }
            });
        }
    });
}




// --- END DATA USER ---


// --- START DATA PEJABAT ---
    function tambah_data_pejabat(modal) {
        $(modal).modal('show');
        $(modal + 'Label').html('Tambah Data Pejabat');
        $(modal + 'Isi').html(loading);

        $.get('/admin/data-pejabat/create')
            .done(function(data) {
                $(modal + 'Isi').html(data);
            })
            .fail(function() {
                $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat data.</div>');
            });
    }

    function ubah_data_pejabat(id, modal) {
        $(modal).modal('show');
        $(modal + 'Label').html('Ubah Data Pejabat');
        $(modal + 'Isi').html(loading);

        $.get('/admin/data-pejabat/edit/' + id)
            .done(function(data) {
                $(modal + 'Isi').html(data);
            })
            .fail(function() {
                $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat data.</div>');
            });
    }
function hapus_data_pejabat(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data Pejabat?',
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak!',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return fetch('/admin/data-pejabat/delete/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error(response.statusText)
                return response.json()
            })
            .catch(error => {
                Swal.showValidationMessage(`Gagal menghapus data: ${error}`)
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Terhapus!',
                'Data berhasil dihapus.',
                'success'
            ).then(() => location.reload());
        }
    });
}

// --- END DATA PEJABAT ---


// --- START DATA SUB BIDANG ---
function tambah_data_subbidang(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Sub Bidang');
    $(modal + 'Isi').html('<div class="text-center">Loading...</div>');

    $.get('/admin/data-subbidang/create', {_token: token}, function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function(xhr){
        $(modal + 'Isi').html('<div class="text-danger">Terjadi kesalahan: ' + xhr.status + '</div>');
        console.error(xhr.responseText);
    });
}

function ubah_data_subbidang(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Sub Bidang');
    $(modal + 'Isi').html('<div class="text-center">Loading...</div>');

    var act = '/admin/data-subbidang/' + id + '/edit';
    $.get(act, {_token: token}, function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function(xhr){
        $(modal + 'Isi').html('<div class="text-danger">Terjadi kesalahan: ' + xhr.status + '</div>');
        console.error(xhr.responseText);
    });
}
function hapus_data_subbidang(token, id) {
    Swal.fire({
        title: "Yakin Ingin Menghapus Data Sub Bidang?",
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            var act = '/admin/data-subbidang/' + id + '/delete';
            $.post(act, {_token: token}, function(data) {
                Swal.fire("Berhasil!", "Data berhasil dihapus.", "success")
                .then(() => location.reload());
            }).fail(function(xhr){
                Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus data.", "error");
                console.error(xhr.responseText);
            });
        }
    });
}


// --- END DATA SUB BIDANG ---


// --- START DATA JUDUL ---
function tambah_data_judul(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Judul');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-judul/create';
    $.post(act, {
            _token: token
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_judul(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Judul');
    $(modal + 'Isi').html(loading);

    var act = '/admin/data-judul/' + id + '/edit'; // GET dengan parameter ID
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);

        // Load subbidang sesuai id_bidang yang dipilih
        var form_id = '#frmEditJudul';
        var id_bidang = $(form_id).find('select[name="id_bidang"]').val();
        $.post('/admin/data-judul/div_subbidang', {
            _token: token,
            id_bidang: id_bidang
        }, function(sub_data) {
            var id_subbidang = $(form_id).data('id-subbidang'); // ambil id_subbidang dari data attribute
            $('#sub_bidang_id').html(sub_data);
            $('#sub_bidang_id').val(id_subbidang).prop('disabled', false);
        });
    });
}

function hapus_data_judul(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data Judul?',
        text: "Jika dihapus data akan Sepenuhnya Hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/data-judul/' + id,
                type: 'DELETE',
                data: {_token: token},
                success: function(data) {
                    Swal.fire(
                        'Berhasil!',
                        'Data Berhasil Dihapus!',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr){
                    Swal.fire('Error', 'Terjadi kesalahan!', 'error');
                }
            });
        }
    });
}


function div_subbidang(token, target, form_id) {
    var id_bidang = $(form_id).find('select[name="id_bidang"]').val(); // cukup .val()
    var act = '/admin/data-judul/div_subbidang';

    var sub_select = $(form_id).find('#sub_bidang_id');
    sub_select.html('<option value="">Waiting Data ...</option>');

    $.post(act, {
        _token: token,
        id_bidang: id_bidang
    }, function(data) {
        sub_select.prop("disabled", false);
        sub_select.html(data);
        sub_select.trigger('change');
    }).fail(function(xhr){
        console.error('Gagal load subbidang:', xhr.responseText);
        sub_select.html('<option value="">Gagal load data</option>');
    });
}


// --- END DATA JUDUL ---

// --- START DATA KATEGORI SAKIP ---
function tambah_data_sakip_kategori(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data sakip_kategori');
    $(modal + 'Isi').html(loading);
    var act = '/admin/sakip_kategori/create';
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_sakip_kategori(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Kategori Sakip');
    $(modal + 'Isi').html(loading);
    var act = '/admin/sakip_kategori/' + id + '/edit';
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    });
}

function hapus_data_sakip_kategori(id) {
    Swal.fire({
        title: "Yakin Ingin Menghapus Data?",
        text: "Jika dihapus data akan Sepenuhnya Hilang",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/sakip_kategori/' + id,
                type: 'DELETE', // langsung DELETE
                success: function(data) {
                    Swal.fire("Sukses!", "Data berhasil dihapus.", "success")
                        .then(() => location.reload());
                },
                error: function(xhr) {
                    console.error(xhr.status, xhr.responseText);
                    Swal.fire("Error!", "Gagal hapus: " + xhr.status, "error");
                }
            });
        }
    });
}





// --- END DATA KATEGORI SAKIP ---


// --- START DATA DATA SAKIP ---
function tambah_data_sakip_data(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Sakip Data');
    $(modal + 'Isi').html(loading);

    var act = '/admin/sakip_data/create';

    // Gunakan GET, karena route Laravel kamu menggunakan GET
    $.get(act, { _token: token }, function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function(xhr) {
        $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat data: ' + xhr.status + '</div>');
    });
}



function ubah_data_sakip_data(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Sakip');
    $(modal + 'Isi').html(loading);

    var act = '/admin/sakip_data/' + id + '/edit';

    // Gunakan GET, sesuaikan URL dengan route Laravel
    $.get(act, { _token: token }, function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function(xhr) {
        $(modal + 'Isi').html('<div class="alert alert-danger">Gagal memuat data: ' + xhr.status + '</div>');
    });
}

function hapus_data_sakip_data(id) {
    Swal.fire({
        title: "Yakin Ingin Menghapus Data?",
        text: "Jika dihapus data akan sepenuhnya hilang",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak!",
        showLoaderOnConfirm: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/sakip_data/delete/' + id,
                type: 'POST', // route-mu tetap POST
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content') // token otomatis
                },
                success: function(data) {
                    Swal.fire("Sukses!", "Data berhasil dihapus.", "success")
                        .then(() => location.reload());
                },
                error: function(xhr) {
                    Swal.fire("Error!", "Gagal hapus. Status: " + xhr.status, "error");
                }
            });
        }
    });
}


// --- END DATA DATA SAKIP ---

// --- START LOGO HEADER ---
function ubah_data_logo_header(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Logo Header');
    $(modal + 'Isi').html(loading);
    var act = '/admin/logo_header/edit';
    $.post(act, {
        _token: token,
        id: id
    }, function(data) {
        $(modal + 'Isi').html(data);
    });
}

// --- END LOGO HEADER


// --- START DATA KATEGORI BRIDA ---
function tambah_data_brida_kategori(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Brida Kategori');
    $(modal + 'Isi').html(loading);
    var act = '/admin/brida_kategori/create';
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_brida_kategori(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Kategori Brida');
    $(modal + 'Isi').html(loading);  // loading ini harus ada definisinya
    var act = '/admin/brida_kategori/' + id + '/edit';  // sesuaikan route
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    }).fail(function() {
        $(modal + 'Isi').html('<p class="text-danger">Gagal memuat data.</p>');
    });
}

function hapus_data_brida_kategori(token, id) {
    Swal.fire({
        title: 'Yakin Ingin Menghapus Data?',
        text: "Jika dihapus data akan Sepenuhnya Hilang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#FF5722',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/brida_kategori/' + id,
                type: 'POST',
                data: {
                    _token: token,
                    _method: 'DELETE'
                },
                success: function(data) {
                    Swal.fire(
                        'Terhapus!',
                        'Data berhasil dihapus.',
                        'success'
                    ).then(() => location.reload());
                },
                error: function() {
                    Swal.fire('Error', 'Gagal menghapus data.', 'error');
                }
            });
        }
    });
}




// --- END DATA KATEGORI BRIDA ---


// --- START DATA BRIDA ---
function tambah_data_brida_data(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data BRIDA');
    $(modal + 'Isi').html(loading);
    var act = '/admin/brida_data/create'; // GET
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_brida_data(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data BRIDA');
    $(modal + 'Isi').html(loading);
    var act = '/admin/brida_data/' + id + '/edit'; // GET
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    });
}

function hapus_data_brida_data(token, id) {
    Swal.fire({
        title: "Yakin Ingin Menghapus Data?",
        text: "Jika dihapus data akan Sepenuhnya Hilang",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/admin/brida_data/' + id,
                type: 'POST',
                data: {
                    _token: token,
                    _method: 'DELETE'
                },
                success: function(data) {
                    Swal.fire({
                        title: "Data Berhasil Dihapus!",
                        icon: "success",
                        confirmButtonColor: "#4CAF50"
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Gagal",
                        text: "Terjadi kesalahan saat menghapus data",
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                }
            });
        }
    });
}


// --- END DATA BRIDA ---

// --- START INFO LITBANG ---
function tambah_data_info_litbang(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Litbang');
    $(modal + 'Isi').html(loading);
    var act = '/admin/info_litbang/create';
    $.post(act, {
            _token: token
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_info_litbang(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Info Litbang');
    $(modal + 'Isi').html(loading);
    var act = '/admin/info_litbang/edit';
    $.post(act, {
            _token: token,
            id: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_data_info_litbang(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/info_litbang/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

// --- END INFO LITBANG ---


// --- START PROGRAM EVALUASI ---
function tambah_program_evaluasi(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Evaluasi');
    $(modal + 'Isi').html(loading);
    var act = '/admin/program_evaluasi/create';
    $.post(act, {
            _token: token
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_program_evaluasi(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Program Evaluasi');
    $(modal + 'Isi').html(loading);
    var act = '/admin/program_evaluasi/edit';
    $.post(act, {
            _token: token,
            id: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_program_evaluasi(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/program_evaluasi/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

// --- END PROGRAM EVALUASI ---


// --- START KEGIATAN EVALUASI ---
function tambah_kegiatan_evaluasi(token, modal, programId) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Evaluasi');
    $(modal + 'Isi').html('<div class="text-center">Loading...</div>');

    // URL sesuai route prefix admin
    var act = '/admin/kegiatan_evaluasi/create?programId=' + programId;

    $.get(act)
        .done(function(data) {
            $(modal + 'Isi').html(data);
        })
        .fail(function(xhr) {
            $(modal + 'Isi').html('<div class="text-danger">Terjadi kesalahan: ' + xhr.status + '</div>');
        });
}

function ubah_kegiatan_evaluasi(token, id, modal, id_program) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Kegiatan Evaluasi');
    $(modal + 'Isi').html(loading);
    var act = '/admin/kegiatan_evaluasi/edit';
    $.post(act, {
            _token: token,
            id: id,
            id_program: id_program
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_kegiatan_evaluasi(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/kegiatan_evaluasi/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

// --- END KEGIATAN EVALUASI ---


// --- START INDIKATOR EVALUASI ---
function tambah_indikator_evaluasi(token, modal, id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Evaluasi');
    $(modal + 'Isi').html(loading);
    var act = '/admin/indikator_evaluasi/create';
    $.post(act, {
            _token: token,
            id: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_indikator_evaluasi(token, id, modal, id_kegiatan) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Indikator Evaluasi');
    $(modal + 'Isi').html(loading);
    var act = '/admin/indikator_evaluasi/edit';
    $.post(act, {
            _token: token,
            id: id,
            id_kegiatan: id_kegiatan
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_indikator_evaluasi(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/indikator_evaluasi/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

// --- END INDIKATOR EVALUASI ---


// --- START AKSI EVALUASI ---
function tambah_aksi_evaluasi(token, modal, id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Evaluasi');
    $(modal + 'Isi').html(loading);
    var act = '/admin/aksi_evaluasi/create';
    $.post(act, {
            _token: token,
            id: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_aksi_evaluasi(token, id, modal, id_indikator) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Aksi Evaluasi');
    $(modal + 'Isi').html(loading);
    var act = '/admin/aksi_evaluasi/edit';
    $.post(act, {
            _token: token,
            id: id,
            id_indikator: id_indikator
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_aksi_evaluasi(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/aksi_evaluasi/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

// --- END AKSI EVALUASI ---

// --- START DATA DATA PROPOSAL ---
function tambah_data_proposal_data(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Proposal Data');
    $(modal + 'Isi').html(loading);
    var act = '/admin/proposal_data/create';
    $.post(act, {
            _token: token
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function ubah_data_proposal_data(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Detail Data Proposal');
    $(modal + 'Isi').html(loading);
    var act = '/admin/proposal_data/edit';
    $.post(act, {
            _token: token,
            id: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_data_proposal_data(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/proposal_data/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

function div_judul(token, target, form_id) {
    var id_subbidang = $(form_id).find('select[name="id_subbidang"] option:selected').val();
    var act = '/admin/data-proposal/div_judul';

    $(form_id).find('#judul_id').html('<option value="">Waiting Data ...</option>');
    $.post(act, {
            _token: token,
            id_subbidang: id_subbidang
        },
        function(data) {
            $('#judul_id').prop("disabled", false);
            $(form_id).find('#judul_id').html(data);
            $(form_id).find('#judul_id').trigger('change');
        });
}

function verifikasi_proposal(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Revisi Proposal');
    $(modal + 'Isi').html(loading);
    var act = '/admin/proposal_data/modal_verifikasi';
    $.post(act, {
            _token: token,
            id_revisi: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function upload_perbaikan_data(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Upload Perbaikan Proposal');
    $(modal + 'Isi').html(loading);
    var act = '/admin/proposal_data/modal_perbaikan_data';
    $.post(act, {
            _token: token,
            id: id
        },
        function(data) {
            $(modal + 'Isi').html(data);
        });
}

function hapus_data_revisi_data(token, id) {
    swal({
            title: "Yakin Ingin Menghapus Data?",
            text: "Jika dihapus data akan Sepenuhnya Hilang",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                var act = '/admin/revisi_data/' + id + '/delete';
                $.post(act, {
                        _token: token
                    },
                    function(data) {
                        swal({
                                title: "Data Berhasil Dihapus!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function(isConfirm) {
                                if (isConfirm) {

                                    location.reload();
                                }
                            });
                    });
            }
        });
}
// --- END DATA DATA PROPOSAL ---

// =============== DATA PORTAL BRDIA START ===============
function tambah_data_portal_brida(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Portal Brida');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-portal_brida/create  ';
    $.get(act, function (data) {
        $(modal + 'Isi').html(data);
    });
}
function ubah_data_portal_brida(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data Portal Brida');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-portal_brida/' + id + '/edit';
    $.get(act, function(data) {
        $(modal + 'Isi').html(data);
    });
}

function  hapus_data_portal_brida(token, id) {
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
            $.post('/admin/data-portal_brida/' + id + '/delete', { _token: token }, function(data) {
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
// =============== DATA PORTAL BRIDA END ===============

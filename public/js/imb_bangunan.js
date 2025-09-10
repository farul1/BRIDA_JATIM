//  ----- START IMB BANGUNAN ---- //
function div_tabel_data_rekap_skrd_imb_bangunan(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/imb_bangunan/rekap_skrd/div_tabel_data_rekap';
    $.post(act, {
            _token: token,
            tanggal_awal: tanggal_awal,
            tanggal_akhir: tanggal_akhir
        },
        function (data) {
            $(target).html(data);
        });
}

function div_tabel_data_rekap_tbp_imb_bangunan(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/imb_bangunan/rekap_tbp/div_tabel_data_rekap';
    $.post(act, {
            _token: token,
            tanggal_awal: tanggal_awal,
            tanggal_akhir: tanggal_akhir
        },
        function (data) {
            $(target).html(data);
        });
}

function div_tabel_data_rekap_pencabutan_imb_bangunan(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/imb_bangunan/rekap_pencabutan/div_tabel_data_rekap';
    $.post(act, {
            _token: token,
            tanggal_awal: tanggal_awal,
            tanggal_akhir: tanggal_akhir
        },
        function (data) {
            $(target).html(data);
        });
}

function div_tabel_data_rekap_piutang_imb_bangunan(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/imb_bangunan/rekap_piutang/div_tabel_data_rekap';
    $.post(act, {
            _token: token,
            tanggal_awal: tanggal_awal,
            tanggal_akhir: tanggal_akhir
        },
        function (data) {
            $(target).html(data);
        });
}


function div_tabel_data_skrd_valid(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/imb_bangunan/skrd/div_tabel_data_skrd_valid';
    $.post(act, {
            _token: token,
            tanggal: tanggal,
            nomor_skrd: nomor_skrd
        },
        function (data) {
            $(target).html(data);
        });
}

function div_tabel_data_validasi_skrd(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/imb_bangunan/skrd/div_tabel_data_validasi_skrd';
    $.post(act, {
            _token: token,
            tanggal: tanggal,
            nomor_skrd: nomor_skrd
        },
        function (data) {
            $(target).html(data);
        });
}

function div_tabel_data_pencabutan_skrd(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/imb_bangunan/skrd/div_tabel_data_pencabutan_skrd';
    $.post(act, {
            _token: token,
            tanggal: tanggal,
            nomor_skrd: nomor_skrd
        },
        function (data) {
            $(target).html(data);
        });
}

function div_tabel_data_belum_validasi(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/imb_bangunan/skrd/div_tabel_data_belum_validasi';
    $.post(act, {
            _token: token,
            tanggal: tanggal,
            nomor_skrd: nomor_skrd
        },
        function (data) {
            $(target).html(data);
        });
}

function div_tabel_data_tbp_valid(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/imb_bangunan/tbp_valid/div_tabel_data_tbp_valid';
    $.post(act, {
            _token: token,
            tanggal: tanggal,
            nomor_skrd: nomor_skrd
        },
        function (data) {
            $(target).html(data);
        });
}


function div_tabel_data_validasi_tbp(token, target) {
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/imb_bangunan/validasi_tbp/div_tabel_data_validasi_tbp';
    $.post(act, {
            _token: token,
            tanggal: tanggal,
            nomor_skrd: nomor_skrd
        },
        function (data) {
            $(target).html(data);
        });
}

function tambah_modal_validasi(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data Realisasi Harian');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/tambah_modal_validasi';
    $.post(act, {
            _token: token
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_validasi_bidang_skrd(token, modal, id) {
    swal({
            title: "Yakin Ingin Memvalidasi Data SKRD?",
            text: "Jika divalidasi data akan masuk ke menu SKRD (Valid)",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function (isConfirm) {
            if (isConfirm) {
                var act = '/admin/imb_bangunan/' + id + '/validasi_bidang_skrd';
                $.post(act, {
                        _token: token
                    },
                    function (data) {
                        swal({
                                title: "Data Berhasil Divalidasi!",
                                text: "",
                                confirmButtonColor: "#4CAF50",
                                type: "success"
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                    });
            }
        });
}

function imb_bangunan_revisi_skrd(token, modal, id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Revisi SKRD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/revisi_skrd';
    $.post(act, {
            _token: token,
            id: id
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_pembayaran_skrd(token, modal, id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Pembayaran');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/pembayaran_skrd';
    $.post(act, {
            _token: token,
            id: id
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_info_skrd(token, modal, id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Informasi SKRD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/modal_informasi_skrd';
    $.post(act, {
            _token: token,
            id: id
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_info_skrd_belum_validasi(token, modal, nomor_ketetapan, id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Informasi SKRD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/modal_informasi_skrd_belum_validasi';
    $.post(act, {
            _token: token,
            nomor_ketetapan: nomor_ketetapan,
            id: id
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_edit_skrd(token, modal, id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Edit SKRD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/edit_skrd';
    $.post(act, {
            _token: token,
            id: id
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}
function imb_bangunan_delete_skrd(token, id) {
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
        function (isConfirm) {
            if (isConfirm) {
                var act = '/admin/imb_bangunan/' + id + '/delete_skrd';
                $.post(act, {
                        _token: token
                    },
                    function (data) { 
                            swal({
                                    title: "Data Berhasil Dihapus!",
                                    text: "",
                                    confirmButtonColor: "#4CAF50",
                                    type: "success"
                                },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    }
                                }); 
                        });
            }
        });
}
function imb_bangunan_validasi_tbp(token, modal, id, id_ketetapan) {
    swal({
            title: "Yakin Ingin Memvalidasi Data TBP?",
            text: "Jika divalidasi data akan masuk ke menu TBP (Valid)",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF5722",
            confirmButtonText: "Ya, Validasi!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: true,
            showLoaderOnConfirm: true
        },
        function (isConfirm) {
            if (isConfirm) {
                var act = '/admin/imb_bangunan/' + id + '/validasi_tbp';
                $.post(act, {
                        _token: token
                    },
                    function (data) {
                        if (data == 'gagal') {
                            alertKu("error", 'Gagal, SKRD Belum divalidasi!!');
                        } else {
                            swal({
                                    title: "Data Berhasil Divalidasi!",
                                    text: "",
                                    confirmButtonColor: "#4CAF50",
                                    type: "success"
                                },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    }
                                });
                            }
                        });
            }
        });
}

function imb_bangunan_info_validasi_tbp(token, modal, ketetapan_id,pembayaran_id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Informasi TBP');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/modal_informasi_validasi_tbp';
    $.post(act, {
            _token: token, 
            ketetapan_id: ketetapan_id,
            pembayaran_id:pembayaran_id
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_info_tbp_valid(token, modal, ketetapan_id,pembayaran_id) {
    $(modal).modal('show');
    $(modal + 'Label').html('Informasi TBP');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/modal_informasi_tbp_valid';
    $.post(act, {
            _token: token, 
            ketetapan_id: ketetapan_id,
            pembayaran_id:pembayaran_id
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_edit_tbp_valid(token, modal, id_ketetapan,id_pembayaran) {
    $(modal).modal('show');
    $(modal + 'Label').html('Edit TBP');
    $(modal + 'Isi').html(loading);
    var act = '/admin/imb_bangunan/edit_tbp';
    $.post(act, {
            _token: token,
            id_ketetapan: id_ketetapan,
            id_pembayaran:id_pembayaran
        },
        function (data) {
            $(modal + 'Isi').html(data);
        });
}

function imb_bangunan_delete_tbp(token, id) {
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
        function (isConfirm) {
            if (isConfirm) {
                var act = '/admin/imb_bangunan/' + id + '/delete_tbp';
                $.post(act, {
                        _token: token
                    },
                    function (data) { 
                            swal({
                                    title: "Data Berhasil Dihapus!",
                                    text: "",
                                    confirmButtonColor: "#4CAF50",
                                    type: "success"
                                },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    }
                                }); 
                        });
            }
        });
}
//  ----- END IMB BANGUNAN ---- //

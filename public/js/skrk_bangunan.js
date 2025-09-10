
//  ----- START SKRK BANGUNAN ---- //
function div_tabel_data_rekap_skrd_skrk_bangunan(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/skrk_bangunan/rekap_skrd/div_tabel_data_rekap';
    $.post(act, {
        _token: token,
        tanggal_awal : tanggal_awal,
        tanggal_akhir : tanggal_akhir 
    },
    function (data) {  
        $(target).html(data);
    });  
}
function div_tabel_data_rekap_tbp_skrk_bangunan(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/skrk_bangunan/rekap_tbp/div_tabel_data_rekap';
    $.post(act, {
        _token: token,
        tanggal_awal : tanggal_awal,
        tanggal_akhir : tanggal_akhir 
    },
    function (data) {  
        $(target).html(data);
    });  
}
function div_tabel_data_rekap_pencabutan_skrk_bangunan(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/skrk_bangunan/rekap_pencabutan/div_tabel_data_rekap';
    $.post(act, {
        _token: token,
        tanggal_awal : tanggal_awal,
        tanggal_akhir : tanggal_akhir 
    },
    function (data) {  
        $(target).html(data);
    });  
}

function div_tabel_data_rekap_piutang_skrk_bangunan(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal_awal = $('#tanggal_awal').val();
    var tanggal_akhir = $('#tanggal_akhir').val();
    var act = '/admin/skrk_bangunan/rekap_piutang/div_tabel_data_rekap';
    $.post(act, {
        _token: token,
        tanggal_awal : tanggal_awal,
        tanggal_akhir : tanggal_akhir 
    },
    function (data) {  
        $(target).html(data);
    });  
}

function div_tabel_data_skrk_bangunan_skrd_valid(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/skrk_bangunan/skrd/div_tabel_data_skrd_valid';
    $.post(act, {
        _token: token,
        tanggal : tanggal,
        nomor_skrd : nomor_skrd 
    },
    function (data) {  
        $(target).html(data);
    });  
}


function div_tabel_data_skrk_bangunan_validasi_skrd(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/skrk_bangunan/skrd/div_tabel_data_validasi_skrd';
    $.post(act, {
        _token: token,
        tanggal : tanggal,
        nomor_skrd : nomor_skrd 
    },
    function (data) {  
        $(target).html(data);
    });  
}

function div_tabel_data_skrk_bangunan_pencabutan_skrd(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/skrk_bangunan/skrd/div_tabel_data_pencabutan_skrd';
    $.post(act, {
        _token: token,
        tanggal : tanggal,
        nomor_skrd : nomor_skrd 
    },
    function (data) {  
        $(target).html(data);
    });  
}

function div_tabel_data_skrk_bangunan_belum_validasi(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/skrk_bangunan/skrd/div_tabel_data_belum_validasi';
    $.post(act, {
        _token: token,
        tanggal : tanggal,
        nomor_skrd : nomor_skrd 
    },
    function (data) {  
        $(target).html(data);
    });  
}


function div_tabel_data_tbp_valid_skrk_bangunan(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/skrk_bangunan/tbp_valid/div_tabel_data_tbp_valid';
    $.post(act, {
        _token: token,
        tanggal : tanggal,
        nomor_skrd : nomor_skrd 
    },
    function (data) {  
        $(target).html(data);
    });  
}


function div_tabel_data_validasi_tbp_skrk_bangunan(token, target){  
    $(target).html('Tunggu Sebentar ... ');
    var tanggal = $('#tanggal').val();
    var nomor_skrd = $('#nomor_skrd').val();
    var act = '/admin/skrk_bangunan/validasi_tbp/div_tabel_data_validasi_tbp';
    $.post(act, {
        _token: token,
        tanggal : tanggal,
        nomor_skrd : nomor_skrd 
    },
    function (data) {  
        $(target).html(data);
    });  
}


function tambah_modal_validasi_skrk_bangunan(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data SKRD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/skrk_bangunan/tambah_modal_validasi';
    $.post(act, {
        _token: token
    },
    function (data) {
        $(modal + 'Isi').html(data);
    });
}

function skrk_bangunan_validasi_bidang_skrd(token, modal, id) {
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
            var act = '/admin/skrk_bangunan/' + id + '/validasi_bidang_skrd';
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
//  ----- END SKRK BANGUNAN ---- //
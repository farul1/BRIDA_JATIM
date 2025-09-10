var loading = `<div class="text-center">
<div class="pace-demo">
<div class="theme_squares"><div class="pace-progress" data-progress-text="60%" data-progress="60"></div><div class="pace_activity"></div></div>
</div>
</div>`;

function ladda_start(idBtn){
    var l = Ladda.create( document.querySelector(idBtn) );
    l.start();
}

function js_number_format(value, target){
    $(target).html('loading...');
    var res = addCommas(value);
    $(target).html(res);

}

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function alertKu2(tipe, judul, isi){
	var warnabtn = "#FF5722";
	if(tipe == 'success'){ warnabtn = "#4CAF50"; }
    swal({
    	html: true,
        title: judul,
        text: isi,
        confirmButtonColor: warnabtn,
        type: tipe
    });
}

function alertKu(tipe, isi){
	var warnabtn = "#FF5722";
	if(tipe == 'success'){ warnabtn = "#4CAF50"; }
    swal({
    	html: true,
        title: isi,
        text: "",
        confirmButtonColor: warnabtn,
        type: tipe
    });
}

function _(el){
    return document.getElementById(el);
}

function tgl(id){
	$(id).toggle();
}

function openModal(id){
	$(id).modal('show');
}

function openModalIndex(id){
	// alert(id);
	$(id).modal('show');
}

function closeModal(id){
	// alert(id);
	$(id).modal('hide');
}

function closeBgModal(){
	$(document.body).removeClass("modal-open");
	$(".modal-backdrop").remove();
}

function div_tabel_opd(token, target) {
    var limit = $('#limit').val();
    var str_filter = $('#str_filter').val();
    var role_id_filter = $('#role_id_filter').val();
    $(target).html(loading);
    var act = '/admin/data-opd/tabel';
    $.post(act, {
        _token: token,
        limit: limit,
        str_filter: str_filter,
        role_id_filter: role_id_filter
    },
    function (data) {
        $(target).html(data);
    })
}

function tambah_data_opd(token, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Tambah Data OPD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-opd/create';
    $.post(act, {
        _token: token
    },
    function (data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_data_opd(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Data OPD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-opd/edit';
    $.post(act, {
        _token: token,
        id: id
    },
    function (data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_akun_data_opd(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Akun OPD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-opd/edit-akun';
    $.post(act, {
        _token: token,
        id: id
    },
    function (data) {
        $(modal + 'Isi').html(data);
    });
}

function ubah_password_data_opd(token, id, modal) {
    $(modal).modal('show');
    $(modal + 'Label').html('Ubah Password OPD');
    $(modal + 'Isi').html(loading);
    var act = '/admin/data-opd/edit-password';
    $.post(act, {
        _token: token,
        id: id
    },
    function (data) {
        $(modal + 'Isi').html(data);
    });
}

function hapus_data_opd(token, id) {
    swal({
        title: "Yakin Untuk Menghapus Data OPD?",
        text: "",
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
            var act = '/admin/data-opd/destroy';
            $.post(act, {
                _token: token,
                id: id
            },
            function (data) {
            	swal({
                    title: "Data Terhapus!",
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
function hapus_data_rekeningpersediaan(token, id) {
    swal({
        title: "Yakin Untuk Menghapus Data Rekening?",
        text: "",
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
            var act = '/admin/rekeningpersediaan/destroy';
            $.post(act, {
                _token: token,
                id: id
            },
            function (data) {
            	swal({
                    title: "Data Terhapus!",
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
function hapus_data_rekeningbelanja(token, id) {
    swal({
        title: "Yakin Untuk Menghapus Data Rekening?",
        text: "",
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
            var act = '/admin/rekeningbelanja/destroy';
            $.post(act, {
                _token: token,
                id: id
            },
            function (data) {
            	swal({
                    title: "Data Terhapus!",
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

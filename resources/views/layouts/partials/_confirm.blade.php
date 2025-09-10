<script>
    $(".delete-data").on('click', function () {
        var linkURL = $(this).attr("href");
        swal({
            title: "Apakah Anda yakin?",
            text: "Anda tidak dapat mengembalikannya!",
            icon: 'warning',
            dangerMode: true,
            buttons: ["TIDAK", "YA"],
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((confirm) => {
            if (confirm) {
                swal({icon: "success", buttons: false});
                window.location.href = linkURL;
            }
        });
        return false;
    });

    $(".reset-data").on('click', function () {
        var linkURL = $(this).attr("href");
        swal({
            title: "Apakah Anda yakin?",
            text: "Password akan direset sama seperti Username!",
            icon: 'warning',
            dangerMode: true,
            buttons: ["TIDAK", "YA"],
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((confirm) => {
            if (confirm) {
                swal({icon: "success", buttons: false});
                window.location.href = linkURL;
            }
        });
        return false;
    });

    $(".deactivate-data").on('click', function () {
        var linkURL = $(this).attr("href");
        swal({
            title: "Deactivate",
            text: "You can activate this data again later",
            icon: 'warning',
            dangerMode: true,
            buttons: ["CANCEL", "DEACTIVATE"],
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((confirm) => {
            if (confirm) {
                swal({icon: "success", buttons: false});
                window.location.href = linkURL;
            }
        });
        return false;
    });

    $(".activate-data").on('click', function () {
        var linkURL = $(this).attr("href");
        swal({
            title: "Activate",
            text: "You can deactivate this data again later",
            icon: 'warning',
            dangerMode: true,
            buttons: ["CANCEL", "ACTIVATE"],
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((confirm) => {
            if (confirm) {
                swal({icon: "success", buttons: false});
                window.location.href = linkURL;
            }
        });
        return false;
    });

    $(".btn_signOut").click(function () {
        swal({
            title: "Akhiri Sesi",
            text: "Apakah Anda yakin untuk mengakhiri sesi Anda?",
            icon: 'warning',
            dangerMode: true,
            buttons: ["TIDAK", "YA"],
            closeOnEsc: false,
            closeOnClickOutside: false,
        }).then((confirm) => {
            if (confirm) {
                swal({icon: "success", text: 'Anda akan dialihkan ke halaman Autentikasi.', buttons: false});
                $("#logout-form").submit();
            }
        });
        return false;
    });
</script>

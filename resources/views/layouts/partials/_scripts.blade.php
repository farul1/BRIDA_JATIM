@php $color = \App\Models\ColorScheme::where('is_active', true)->first(); @endphp
<script>
    $(function () {
        window.mobilecheck() ? $("body").removeClass('use-nicescroll') : $("body").css("overflow", "hidden");

        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();

        moment.locale('{{$app->getLocale()}}');

        var marquee = $('.js-conveyor-3');
        if(marquee.length > 0) {
            marquee.jConveyorTicker({
                anim_duration: 200,    // Specify the time (in milliseconds) the animation takes to move 10 pixels
                reverse_elm: true,   // Enable the use of the reverse animation trigger HTML element
                force_loop: true,   // Force the initialization even if the items are too small in total width
                start_paused: false,   // Initialize in a paused state
            });
        }
    });

    var keyword = $("#keyword"), fetchQuery = null, fetchResultsCallback = null,
        fetchResults = _.debounce(function () {
            $.get('{{route('get.cari')}}?q=' + fetchQuery, function (data) {
                if (fetchResultsCallback) {
                    fetchResultsCallback(data);
                }
            });
        }, 300);

    keyword.typeahead(
        {
            hint: true,
            highlight: true,
            minLength: 0,
        },
        {
            limit: 10,
            source: function (query, syncResults, asyncResults) {
                fetchQuery = query;
                fetchResultsCallback = asyncResults;
                fetchResults();
            },
            templates: {
                empty: '<div class="tt-empty text-center">Hasil pencarian tidak ditemukan</div>',
                pending:
                    '<div class="tt-pending">' +
                    '<div class="css3-spinner" style="position: absolute; z-index:auto;">' +
                    '<div class="css3-spinner-bounce1"></div>' +
                    '<div class="css3-spinner-bounce2"></div>' +
                    '<div class="css3-spinner-bounce3"></div>' +
                    '</div></div>',
                suggestion: function (data) {
                    return '<div><img alt="thumbnail" src="' + data.image + '">' + data.name + '</div>'
                },
            },
            display: function (data) {
                return data.name;
            }
        }).on('typeahead:selected', function (evt, data) {
        window.location.href = data.link;
    });

    /*$(".btn_download").on('click', function () {
        window.location.href = $(this).data('url');
        return false;
    });*/

    @if(Auth::check() && Auth::user()->isAsn())
    $('#check_password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#check_password').togglePassword();
    });

    $('#password + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#password').togglePassword();
    });

    $('#password-confirm + .glyphicon').on('click', function () {
        $(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');
        $('#password-confirm').togglePassword();
    });

    function checkPassword() {
        var new_pas = $("#password").val(),
            re_pas = $("#password-confirm").val();
        if (new_pas != re_pas) {
            $("#password, #password-confirm").addClass('is-invalid');
            $("#error_new_pass").addClass('has-danger');
            $(".aj_new_pass").text("Konfirmasi password harus sama dengan password baru Anda!").parent().show();
            $("#btn_save_password").attr('disabled', 'disabled');
        } else {
            $("#password, #password-confirm").removeClass('is-invalid');
            $("#error_new_pass").removeClass('has-danger');
            $(".aj_new_pass").text("").parent().hide();
            $("#btn_save_password").removeAttr('disabled');
        }
    }

    $("#form-password").on("submit", function (e) {
        $.ajax({
            type: 'POST',
            url: '{{route('update.pengaturan-akun.asn')}}',
            data: new FormData($("#form-password")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 0) {
                    swal('Oops..!', 'Kata sandi lama Anda salah!', 'error');
                    $("#error_curr_pass").addClass('has-danger');
                    $("#error_new_pass").removeClass('has-danger');
                    $("#check_password").addClass('is-invalid');
                    $("#password, #password-confirm").removeClass('is-invalid');
                    $(".aj_pass").text("Kata sandi lama Anda salah!").parent().show();
                    $(".aj_new_pass").text("").parent().hide();

                } else if (data == 1) {
                    swal('Oops..!', 'Konfirmasi kata sandi harus sama dengan kata sandi baru Anda!', 'error');
                    $("#error_curr_pass").removeClass('has-danger');
                    $("#error_new_pass").addClass('has-danger');
                    $("#check_password").removeClass('is-invalid');
                    $("#password, #password-confirm").addClass('is-invalid');
                    $(".aj_pass").text("").parent().hide();
                    $(".aj_new_pass").text("Konfirmasi kata sandi harus sama dengan kata sandi baru Anda!").parent().show();

                } else {
                    swal('SUKSES!', 'Kata sandi Anda berhasil diperbarui!', 'success');
                    $("#form-password").trigger("reset");
                    $("#error_curr_pass").removeClass('has-danger');
                    $("#error_new_pass").removeClass('has-danger');
                    $("#check_password").removeClass('is-invalid');
                    $("#password, #password-confirm").removeClass('is-invalid');
                    $(".aj_pass").text("").parent().hide();
                    $(".aj_new_pass").text("").parent().hide();
                    $("#show_password_settings").click();
                    $(".aj_updated").text('{{now()->diffForHumans()}}');
                }
            },
            error: function () {
                swal('Oops..!', 'Terjadi kesalahan! Silahkan, refresh browser Anda.', 'error');
            }
        });
        return false;
    });
    @endif

    function numberOnly(e, decimal) {
        var key;
        var keychar;
        if (window.event) {
            key = window.event.keyCode;
        } else if (e) {
            key = e.which;
        } else return true;
        keychar = String.fromCharCode(key);
        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27) || (key == 188)) {
            return true;
        } else if ((("0123456789").indexOf(keychar) > -1)) {
            return true;
        } else if (decimal && (keychar == ".")) {
            return true;
        } else return false;
    }

    function thousandSeparator(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    var title = document.getElementsByTagName("title")[0].innerHTML;
    (function titleScroller(text) {
        document.title = text;
        setTimeout(function () {
            titleScroller(text.substr(1) + text.substr(0, 1));
        }, 500);
    }(title + " ~ "));

    <!--Scroll Progress Bar-->
    function progress() {
        var windowScrollTop = $(window).scrollTop();
        var docHeight = $(document).height();
        var windowHeight = $(window).height();
        var progress = (windowScrollTop / (docHeight - windowHeight)) * 100;
        var $bgColor = progress > 99 ? '{{!is_null($color) ? $color->light : '#00ae80'}}' : '{{!is_null($color) ? $color->main : '#009D73'}}';
        var $textColor = progress > 99 ? '#fff' : '#333';

        $('.myProgress .bar').width(progress + '%').css({backgroundColor: $bgColor});
        $('.fill').height(progress + '%').css({backgroundColor: $bgColor});
    }

    progress();

    $(document).on('scroll', progress);

    window.onload = function () {
        $(".use-nicescroll").niceScroll({
            cursorcolor: "{{!is_null($color) ? $color->main : '#009D73'}}",
            cursorwidth: "8px",
            background: "rgba(222, 222, 222, .75)",
            cursorborder: 'none',
            horizrailenabled: false,
            autohidemode: 'leave',
            zindex: 9999999,
        });
    };

    $(document).on('mouseover', '.use-nicescroll', function () {
        $(this).getNiceScroll().resize();
    });
</script>

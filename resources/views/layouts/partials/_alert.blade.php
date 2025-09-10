<script>
    @if(session('kontak'))
    swal('SUKSES!', '{{session('kontak')}}', 'success');

    @elseif(session('signed'))
    swal('SUKSES!', 'Halo {{Auth::user()->name}}! Anda telah masuk.', 'success');

    @elseif(session('token'))
    swal('Oops..!', '{{session('token')}}', 'error');

    @elseif(session('expire'))
    swal('Oops..!', '{{session('expire')}}', 'error');

    @elseif(session('logout'))
    swal('PERHATIAN!', 'Sesi Anda telah berakhir.', 'warning');

    @elseif(session('warning'))
    swal('PERHATIAN!', '{{session('warning')}}', 'warning');

    @elseif(session('add'))
    swal('SUKSES!', '{{session('add')}}', 'success');

    @elseif(session('update'))
    swal('SUKSES!', '{{session('update')}}', 'success');

    @elseif(session('delete'))
    swal('SUKSES!', '{{session('delete')}}', 'success');

    @elseif(session('error_backend'))
    swal('Oops..!', '{{session('error_backend')}}', 'error');

    @elseif(session('error'))
    swal('Oops..!', 'Username/email atau password Anda salah.', 'error');
    @endif

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    swal('Oops..!', '{{$error}}', 'error');
    @endforeach
    @endif
</script>

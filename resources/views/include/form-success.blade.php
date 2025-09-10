@if (session()->has('status_connect_with_us'))
  @push('scripts_layout')
  <script type="text/javascript">
      $(document).ready(function () {
          $('#modal_sukses').modal('show');
          $('#modal_sukses_isi').html(`{{ session()->get('status_connect_with_us') }}`);
      });
  </script>
  @endpush
  <div class="contact-form-success alert alert-success mt-4">
      <strong>Berhasil !</strong> {{ session()->get('status_connect_with_us') }}
      {{session()->forget('status_connect_with_us')}}
  </div>
@endif 
@if (session()->has('success'))
	<div class="contact-form-success alert alert-success mt-4">
		<strong>Berhasil !</strong> {{ session()->get('success') }}
		{{session()->forget('success')}}
	</div>
@endif 
@if (session()->has('unsuccess'))
	<div class="contact-form-danger alert alert-danger mt-4">
		<strong>Gagal !</strong> {{ session()->get('unsuccess') }}
		{{session()->forget('unsuccess')}}
	</div>
@endif 

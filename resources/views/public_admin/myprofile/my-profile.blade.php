@extends('index')
@section('tempat_content')
<!-- Main charts -->
<div class="row">

	<div class="col-md-12">
		@if (session()->has('status')) 
		<script type="text/javascript">
			alertKu('success', "{{ session()->get('status') }}");
		</script>
		<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
			<button type="button" class="close" data-dismiss="alert">
				<span>×</span>
				<span class="sr-only">Close</span>
			</button>
			<span class="text-semibold">Berhasil! </span> {{ session()->get('status') }}
			{{session()->forget('status')}}
		</div> 
		@endif
		@if (session()->has('statusT'))
		<div class="alert alert-warning alert-styled-left">
			<button type="button" class="close" data-dismiss="alert">
				<span>×</span>
				<span class="sr-only">Close</span>
			</button>
			<span class="text-semibold">Gagal!<br></span> {{ session()->get('statusT') }}
			{{session()->forget('statusT')}}
		</div>
		@endif
	</div>

	<div class="col-md-8">

		<!-- Panel Ganti Username & Email -->
		<div class="panel panel-indigo">
			<div class="panel-heading">
				<h6 class="panel-title">Ganti Username & E-Mail </h6>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						
					</ul>
				</div>
			</div>

			<div class="panel-body">
				<form method="post" action="{{ route('simpan_ganti_username_email_admin', Auth::user()->id) }}" class="form-horizontal">
					<div class="form-group">
						{{ csrf_field() }}
					</div> 
					<div class="form-group">
						<label for="username" style="text-align: right;" class="col-md-4 control-label">
							Username : 
						</label>
						<div class="col-md-7"> 
							<input type="text" class="form-control" name="username" id="username" required="" value="{{Auth::user()->username}}">
						</div>
					</div>
					<div class="form-group">
						<label for="email" style="text-align: right;" class="col-md-4 control-label">
							E-mail : 
						</label>
						<div class="col-md-7"> 
							<input type="email" class="form-control" name="email" id="email" required="" value="{{Auth::user()->email}}">
						</div>
					</div> 

					<div class="text-right">
						<button type="submit" class="btn btn-indigo">Ubah <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
		<!-- Panel Ganti Username & Email -->

		<!-- Panel Ganti Password -->
		<div class="panel panel-indigo">
			<div class="panel-heading">
				<h6 class="panel-title">Ganti Password </h6>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						
					</ul>
				</div>
			</div>

			<div class="panel-body">
				<form method="post" action="{{ route('simpan_ganti_password_admin', Auth::user()->id) }}" class="form-horizontal" onsubmit="
				if ($('#new_password').val() == $('#new_password_confirmation').val()) 
				{ 
				  return true; 
				} else {    
						alert('Password tidak sama'); 
						return false; 
						}">
					<div class="form-group">
						{{ csrf_field() }}
					</div> 
					<div class="form-group">
						<label for="old_password" style="text-align: right;" class="col-md-4 control-label">
							Old Password : 
						</label>
						<div class="col-md-7"> 
							<input type="hidden" class="form-control" name="old_password_h" id="old_password_h" required="" value="{{Auth::user()->password}}">
						</div>
						<div class="col-md-7"> 
							<input type="password" class="form-control" name="old_password" id="old_password" required="" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="new_password" style="text-align: right;" class="col-md-4 control-label">
							New Password : 
						</label>
						<div class="col-md-7"> 
							<input type="password" class="form-control" name="new_password" id="new_password" required="" value="">
						</div>
					</div> 
					<div class="form-group">
						<label for="new_password_confirmation" style="text-align: right;" class="col-md-4 control-label">
							Repeat New Password : 
						</label>
						<div class="col-md-7"> 
							<input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" required="" value="">
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-indigo">Ubah <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>
			</div>
		</div>
		<!-- Panel Ganti Password -->

	</div>

	<div class="col-md-4">

		<!-- User details -->
		<div class="content-group">
			<div class="panel-body bg-indigo border-radius-top text-center" style=" background-size: contain;">
				<div class="content-group-sm">
					<h6 class="text-semibold no-margin-bottom">
						<!-- {{ session('pabi_username') }} -->
					</h6>

					<!-- <span class="display-block">{{ session('pabi_role_name') }} of PABI</span> -->
				</div>

				<a href="#" class="display-inline-block content-group-sm">
					<img src="{{ asset('assets/images/pemprovjatim.png') }}" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
				</a>

				<ul class="list-inline list-inline-condensed no-margin-bottom" style="display: none;">
					<li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>
					<li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
					<li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-github"></i></a></li>
				</ul>
			</div>

			<div class="panel no-border-top no-border-radius-top">
				<div class="panel-body"> 
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Admin</label>
								<input type="text" value="{{Auth::user()->name}}" class="form-control" readonly="">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Deskripsi</label>
								<textarea class="form-control" readonly="">Super Admin bertugas untuk mengakses semua fitur dari entry data arsip hingga delete dan cetak </textarea>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<!-- /user details -->							

	</div>
</div>
<!-- /main charts -->

@endsection

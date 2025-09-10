@extends('index')

@section('title', "Respons Form: {$form->title}")

@section('tempat_content')
<div class="container py-4">
    <h1 class="mb-4">Respons untuk Form: <strong>{{ $form->title }}</strong></h1>

    <a href="{{ route('forms.edit', $form->id) }}" class="btn btn-secondary mb-3">← Kembali ke Edit Form</a>

    {{-- Filter Respons (optional) --}}
    <form method="GET" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <input type="email" name="email" value="{{ request('email') }}" class="form-control" placeholder="Cari berdasarkan Email Responden">
            </div>
            <div class="col-auto">
                <input type="date" name="date" value="{{ request('date') }}" class="form-control" placeholder="Filter berdasarkan tanggal">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.responses.index', $form->id) }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </div>
    </form>

    @if($responses->isEmpty())
        <div class="alert alert-info">Belum ada respons yang masuk untuk formulir ini.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email Responden</th>
                        <th>Waktu Kirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responses as $index => $response)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $response->email ?? '-' }}</td>
                            <td>{{ $response->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.responses.show', [$form->id, $response->id]) }}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

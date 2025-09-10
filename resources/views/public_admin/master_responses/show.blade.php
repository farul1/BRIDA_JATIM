@extends('index')

@section('title', "Detail Respons - Form: {$form->title}")

@section('tempat_content')
<div class="container py-4">
    <h1 class="mb-4">Detail Respons Form: <strong>{{ $form->title }}</strong></h1>

    <a href="{{ route('admin.responses.index', $form->id) }}" class="btn btn-secondary mb-3">← Kembali ke Daftar Respons</a>

    <div class="card mb-4">
        <div class="card-header">
            <strong>Informasi Responden</strong>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $response->email ?? '-' }}</p>
            <p><strong>Waktu Submit:</strong> {{ $response->created_at->format('d M Y, H:i') }}</p>
            <p><strong>IP Address:</strong> {{ $response->ip_address ?? 'Tidak tersedia' }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Jawaban</strong>
        </div>
        <div class="card-body">
            @if($response->answers->isEmpty())
                <p>Tidak ada jawaban yang tersedia.</p>
            @else
                <dl class="row">
                    @foreach($response->answers as $answer)
                        <dt class="col-sm-4">{{ $answer->question->question_text }}</dt>
                        <dd class="col-sm-8">
                            @if($answer->question->type === 'file_upload')
                                <a href="{{ Storage::url($answer->answer) }}" target="_blank" rel="noopener noreferrer">Lihat File</a>
                            @else
                                {{ isJson($answer->answer) ? json_decode($answer->answer) : $answer->answer }}
                            @endif
                        </dd>
                    @endforeach
                </dl>
            @endif
        </div>
    </div>
</div>
@endsection

@php
    // Helper function to cek json (bisa dipindah ke helper global)
    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
@endphp

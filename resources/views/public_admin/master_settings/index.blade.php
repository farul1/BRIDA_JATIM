@extends('index')
@section('tempat_content')

<style>
  body { background-color: #f8f9fc; }

  .settings-wrapper {
    background: #fff; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    padding: 30px; margin-bottom: 30px;
  }

  .section-title {
    font-size: 20px; font-weight: 600; color: #4e54c8;
    border-left: 5px solid #4e54c8; padding-left: 10px; margin: 25px 0 15px;
  }

  .custom-file-upload {
    border: 2px dashed #c3c3c3; display: block; padding: 12px; text-align: center;
    cursor: pointer; border-radius: 10px; background: #fafafa; transition: all 0.3s ease;
    font-size: 14px; margin-bottom: 10px;
  }
  .custom-file-upload:hover { background: #f0f0ff; border-color: #4e54c8; }
  .custom-file-upload input { display: none; }

  .media-preview-container { width: 100%; max-width: 500px; margin: 15px auto; border-radius: 8px; overflow: hidden; background: #f5f5f5; border: 1px solid #e0e0e0; }
  .media-preview { width: 100%; height: 280px; display: flex; align-items: center; justify-content: center; background: #000; position: relative; }
  .media-preview video, .media-preview audio { width: 100%; height: 100%; object-fit: contain; }
  .media-preview img { max-width: 100%; max-height: 100%; object-fit: contain; }

  .decor-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin: 20px 0; }
  .upload-card { border: 1px dashed #bbb; border-radius: 10px; padding: 15px; background: #fafafa; text-align: center; transition: all 0.3s ease; }
  .upload-card:hover { border-color: #666; background: #f0f0f0; }

  .form-control { margin-bottom: 10px; }
  .remove-check { display: inline-flex; align-items: center; gap: 5px; margin-top: 8px; color: #d9534f; cursor: pointer; font-size: 13px; }
  .alert-info { background-color: #f0f7ff; border-color: #c3d9ff; color: #2c5282; }

  .action-buttons { display: flex; gap: 10px; margin-top: 25px; flex-wrap: wrap; }
  .btn-save { background: #4e54c8; color: #fff; border: none; padding: 10px 20px; font-size: 15px; font-weight: 500; border-radius: 6px; transition: background 0.3s ease; display: inline-flex; align-items: center; gap: 6px; }
  .btn-save:hover { background: #3c40a0; }
  .btn-refresh { background: #6c757d; color: #fff; border: none; padding: 10px 15px; font-size: 15px; border-radius: 6px; display: inline-flex; align-items: center; gap: 5px; transition: background 0.3s ease; }
  .btn-refresh:hover { background: #5a6268; }

  @media (max-width: 576px) {
    .settings-wrapper { padding: 20px 15px; }
    .action-buttons .btn { width: 100%; justify-content: center; }
    .decor-grid { grid-template-columns: 1fr; }
    .media-preview { height: 200px; }
  }

  .video-preview-container { width: 100%; max-width: 500px; margin: 15px auto; border-radius: 8px; overflow: hidden; background: #000; }
  .video-wrapper { position: relative; padding-bottom: 56.25%; height: 0; }
  .video-player { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; }
</style>

<div class="settings-wrapper">
  <h2 class="mb-3 font-weight-bold text-primary">Pengaturan Tampilan Website</h2>
  <p class="text-muted mb-4">Kelola konten sambutan dan dekorasi halaman depan.</p>

  <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- VIDEO --}}
    <div class="video-section">
      <h3 class="section-title">Video Sambutan</h3>
      <label class="custom-file-upload">
        <input type="file" name="welcome_video_file" accept="video/mp4,video/*">
        <i class="fas fa-video mr-2"></i> Upload Video Sambutan (MP4, max 100MB)
      </label>

      @if (!empty($settings['welcome_video_file']))
      <div class="video-preview-container">
        <div class="video-wrapper">
          <video controls class="video-player">
            <source src="{{ asset($settings['welcome_video_file']) }}" type="video/mp4">
            Browser Anda tidak mendukung pemutaran video.
          </video>
        </div>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remove_welcome_video_file" value="1" id="remove_welcome_video_file">
        <label class="remove-check" for="remove_welcome_video_file"><i class="fas fa-trash-alt"></i> Hapus video ini</label>
      </div>
      @endif

      <div class="mt-3">
        <input type="url" name="welcome_video_url" class="form-control"
          value="{{ old('welcome_video_url', $settings['welcome_video_url'] ?? '') }}"
          placeholder="https://www.youtube.com/watch?v=xxxxxx">
        <small class="text-muted d-block mt-1">Atau masukkan link YouTube</small>

        @if (!empty($settings['welcome_video_url']))
        <div class="form-check mt-2">
          <input class="form-check-input" type="checkbox" name="remove_welcome_video_url" value="1" id="remove_welcome_video_url">
          <label class="remove-check" for="remove_welcome_video_url"><i class="fas fa-trash-alt"></i> Hapus link YouTube</label>
        </div>
        @endif
      </div>
    </div>

    {{-- AUDIO --}}
    <div class="audio-section mt-5">
      <h3 class="section-title">Audio Sambutan</h3>

      <div class="alert alert-info">
        <i class="fas fa-info-circle mr-2"></i> Pilih salah satu: Upload file audio <strong>ATAU</strong> masukkan teks untuk Text-to-Speech
      </div>

      <label class="custom-file-upload">
        <input type="file" name="welcome_audio_file" accept="audio/mp3,audio/*">
        <i class="fas fa-music mr-2"></i> Upload File Audio (MP3/WAV, max 10MB)
      </label>

      <div class="form-group">
        <label for="welcome_audio_text" class="font-weight-semibold">Teks Sambutan</label>
        <textarea name="welcome_audio_text" id="welcome_audio_text" class="form-control" rows="3"
          placeholder="Contoh: Selamat datang di BRIDA Jawa Timur"
          @if(!empty($settings['welcome_audio_file'])) disabled @endif>{{ old('welcome_audio_text', $settings['welcome_audio_text'] ?? '') }}</textarea>
      </div>

      @if (!empty($settings['welcome_audio_file']))
      <div class="media-preview-container">
        <div class="media-preview">
          <audio controls>
            <source src="{{ asset($settings['welcome_audio_file']) }}" type="audio/mpeg">
            Browser Anda tidak mendukung pemutaran audio.
          </audio>
        </div>
      </div>
      @endif

      @if (!empty($settings['welcome_audio_text']) || !empty($settings['welcome_audio_file']))
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remove_welcome_audio" value="1" id="remove_welcome_audio">
        <label class="remove-check" for="remove_welcome_audio"><i class="fas fa-trash-alt"></i> Hapus audio saat ini</label>
      </div>
      @endif
    </div>

    {{-- IMAGE DECORATIONS --}}
    <div class="decorations-section mt-5">
      <h3 class="section-title">Dekorasi Halaman</h3>
      <div class="decor-grid">
        @foreach (['kiri_atas','kanan_atas','kiri_bawah','kanan_bawah'] as $posisi)
        @php
          $key = 'aksesoris_' . $posisi;
          $label = ucwords(str_replace('_',' ',$posisi));
          $currentImage = $settings[$key] ?? null;
        @endphp
        <div class="upload-card">
          <label class="font-weight-semibold mb-2">{{ $label }}</label>
          <label class="custom-file-upload">
            <input type="file" name="{{ $key }}" accept="image/*">
            <i class="fas fa-image mr-2"></i> Pilih Gambar
          </label>

          @if ($currentImage)
          <div class="media-preview-container">
            <div class="media-preview">
              <img src="{{ asset($currentImage) }}" alt="Dekorasi {{ $label }}">
            </div>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remove_{{ $key }}" value="1" id="remove_{{ $key }}">
            <label class="remove-check" for="remove_{{ $key }}"><i class="fas fa-trash-alt"></i> Hapus gambar</label>
          </div>
          @endif
        </div>
        @endforeach
      </div>
    </div>

<div class="instagram-section mt-4">
    <h3 class="section-title">Link Instagram Profil</h3>
    <input type="url" name="instagram_link" class="form-control"
           value="{{ old('instagram_link', $settings['instagram_link'] ?? '') }}"
           placeholder="https://www.instagram.com/bridajatim/">
    <small class="text-muted">Masukkan link profil Instagram yang akan tampil di front-end</small>
</div>



    {{-- ACTION BUTTONS --}}
    <div class="action-buttons">
      <button type="submit" class="btn-save"><i class="fas fa-save"></i> Simpan Perubahan</button>
      <button type="button" class="btn-refresh" onclick="location.reload()"><i class="fas fa-sync-alt"></i> Refresh</button>
    </div>
  </form>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const audioFileInput = document.querySelector('input[name="welcome_audio_file"]');
    const audioTextInput = document.getElementById('welcome_audio_text');

    function toggleAudioInputs() {
        if (audioFileInput.files.length > 0) {
            audioTextInput.disabled = true;
        } else if (audioTextInput.value.trim() !== '') {
            audioFileInput.disabled = true;
        } else {
            audioTextInput.disabled = false;
            audioFileInput.disabled = false;
        }
    }

    audioFileInput.addEventListener('change', toggleAudioInputs);
    audioTextInput.addEventListener('input', toggleAudioInputs);
    toggleAudioInputs();

    // Konfirmasi hapus
    document.querySelectorAll('input[type="checkbox"][name^="remove_"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked && !confirm('Anda yakin ingin menghapus item ini?')) {
                this.checked = false;
            }
        });
    });
});
</script>
@endsection

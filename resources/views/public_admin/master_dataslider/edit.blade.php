<div class="row">
    <div class="col-lg-12">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="active">
                    <a href="#tab_verifikasi" data-toggle="tab" aria-expanded="false">Ubah Data Slider</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_verifikasi">
                    <form id="formEditSlider" method="post" 
                          action="{{ route('simpan_slider_ubah', $slider->id) }}" 
                          class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <!-- Nama Slider -->
                            <div class="form-group">
                                <label for="nama" class="col-lg-3 control-label">Nama :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" 
                                           value="{{ $slider->nama }}" 
                                           name="nama" id="nama">
                                </div>
                            </div>

                            <!-- File Slider -->
                            <div class="form-group">
                                <label for="file" class="col-lg-3 control-label">File :</label>
                                <div class="col-lg-8">
                                    <input type="file" class="form-control" 
                                           name="file" id="file"
                                           accept=".jpeg,.jpg,.png,.webp,.gif,.mp4,.webm,.mov">

                                    <!-- Tampilkan file saat ini -->
                                    @php
                                        $ext = strtolower(pathinfo($slider->gambar, PATHINFO_EXTENSION));
                                    @endphp

                                    @if(in_array($ext, ['mp4','webm','mov']))
                                        <video width="300" controls style="margin-top:10px;">
                                            <source src="{{ asset('file_upload/slider/'.$slider->gambar) }}" type="video/mp4">
                                            Browser Anda tidak mendukung video.
                                        </video>
                                    @else
                                        <img src="{{ asset('file_upload/slider/'.$slider->gambar) }}" 
                                             alt="" style="width:30%; margin-top:10px;">
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="icon-cross"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.select22').select2();
    $(function () {
        //CKEditor
        // CKEDITOR.replace('ckeditors');
        // CKEDITOR.config.height = 300;
        $('.summernote').each(function(e){
            var toolbarGroups = [
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'document', groups: [ 'document', 'mode', 'doctools' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'insert', groups: [ 'insert' ] },
            { name: 'colors', groups: [ 'colors' ] },
            ];
            CKEDITOR.replace(this.id,{
                uiColor : '#b2cefe ',
                toolbarGroups,
                removeButtons : 'Link,Unlink,Anchor,Image,Flash,HorizontalRule,Iframe,About'

            });
        });
    });
</script>

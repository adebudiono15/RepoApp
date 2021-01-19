@section('title', 'Upload')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-dark pb-2 fw-bold">File Kamu</h2>
                    <input class="form-control form-control-sm" wire:model="search" type="text" placeholder="Cari Dokumen">
                    <button type="button" class="btn btn-primary btn-sm mt-3" wire:click="Open">Upload</button>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                @forelse ($repo as $item)
                    <div class="col-sm-3 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <p class="card-category mb-2" style="font-size: 12px"><b>{{ Str::limit($item->title, 15) }}</b>
                                </p>
                                <div class="row align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="flaticon-folder"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ml-3 ml-sm-0">
                                        <div class="numbers">
                                            <p class="card-category" style="font-size: 12px">{{ Str::limit($item->kategori, 10) }}
                                            </p>
                                            <p class="card-category" style="font-size: 12px">
                                                <b>{{ date('d F Y', strtotime($item->created_at)) }}</b></p>
                                            <p class="card-category" style="font-size: 12px">Post By : <br>
                                                <b>{{ $item->user }}</b></p>
                                            <p class="card-category" style="font-size: 12px"><b>{{ $item->download }} <i class="icon-cloud-download"></i></b> <span><button class="btn btn-sm btn-primary shadow ml-2" wire:click="download({{ $item->id }})">Download</button></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <p class="text-center mt-3 ml-3">Dokumen Tidak Ditemukan.</p>
                @endforelse
            </div>
        </div>
        <div class="row mt--2 justify-content-center">
            {{ $repo->links() }}
        </div>
            <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        {{-- content --}}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Title</label>
                                <input type="text" placeholder="Ketik Judul File Disini" wire:model.defer="title"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-lg-6">
                                <label for="my-select">Kategori FIle</label>
                                <select  wire:model.defer="kategori" id="my-select" class="form-control form-control-sm">
                                    <option selected>Pilih Kategori File</option>
                                    @foreach ($selectoption as $item)
                                        <option value="{{ $item['nama'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">File</label>
                                <input type="file" class="form-control form-control-sm shadow" wire:ignore wire:model.defer="file">
                                {{-- <div class="row">
                                    <div class="col-4">
                                        @if ($file)
                                        File Preview:
                                        <img class="image-fluid" width="100" src="{{ $file->temporaryUrl() }}">
                                        @endif
                                    </div>
                                </div> --}}
                        </div>
                            <div class="col-md-6">
                                <label class="mt-3" for="">Deksripsi</label>
                                <textarea class="form-control shadow" wire:model="deskripsi" id="comment"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        {{-- last content --}}
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="store" class="btn btn-primary btn-sm">Upload</button>
                <button type="button" class="btn btn-secondary btn-sm">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>



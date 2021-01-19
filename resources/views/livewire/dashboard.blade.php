@section('title', 'Home')
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
                        <h2 class="text-dark pb-2 fw-bold">Upload Terbaru</h2>
                        <input class="form-control form-control-sm" wire:model="search" type="text" placeholder="Cari Dokumen">
                    </div>
                </div>
            </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                    @forelse ($repo as $item)                                         
                    <div class="col-sm-3 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <p class="card-category mb-2" style="font-size: 12px"><b>{{ Str::limit($item->title,15) }}</b></p>
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="flaticon-folder"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ml-3 ml-sm-0">
                                            <div class="numbers">
                                                {{-- <p class="card-category" style="font-size: 12px">{{ Str::limit($item->file,10) }}</p> --}}
                                                <p class="card-category" style="font-size: 12px">{{ $item->kategori }}</p>
                                                <p class="card-category" style="font-size: 12px"><b>{{ date('d F Y', strtotime ($item->created_at)) }}</b></p>
                                                <p class="card-category" style="font-size: 12px">Post By : <br> <b>{{ $item->user }}</b></p>
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
    </div>

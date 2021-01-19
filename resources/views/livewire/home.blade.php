@push('css')
    <link rel="stylesheet" href="{{ url('assets/front/css/style.css') }}">
@endpush
<div>
    <div class="row justify-content-center">
        <img src="{{ asset('assets/front/img/header.png') }}" width="600" alt="">
        <p style="font-size: 15px;">Selamat datang di website informasi STIKOM EL-RAHMA (Sekolah Tinggi Ilmu Komputer EL-RAHMA), website ini bertujuan untuk memberikan informasi seputar Modul Matakuliah dan Skripsi khusus untuk STIKOM EL-RAHMA BOGOR.</p>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <input type="text" class="form-control form-control-sm float-right shadow mt-0 mb-0" wire:model="search" placeholder="Cari Dokumen">
        </div>
    </div>
    <div class="row text-center justify-content-center overflow-auto repo-home">
        @forelse ($repo as $item)
            <div class="card shadow ml-3 mt-3" style="width: 16rem;cursor: pointer;">
                <img src="{{ asset('assets/front/img/4.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text mb-0" style="font-size: 13px;">{{ Str::limit($item->title,10) }}</p>
                  <p class="card-text mt-0" style="font-size: 13px;"><strong>{{ $item->user }}</strong></p>
                  <button class="btn btn-sm btn-detail" wire:click="selecttedItem({{ $item->id }},'Modal','download')">DETAIL</button>
                </div>
              </div>
              @empty
                  <div class="row justify-content-center mt-5">
                      <h5><b>Dokumen Yang Kamu Cari Tidak Ada</h5> <br>
                  </div>
        @endforelse
    </div>
    <div class="row mt-5" style="display: flex; justify-content:center;">
            {{ $repo->links() }}
    </div>

{{--  second  --}}
<div class="row" style="margin-top: 150px;">
<div class="col-lg-6">
    <h4>Bagaimana Cara Menggunakan-nya?</h4> 
</div>
</div>
<div class="row mt-5 mb-5 justify-content-center">
<div class="col-lg-4">
    <div class="card shadow" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('assets/front/img/1.png') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title" style="font-size: 15px">AKUN</h5>
            <p class="card-text" style="font-size:13px;">Kamu akan akan dibuatkan akun oleh admin setelah konfirmasi kepada pihak kampus terkait pembuatan akun.</p>
        </div>
        </div>
</div>
<div class="col-lg-4">
    <div class="card shadow" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('assets/front/img/2.png') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title" style="font-size: 15px">UPLOAD</h5>
            <p class="card-text" style="font-size:13px;">Setelah kamu mendapatkan/terdaftar pada website ini, kamu bisa upload file Tugas Akhir, Hasil penelitian dan lain-lain.</p>
        </div>
        </div>
</div>
<div class="col-lg-4">
    <div class="card shadow" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('assets/front/img/3.png') }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title" style="font-size: 15px">FLEKSIBEL</h5>
            <p class="card-text" style="font-size:13px;">Kamu dapat mengakses website ini dimana saja, kapan dan tidak ada batasan untuk mendownload file yang ada di website ini.</p>
        </div>
        </div>
</div>
</div>
{{--  last second  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-6">
                  <p>Post by: <br> {{ $user }}</p>
              </div>
              <div class="col-md-6">
                  <p>Kategori: <br> {{ $kategori }}}</p>
              </div>
          </div>
          <div class="row">
              <div class="col-md-6">
                  <p>Didownload: <br> {{ $download }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>Deskripsi: <br> {{ $content }}</p>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="button" class="btn btn-primary" wire:click="download({{ $idFile }})">Download</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
</div>


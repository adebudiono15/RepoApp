@section('title', 'Edit Password')
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
              <p>
                    Nama : {{ $name->name }} <br>
                    Email : {{ $name->email }} <br>
                    Bergabung : {{ date('d-m-Y', strtotime($name->created_at)) }}
              </div>
            </p>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="my-input">Password Lama</label>
                        <input type="password" wire:model="oldPassword" class="form-control form-control-sm shadow">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="my-input">Password Baru</label>
                        <input type="password" wire:model="newPassword" class="form-control form-control-sm shadow">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" wire:click="Submit({{ $name->id }})">Ganti Password</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>



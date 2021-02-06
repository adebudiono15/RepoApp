@section('title', 'Akun Baru')
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

            </div>
            </p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="my-input">Nama</label>
                        <input type="text" wire:model="name" class="form-control form-control-sm shadow">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="my-input">E-Mail</label>
                        <input type="email" wire:model="email" class="form-control form-control-sm shadow">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="my-input">Password</label>
                        <input type="password" wire:model="password" class="form-control form-control-sm shadow">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select wire:model.defer="userrole" id="my-select" class="form-control form-control-sm">
                            <option>Pilih Role User</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item['role'] }}">{{ $item['role'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" wire:click="Submit()">Buat Akun</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php

namespace App\Http\Livewire;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewAccount extends Component
{
    public $name,$email,$password,$role;
    public function render()
    {
        return view('livewire.new-account')->extends('layouts.master-app-dashboard');
    }

    public function Submit(){

        $data = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'SUKSES',
            'text' => 'Sukses Buat Akun',
            'timer' => 1500,
            'icon' => false,
            'showConfirmButton' => false,
            'position' => 'center'
        ]);
        $this->ResetInput();
    }

    public function ResetInput(){
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->role = null;
    }
}

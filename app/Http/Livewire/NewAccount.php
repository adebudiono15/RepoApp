<?php

namespace App\Http\Livewire;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewAccount extends Component
{
    public $name,$email,$password,$userrole;
    
    public function render()
    {

        $roles = array(
            ["role" => "admin"],
            ["role" => "user"]
        );
        return view('livewire.new-account',[
            'roles' => $roles
        ])->extends('layouts.master-app-dashboard');
    }

    public function Submit(){



        $data = User::insert([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->userrole,
            'password' => Hash::make($this->password)
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'SUKSES',
            'text' => 'Sukses Buat Akun',
            'timer' => 1500,
            'icon' => false,
            'showConfirmButton' => false,
            'position' => 'center'
        ]);
        // $this->ResetInput();
    }

    public function ResetInput(){
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->role = null;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PasswordController extends Component
{
    public $oldPassword;
    public $newPassword;

    public function render()
    {
        $name = Auth::user();
        return view('livewire.password-controller', [
            'name' => $name
        ])->extends('layouts.master-app-dashboard');
    }

    public function Submit($id)
    {

        $hashedPassword = Auth::user()->password;
        if (\Hash::check($this->oldPassword , $hashedPassword )) {
 
            if (!\Hash::check($this->newPassword , $hashedPassword)) {
    
                 $users = User::find(Auth::user()->id);
                 $users->password = bcrypt($this->newPassword);
                 User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
    
                 $this->dispatchBrowserEvent('swal', [
                    'title' => 'SUKSES',
                    'text' => 'Sukses Ganti Password',
                    'timer' => 1500,
                    'icon' => false,
                    'showConfirmButton' => false,
                    'position' => 'center'
                ]);
                $this->ResetInput();
                 return redirect()->back();
               }
    
               else{
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ERROR',
                    'text' => 'Password Lama Salah',
                    'timer' => 1500,
                    'icon' => false,
                    'showConfirmButton' => false,
                    'position' => 'center'
                ]);
                $this->ResetInput();
                     return redirect()->back();
                   }
    
              }
    
             else{
                $this->dispatchBrowserEvent('swal', [
                    'title' => 'ERROR',
                    'text' => 'Password Lama Tidak Sama',
                    'timer' => 1500,
                    'icon' => false,
                    'showConfirmButton' => false,
                    'position' => 'center'
                ]);
                $this->ResetInput();
                  return redirect()->back();
                }
    }

    public function ResetInput(){
        $this->oldPassword = null;
        $this->newPassword = null;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use  WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search = '';
    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {

        $repo = Upload::where('title', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(4);
       
        return view('livewire.dashboard',[
            'repo' => $repo
        ])->extends('layouts.master-app-dashboard');
    }

    public function download($id){

        if(Auth::user()){
              $file = Upload::find($id);
               $upload = $file->file;
               $download = $file->download;
               $add = 1;
               $newdownload = $download + $add;
               $file->download = $newdownload;
               $file->save();
               $this->dispatchBrowserEvent('swal', [
                   'title' => '😎',
                   'text' => 'Sukses Download',
                   'timer' => 1500,
                   'icon' => false,
                   'showConfirmButton' => false,
                   'position' => 'center'
               ]);
               return response()->download(storage_path('app/public/file/'.$upload));
           }else{
               $this->dispatchBrowserEvent('swal', [
                   'title' => '😎',
                   'text' => 'Siapa Antum ehehe...',
                   'timer' => 1500,
                   'icon' => false,
                   'showConfirmButton' => false,
                   'position' => 'center'
               ]);
           }
       }
}

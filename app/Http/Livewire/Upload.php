<?php

namespace App\Http\Livewire;

use App\Models\Upload as ModelsUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Webpatser\Uuid\Uuid;

class Upload extends Component
{
    use  WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    use WithFileUploads;

    public $title,$kategori,$deskripsi,$file;

    public function render()
    {
        $selectoption = array(
            ["nama" => "Modul Matakuliah"],
            ["nama" => "Skripsi"]
        );

        // dd($selectoption);
        $userId = Auth::user()->name;
        $repo = ModelsUpload::where('user',$userId)->where('title', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(4);
        return view('livewire.upload',[
            'repo' => $repo,
            'selectoption' => $selectoption
        ])->extends('layouts.master-app-dashboard');
    }

    public function Open(){
            $this->dispatchBrowserEvent('openModal');
    }

    public function file(){
        // $this->validate([
        //     'file' => 'image|max:1024',
        // ]);
    }
    public function store()
    {
        $user = Auth::user();
        
           $file = ($this->file.microtime().'.'.$this->file->extension());

           Storage::putFileAs(
               'public/file',
               $this->file,
               $file
           );


       $data =  ModelsUpload::insert([
           "uuid" => Uuid::generate(),
            "user" => $user->name,
            "title" => $this->title,
            "kategori" => $this->kategori,
            "content" => $this->deskripsi,
            "file" => $file,
            "download" => 0,
            "created_at" => now(),
            "updated_at" => now(),

        ]);

        $this->dispatchBrowserEvent('closeModal');
    }

    public function download($id){

     if(Auth::id()){
           $file = ModelsUpload::find($id);
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

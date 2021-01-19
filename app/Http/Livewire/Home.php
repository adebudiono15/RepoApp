<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public $selecttedItem;
    public $idFile,$user,$kategori,$title,$file,$content,$download;

    public function render()
    {

        $repo = Upload::where('title', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate('4');
        return view('livewire.home', [
            'repo' => $repo
        ])->layout('layouts.app');
    }
    public function selecttedItem($itemId, $action)
    {
        $id = $this->selecttedItem = $itemId;
        $upload = Upload::find($id);
        if ($action == 'Modal') {
            $this->idFile = $upload->id;
            $this->title = $upload->title;
            $this->user = $upload->user;
            $this->kategori = $upload->kategori;
            $this->content = $upload->content;
            $this->download = $upload->download;
            $this->dispatchBrowserEvent('openModal');
        }
        if ($action == 'download') {
            $this->dispatchBrowserEvent('closeModal');
        }
    }
    public function download($id)
    {
        if (Auth::id()) {
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
            $this->dispatchBrowserEvent('closeModal');
            return response()->download(storage_path('app/public/file/' . $upload));
        } else {
            return redirect('/login');
        }
    }
}

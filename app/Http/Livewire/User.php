<?php

namespace App\Http\Livewire;
use App\Models\User as UserModel;
use App\Models\Level;
use App\Models\Role;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    public $users = [];
    public $name = null;
    public $email = null;
    public $password = null;
    public $level;
    public $user_id = null;
    public $isModalOpen = 0;
    public $levels = [];
    public $updateMode = false;

    
    public function render()
    {
        $this->getUsers();
        $this->levels = Level::all();
        return view('livewire.user.index');
    }
    
    public function getUsers()
    {
        $this->users = UserModel::where('id', '<>', auth()->user()->id)->get();
    }
    public function create($id = NULL)
    {
        $this->resetForm();
        $this->isModalOpen();
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        if($user) {
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->email = $user->email;
            if($user->role) {
                $this->level = $user->role->level_id;
            }
            $this->emit('openModal');
        }
    }

    private function openModal()
    {
        $this->isModalOpen = 1;
    }

    private function resetForm()
    {
        $this->name = null;
        $this->user_id = null;
        $this->email = null;
        $this->password = null;
        $this->level = null;
    }

    public function store()
    {
        $rules = !empty($this->user_id) ? [
            'name' => 'required',
            'email' => 'required|email',
            'level' => 'required'
        ] : [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'level' => 'required'
        ];
        $this->validate($rules);

        $user = !empty($this->user_id) ? UserModel::find($this->user_id) : new UserModel();
        $user->name = trim($this->name);
        $user->email = trim($this->email);
        if(!empty($this->password)) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        // inser role
        $role = Role::where('user_id', $user->id)->first() ? Role::where('user_id', $user->id)->first() : new Role();
        $role->user_id = $user->id;
        $role->level_id = $this->level;
        $role->save();

        $message = !empty($this->user_id) ? 'User berhasil diperbaharui' : 'User berhasil ditambahkan';
        session()->flash('message', $message);

        $this->resetForm();

        $this->emit('userStore'); // Close model by using jquery/javascript
    }

    public function delete($id)
    {
        $user = UserModel::find($id);
        if($user) {
            $user->delete();
            session()->flash('message', 'User berhasil dihapus');
        }
    }
}

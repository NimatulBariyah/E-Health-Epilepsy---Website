<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use Illuminate\Http\Request;

class FormLogin extends Component
{
    public $email;
    public $password;

    /**
     * Post Login
     */
    public function login(Request $request)
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if( Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ]) ) {
            $user = Auth::user();
            if(empty($user->role)) {
                session()->flash('error', 'Akun anda tidak memiliki role, silahkan hubungi operator');
                return redirect()->route('login');
            }
            
            // get menu by role 
            $menus = Menu::where('level_id', $user->role->level_id)->get();
            $request->session()->put('user', $user);
            $request->session()->put('menus', $menus);
            View::share('menus', $menus);
            return redirect()->route('dashboard');
        }
        else {
            session()->flash('error', 'Email atau password salah!');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.form-login');
    }
}
 
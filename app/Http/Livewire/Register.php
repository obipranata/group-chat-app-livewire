<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6'
    ];

    public function register(){
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        if (!session()->isStarted()) {
            session()->start();
        }
        session()->put("logged", true);
        session()->put("idPengguna", $user->id);
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.register');
    }
}

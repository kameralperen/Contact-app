<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PSpell\Config;

class AdminController extends Controller
{
    public function __construct() {}

    public function index()
    {
        return view('admin.index');
    }

    public function page()
    {
        return view('admin.home');
    }

    public function adminUsers()
    {
        $users = User::get();

        return view('admin.users', compact('users'));
    }

    public function adminContacts()
    {
        $contacts = Contact::get();

        return view('admin.contacts', compact('contacts'));
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.userEdit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|max:255',
            'role' => 'required|in:admin,user'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('admin.users', $id)->with('success', 'Kullanıcı kaydı başarıyla güncellendi.');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->name === 'Admin') {
            abort(403, 'Bu kullanıcı silinemez.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Kullanıcı başarıyla silindi');
    }

    public function makeUserToAdmin($id)
    {
        $user = User::findOrFail($id);

        $user->role = 'admin';
        $user->save();

        return redirect()->back()->with('success', 'Kullanıcı başarıyla admin yapıldı');
    }

    public function contactEdit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('admin.contactEdit', compact('contact'));
    }

    public function contactUpdate(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->name = $request->name;
        $contact->last_name = $request->last_name;
        $contact->phone_number = $request->phone_number;
        $contact->description = $request->description;

        $contact->save();

        return redirect()->route('admin.contacts', $contact->id)->with('success', 'Kişi rehberde başarıyla güncellendi.');
    }


    public function contactDestroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->back()->with('success', 'Kişi Rehberden başarıyla silindi');
    }
}

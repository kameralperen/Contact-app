<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('name')->get();
        return view('home', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }


    public function edit($id)
    {

        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $contact = Contact::findOrFail($id);

        return view('contacts.edit', compact('contact'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'name'        => 'required|max:255',
            'last_name'   => 'required|max:255',
            'phone_number' => 'required|string|max:16',
            'description' => 'nullable|max:255',
        ]);

        $contact = Contact::findOrFail($id);


        if ($request->hasFile('photo')) {
            if ($contact->photo && file_exists(public_path('uploads/photos/' . $contact->photo))) {
                unlink(public_path('uploads/photos/' . $contact->photo));
            }

            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/photos'), $photoName);
            $contact->photo = $photoName;
        }

        $contact->name        = $request->name;
        $contact->last_name   = $request->last_name;
        $contact->phone_number = $request->phone_number;
        $contact->description = $request->description;
        $contact->save();

        return redirect()->route('contacts.edit', $contact->id)->with('success', 'Kişi başarıyla güncellendi.');
    }


    public function delete($id)
    {
        $user = Contact::findOrFail($id);

        $user->delete();

        return redirect()->route('home')->with('success', 'Kişi başarıyla silindi.');;
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'name'        => 'required|max:255',
            'last_name'   => 'required|max:255',
            'phone_number' => 'required|numeric',
            'description' => 'nullable|max:255',
        ]);

        $contact = new Contact();

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/photos'), $photoName);
            $contact->photo = $photoName;
        } else {
            $contact->photo = 'default.jpg';
        }

        $contact->name        = $request->name;
        $contact->last_name   = $request->last_name;
        $contact->phone_number = $request->phone_number;
        $contact->description = $request->description;

        $contact->save();

        return redirect()->route('home')->with('success', 'Yeni kişi başarıyla eklendi.');
    }
}

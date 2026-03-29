<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Database;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        $contacts = $this->database->getReference('contacts')->orderByChild('first_name')->getValue() ?? [];
        $total_contacts = $this->database->getReference('contacts')->getSnapshot()->numChildren();
        return view('contact.index', compact('contacts', 'total_contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $id = Str::uuid()->toString();

        try {
            $this->database->getReference('contacts/' . $id)->set([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            return redirect()->route('contacts.index')->with('success', 'Contact added successfully');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->route('contacts.index')->with('error', 'Contact not added!');
        }
    }

    public function edit($id)
    {
        $contact = $this->database->getReference('contacts/' . $id)->getValue();
        return view('contact.edit', compact('contact', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        try {
            $this->database
                ->getReference('contacts/' . $id)
                ->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
            ]);

            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('error', 'Contact not updated!');
        }
    }

    public function destroy($id) {
        try{
            $this->database
                ->getReference('contacts/' . $id)
                ->remove();

            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
        }catch(Exception $e){
            Log::error($e);
            return redirect()->route('contacts.index')->with('error', 'Contact not deleted!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Illuminate\Support\Str;

class ContactController extends Controller
{

    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index(){
        $contacts = $this->database
            ->getReference('contacts')
            ->orderByChild('first_name')
            ->getValue() ?? [];
        return view('contact.index', compact('contacts'));
    }

    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $id = Str::uuid()->toString();

        try{
            $this->database
                ->getReference('contacts/'. $id)
                ->set([
                    'first_name' =>$request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'email' => $request->email
                ]);

                return redirect()->route('contacts.index')->with('success', 'Contact added successfully');
        }catch(Exception $e){
            return redirect()->route('contacts.index')->with('error', 'Contact not added!');
        }
    }
}

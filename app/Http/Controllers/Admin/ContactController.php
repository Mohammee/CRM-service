<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Mobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ContactController extends Controller
{


    public function index()
    {
        $contacts = Contact::filter()->with('mobiles')->paginate(5);

        return view('backend.contacts.index', compact('contacts'));
    }


    public function create()
    {
        $contact = new Contact();
        return view('backend.contacts.create', compact('contact'));
    }


    public function edit(Contact $contact)
    {
        return view('backend.contacts.edit', compact('contact'));
    }

    public function store(ContactRequest $request)
    {

       $data = $request->validated();

       if($request->hasFile('avatar')){
           $avatar = $request->file('avatar')->store();

           $data['avatar'] = $avatar;
       }

        try {
           DB::beginTransaction();

           $contact = Contact::query()->create($data);

            $contact->mobiles()->createMany($data('mobiles', []));

           DB::commit();

        }catch (\Exception $e){
           DB::rollBack();

           return Redirect::back()->withInput()->withErrors('Something wrong.');
        }

       return Redirect::route('admin.contacts.index')->with('success', 'Contact created successfully.');
    }

    public function update(ContactRequest $request, Contact $contact)
    {


        $data = $request->validated();

        if($request->hasFile('avatar')){

            $file = $request->file('avatar');
            $avatar_name = $contact->avatar ?? Str::random(20) . $file->getClientOriginalExtension();
            $data['avatar'] = $file->storeAs('', $avatar_name);
        }

        try {
            DB::beginTransaction();

            $contact->update($data);

            foreach($data['mobiles'] as $mobile){
               Mobile::updateOrCreate(['id' => $mobile['id']], array_merge(['contact_id' => $contact->id],$mobile));
            }

            DB::commit();

        }catch (\Exception $e){
            DB::rollBack();

            return Redirect::back()->withInput()->withErrors('Something wrong.');
        }

        return Redirect::route('admin.contacts.index')->with('success', 'Contact Updated successfully.');
    }

    public function destroy($id)
    {
        $id = Contact::destroy($id);

        if(!$id){
            return Redirect::back()->withErrors('Contact cannot found!');
        }

        return Redirect::route('admin.contacts.index')->with('success', 'Contact deleted successfully.');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    // show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create()
    {
        return view('listings.create');
    }

    // store form
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'description' => 'required',
            'website' => 'required',
            'email' => ['required', 'email', Rule::unique('listings', 'email')],
            'location' => 'required',
            'tags' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $validateData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($validateData);

        return redirect('/')->with('message', 'Your listing has been created');
    }

    // show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    // update form

    public function update(Request $request, Listing $listing)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')->ignore($listing->id)],
            'description' => 'required',
            'website' => 'required',
            'email' => ['required', 'email', Rule::unique('listings', 'email')->ignore($listing->id)],
            'location' => 'required',
            'tags' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $validateData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($validateData);

        return back()->with('message', 'Listing Updated Successfully');
    }

    // delete form
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }
}

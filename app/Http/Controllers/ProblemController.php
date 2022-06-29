<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProblemController extends Controller
{
    //
    public function index()
    {

        return view('problems.index', [
            'heading' => 'Latest Problems',
            'problems' => Problem::latest()->filter(request(['tag', 'search']))->simplePaginate(3)
        ]);
    }
    public function show($id)
    {
        $problem = Problem::find($id);
        if ($problem) {
            return view(
                'problems.show',
                [
                    'problem' => $problem
                ]
            );
        } else {
            abort('404');
        }
    }

    public function create()
    {

        return view('problems.create');
    }

    public function store(Request $req)
    {
        $formVal = $req->validate([
            'title' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($req->hasFile('p_file')) {
            $formVal['p_file'] = $req->file('p_file')->store('files', 'public');
        }

        Problem::create($formVal);

        Session::flash('msg', 'Problem Created');

        return redirect('/');
    }

    //Show edit form
    public function edit($id)
    {
        $problem = Problem::find($id);
        return view('problems.edit', ['problem' => $problem]);
    }

    //Show update form
    public function update($id, Request $req)
    {
        $formVal = $req->validate([
            'title' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($req->hasFile('p_file')) {
            $formVal['p_file'] = $req->file('p_file')->store('files', 'public');
        }

        $problem = Problem::find($id);
        $problem->update($formVal);

        Session::flash('msg', 'Problem Updated');


        return redirect('/');
    }

    //Show delete form
    public function delete($id, Request $req)
    {

        $problem = Problem::find($id);
        $problem->delete();
        Session::flash('msg', 'Problem Deleted');


        return redirect('/');
    }
}

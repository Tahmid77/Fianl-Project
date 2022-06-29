<?php

namespace App\Http\Controllers;

use App\Models\Problem;

use Illuminate\Http\Request;

class ProblemController extends Controller
{
    //
    public function index()
    {

        return view('problems.index', [
            'heading' => 'Latest Problems',
            'problems' => Problem::latest()->filter(request(['tag']))->get()
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
}

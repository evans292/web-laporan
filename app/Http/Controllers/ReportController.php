<?php

namespace App\Http\Controllers;

use App\Report;
use App\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reports = Report::orderBy('created_at', 'desc')->paginate(5);
        return view('reports.index', compact('reports'));
    }

    public function myReports()
    {
        $id = Auth::user()->id;
        $reports = Report::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $title = "Laporan Anda";
        return view('reports.index', compact('reports', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        //
        $attr = $request->all();
        // slug
        $slug = Str::slug($request->judul);
        $attr['slug'] = $slug;

        // upload image
        $thumbnail = request()->file('foto');

        // simple cara upload dan cek apabila tidak ada image
        $upload = $thumbnail ? $thumbnail->storeAs("images/posts", "{$slug}.{$thumbnail->extension()}") : null;
        $attr['foto'] = $upload;

        // create new report
        $report = auth()->user()->reports()->create($attr);

        return redirect('/reports')->with('status', 'Laporan terkirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $report = Report::where('slug', $slug)->firstOrFail();
        $comments = Comment::orderBy('created_at', 'desc')->paginate(5);
        return view('reports.show', compact('report', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

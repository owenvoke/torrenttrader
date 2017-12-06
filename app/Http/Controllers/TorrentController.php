<?php

namespace App\Http\Controllers;

use App\Torrent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TorrentController extends Controller
{
    /**
     * TorrentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')
             ->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torrents = Torrent::paginate(50);

        $data = [
            'torrents' => $torrents,
        ];

        return view('torrents.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $torrent = new Torrent();

        $torrent->info_hash = $request->input('info_hash');
        $torrent->title = $request->input('title');
        $torrent->description = $request->input('description');
        $torrent->category_id = $request->input('category_id');
        $torrent->user_id = Auth::user()->id;

        if ($torrent->save()) {
            return redirect(route('torrents.show', $torrent->id));
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Torrent $torrent
     * @return \Illuminate\Http\Response
     */
    public function show(Torrent $torrent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Torrent $torrent
     * @return \Illuminate\Http\Response
     */
    public function edit(Torrent $torrent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Torrent             $torrent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Torrent $torrent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Torrent $torrent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Torrent $torrent)
    {
        //
    }

    public function validator($data, $type = 'create')
    {
        switch ($type) {
            case 'create':
            default:
                return Validator::make($data, [
                    'info_hash'   => 'required|size:40|string',
                    'title'       => 'required|min:3|max:500|string',
                    'description' => 'nullable|string',
                    'category_id' => 'required|int',
                    'size'        => 'int',
                    'downloads'   => 'int',
                    'user_id'     => 'required|int',
                ]);
                break;
        }
    }
}

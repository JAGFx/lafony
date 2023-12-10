<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAudioRequest;
use App\Http\Requests\UpdateAudioRequest;
use App\Models\Audio;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;

class AudioController extends Controller
{
    public function index(): View
    {
        return ViewFacade::make('audios/index', [
            'audios' => Audio::all(),
        ]);
    }

    //    /**
    //     * Show the form for creating a new resource.
    //     */
    //    public function create()
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Store a newly created resource in storage.
    //     */
    //    public function store(StoreAudioRequest $request)
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Display the specified resource.
    //     */
    //    public function show(Audio $audio)
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Show the form for editing the specified resource.
    //     */
    //    public function edit(Audio $audio)
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Update the specified resource in storage.
    //     */
    //    public function update(UpdateAudioRequest $request, Audio $audio)
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Remove the specified resource from storage.
    //     */
    //    public function destroy(Audio $audio)
    //    {
    //        //
    //    }
}

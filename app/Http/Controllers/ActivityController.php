<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = Activity::all();
        $activities = $activities->where('user_id', auth()->user()->id);
        return Inertia::render('Horario', ['activities' => $activities]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $activity = new Activity();
        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->user_id = $request->user_id;

        $activity->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @param  \App\Models\User  $user
     * @return \Inertia\Inertia
     */
    public function show(User $user, Activity $activity)
    {
        //
        $activities = $activity->where('user_id', $user->id)->get();
        return Inertia::render('Horario', ['activities' => $activities]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
        return Inertia::render('Horario', ['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
        return Response::create('Actividad actualizada', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
        return Response::create('Actividad eliminada', 201);
    }
}
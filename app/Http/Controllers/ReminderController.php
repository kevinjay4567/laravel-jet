<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reminders = Reminder::all();
        $reminders = $reminders->where('user_id', auth()->user()->id);
        return Inertia::render('Agenda', ['reminders' => $reminders]);
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
        $reminder = new Reminder();
        $reminder->title = $request->title;
        $reminder->note = $request->note;
        $reminder->date = $request->datetime;
        $reminder->user_id = $request->user_id;

        $reminder->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
        $show = Reminder::find($reminder->id);
        return Inertia::render('Agenda_reminder', ['show' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        //
        $update = Reminder::find($reminder->id);
        $update->title = $request->title;
        $update->note = $request->note;
        $update->date = $request->datetime;

        $update->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
        $delete = Reminder::find($reminder->id);
        $delete->delete();
    }
}

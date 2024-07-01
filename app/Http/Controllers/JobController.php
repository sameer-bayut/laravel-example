<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Job::with('employer')->paginate(2);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
    
    
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
    
        
        return $job;
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $fetched_job = Job::find($job);

        if(!$fetched_job){
            return ['message' => 'Job Not Found'];
        }

        return $fetched_job;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        $job->title = request('title');
        $job->salary = request('salary');

        return $job;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return ['message' => 'Deleted Job Successfully'];
    }
}

<?php
   namespace App\Http\Controllers\Api;

   use App\Http\Controllers\Controller;
   use App\Http\Resources\JobResource;
   use App\Models\Job;
   use Illuminate\Http\Request;

   class JobController extends Controller
   {
       public function index()
       {
           return JobResource::collection(Job::all());
       }

       public function store(Request $request)
       {
           $validated = $request->validate([
               'title' => 'required|string|max:255',
               'type' => 'required|in:Full Time,Part Time,Internship',
               'status' => 'required|in:Active,Expired,Draft',
               'applications' => 'required|integer|min:0',
               'duration' => 'required|string|max:255',
               'description' => 'required|string',
           ]);

           $job = Job::create($validated);
           return new JobResource($job);
       }

       public function show(Job $job)
       {
           return new JobResource($job);
       }

       public function update(Request $request, Job $job)
       {
           $validated = $request->validate([
               'title' => 'required|string|max:255',
               'type' => 'required|in:Full Time,Part Time,Internship',
               'status' => 'required|in:Active,Expired,Draft',
               'applications' => 'required|integer|min:0',
               'duration' => 'required|string|max:255',
               'description' => 'required|string',
           ]);

           $job->update($validated);
           return new JobResource($job);
       }

       public function destroy(Job $job)
       {
           $job->delete();
           return response()->json(null, 204);
       }
   }
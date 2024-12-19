<?php
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $job = Job::with('employer')->simplePaginate(3);
    return view('jobs', [
        'jobs' => $job
    ]);
});

Route::get('/jobs/{id}', function ($id){
//    $job = Arr::first(Job::all(), fn($job) => $job['id']==$id);
    $job = Job::find($id);
    return view('job', ['job'=>$job]);
});

Route::get('/contact', function () {
    return view('contact');
});

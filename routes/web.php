<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/project-preview/{slug}', function (string $slug) {
    $projects = [
        'hamro-bhansa' => [
            'title' => 'Hamro-bhansa',
            'description' => 'Web application project from my GitHub profile.',
            'github_url' => 'https://github.com/Bishal10000/Hamro-bhansa',
            'stack' => ['PHP', 'Web App'],
        ],
        'exam-hub' => [
            'title' => 'Exam-hub',
            'description' => 'Exam platform project from my GitHub profile.',
            'github_url' => 'https://github.com/Bishal10000/Exam-hub',
            'stack' => ['PHP', 'Education'],
        ],
        'blood-donor-management' => [
            'title' => 'Blood-Donor-Management',
            'description' => 'A web-based platform connecting blood donors with recipients in specific regions.',
            'github_url' => 'https://github.com/Bishal10000/Blood-Donor-Management',
            'stack' => ['PHP', 'Laravel', 'MySQL'],
        ],
        'bishalaryal' => [
            'title' => 'bishalaryal',
            'description' => 'Personal portfolio repository.',
            'github_url' => 'https://github.com/Bishal10000/bishalaryal',
            'stack' => ['Laravel', 'Blade', 'Tailwind CSS'],
            'external_live_url' => 'https://bishal10.com.np',
        ],
        'fundhive' => [
            'title' => 'fundhive',
            'description' => 'Crowdfunding platform repository from my GitHub profile.',
            'github_url' => 'https://github.com/Bishal10000/fundhive',
            'stack' => ['PHP', 'Laravel', 'MySQL'],
        ],
    ];

    abort_unless(isset($projects[$slug]), 404);

    return view('project-preview', [
        'project' => $projects[$slug],
        'slug' => $slug,
    ]);
})->name('project.preview');

Route::get('/skills', function () {
    return view('skills');
});

Route::get('/process', function () {
    return view('process');
});

Route::get('/contact', function () {
    return view('contact');
});

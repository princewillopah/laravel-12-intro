<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('main-pages.about');
});

Route::get('/coders', function () {

    $my_coders = [
        ["id" => 1, "name" => "John Doe", "age" => 25, "programming_skills" => ["PHP", "JavaScript"], "sex" => "Male"],
        ["id" => 2, "name" => "Jane Smith", "age" => 28, "programming_skills" => ["Python", "Django"], "sex" => "Female"],
        ["id" => 3, "name" => "Mike Johnson", "age" => 20, "programming_skills" => ["Java", "Spring Boot"], "sex" => "Male"],
        ["id" => 4, "name" => "Emily Davis", "age" => 26, "programming_skills" => ["C#", ".NET"], "sex" => "Female"],
        ["id" => 5, "name" => "Robert Brown", "age" => 19, "programming_skills" => ["Go", "Docker"], "sex" => "Male"],
        ["id" => 6, "name" => "Sarah Wilson", "age" => 29, "programming_skills" => ["JavaScript", "React"], "sex" => "Female"],
        ["id" => 7, "name" => "David Lee", "age" => 27, "programming_skills" => ["Python", "Flask"], "sex" => "Male"],
        ["id" => 8, "name" => "Laura Adams", "age" => 31, "programming_skills" => ["Ruby", "Rails"], "sex" => "Female"],
        ["id" => 9, "name" => "James White", "age" => 33, "programming_skills" => ["C++", "QT"], "sex" => "Male"],
        ["id" => 10, "name" => "Olivia Martin", "age" => 24, "programming_skills" => ["JavaScript", "Vue.js"], "sex" => "Female"],
        ["id" => 11, "name" => "Daniel Harris", "age" => 29, "programming_skills" => ["PHP", "Laravel"], "sex" => "Male"],
        ["id" => 12, "name" => "Sophia Clark", "age" => 32, "programming_skills" => ["Swift", "iOS"], "sex" => "Female"],
        ["id" => 13, "name" => "Henry Lewis", "age" => 28, "programming_skills" => ["Rust", "WebAssembly"], "sex" => "Male"],
        ["id" => 14, "name" => "Grace Hall", "age" => 30, "programming_skills" => ["Kotlin", "Android"], "sex" => "Female"],
        ["id" => 15, "name" => "Ethan Allen", "age" => 26, "programming_skills" => ["TypeScript", "Angular"], "sex" => "Male"],
        ["id" => 16, "name" => "Zoe King", "age" => 27, "programming_skills" => ["Scala", "Akka"], "sex" => "Female"],
        ["id" => 17, "name" => "Matthew Scott", "age" => 34, "programming_skills" => ["Elixir", "Phoenix"], "sex" => "Male"],
        ["id" => 18, "name" => "Lily Baker", "age" => 25, "programming_skills" => ["Perl", "CGI"], "sex" => "Female"],
        ["id" => 19, "name" => "Nathan Green", "age" => 29, "programming_skills" => ["Haskell", "Functional Programming"], "sex" => "Male"],
        ["id" => 20, "name" => "Ava Turner", "age" => 30, "programming_skills" => ["C", "Embedded Systems"], "sex" => "Female"]
    ];

    return view('main-pages.programmers', ['greetings' => "New Coders!", 'coders_names' => $my_coders]);
});

Route::get('/coder/{id}', function ($id) {
    return view('main-pages.coders-show', ['coder_id' => $id]);
});
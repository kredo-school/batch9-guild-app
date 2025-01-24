@extends('layouts.user-app')

@section('title', 'Dashboard for Freelancer')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-8">
            <h2>ON GOING</h2>
            <div class="ongoing row mb-3">
                <div class="col-1 bg-secondary">
                    <p>By June</p>
                </div>
                <div class="col">
                    <h3 class="h5 m-0">Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h3>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="row justify-content-center">
        {{-- Left side --}}
        <div class="col-4 p-5">
            {{-- Profile --}}
            <div class="profile-sm row mb-5">
                <div class="col-2 me-3">
                    <i class="fa-solid fa-user-circle fa-5x"></i>
                </div>
                <div class="col">
                    <h3>Ryunosuke</h3>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            {{-- Todo List --}}
            <div class="todo row">
                <h3>ToDo List</h3>
                <ul>
                    <li>Task 1</li>
                    <li>Task 2</li>
                    <li>Task 3</li>
                    <li>Task 4</li>
                    <li>Task 5</li>
                </ul>
            </div>
        </div>
        <div class="col-7 p-5">
            <div class="suggested-job row">
                <h3>Recent Job</h3>
                <a class="job" href="/job-details">
                    <div class="row">
                        <div class="col-11">
                            <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                        </div>
                        <div class="col-1">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                    </div>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </a>
                <div class="job">
                    <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </div>
                <div class="job">
                    <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </div>
                <div class="job">
                    <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </div>
                <div class="job">
                    <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </div>
                <div class="job">
                    <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </div>
                <div class="job">
                    <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </div>
                <div class="job">
                    <h4>Very simple Sketchup Plugin to connect with our Webapp Oauth ....</h4>
                    <p class="fw-bold m-0">Kredo Company</p>
                    <p class="m-0">$1000</p>
                    <p>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Javascript</span>
                </div>
            </div>
        </div>
    </div>
@endsection

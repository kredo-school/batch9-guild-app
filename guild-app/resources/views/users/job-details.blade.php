@extends('layouts.user-app')

@section('title', 'Job Details')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-8">
            <div class="job-header">
                <h3>JOB DETAILS</h3>
                <i class="fa-regular fa-heart fa-2x like"></i>
            </div>
            <div class="details mt-5">
                <div class="row">

                    <div class="col">
                        <h4 class="h5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis eaque illum voluptatem atque tempora, aliquid veniam, nulla eius dignissimos quaerat aliquam enim quis doloremque aperiam ad cum quisquam in adipisci?</h4>
                        <p class="fw-bold m-0">Kredo Company</p>
                        <p class="m-0">$1000</p>
                        <p>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </p>
                        <p>Start: 01/Jun/2025</p>
                        <p>Deadline: 01/Jun/2025</p>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <h4>DESCRIPTION</h4>
                    <div class="col-1"></div>
                    <div class="col">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat aperiam est iusto blanditiis labore aliquam unde hic qui quae, fugiat nesciunt cum doloribus eum eligendi doloremque dolores molestiae, reiciendis fuga error odit a excepturi similique dicta! In commodi repudiandae modi delectus explicabo quos cumque unde ullam, tempora amet iure obcaecati itaque iste laboriosam sapiente facere excepturi recusandae magnam at quod neque! Aliquam consequuntur dicta reiciendis dolores veniam doloremque aut voluptatum. Voluptatem unde nisi eaque ea veniam asperiores aperiam in officia minus beatae nulla enim velit, molestiae quae, ab aliquam harum, ut quas corporis quaerat. Aut atque officiis praesentium corrupti tempore.</p>
                    </div>
                </div>
                <h4 class="mb-3">REQUIRED SKILLS</h4>
                <span class="skill-tag">HTML</span>
                <span class="skill-tag">CSS</span>
                <span class="skill-tag">PHP</span>
                <span class="skill-tag">Javascript</span>

                <hr>

                <h4>Comments</h4>
                <div class="comments">
                    <div class="message user">
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>

                    <div class="message other">
                        <div class="chat-icon">
                            <i class="fa-solid fa-user-circle fa-3x"></i>
                        </div>
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>

                    <div class="message user">
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>

                    <div class="message other">
                        <div class="chat-icon">
                            <i class="fa-solid fa-user-circle fa-3x"></i>
                        </div>
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>
                    <div class="message user">
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>
                    <div class="message other">
                        <div class="chat-icon">
                            <i class="fa-solid fa-user-circle fa-3x"></i>
                        </div>
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>
                    <div class="message user">
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>

                    <div class="message other">
                        <div class="chat-icon">
                            <i class="fa-solid fa-user-circle fa-3x"></i>
                        </div>
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>

                    <div class="message other">
                        <div class="chat-icon">
                            <i class="fa-solid fa-user-circle fa-3x"></i>
                        </div>
                        <div class="bubble">
                            Hello! I'm interested in this job.
                        </div>
                    </div>

                </div>
                <form action="#" method="post" class="comment-form">
                    <input type="text" class="comment-input" placeholder="Write a comment...">
                    <button type="submit" class="comment-btn">Send</button>
                </form>

                <hr>

                <!-- Button trigger modal -->
                <button type="button" class="request-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Request
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        ...
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

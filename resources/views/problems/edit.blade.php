@extends('layout')
@section('content')
<div
                    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Edit a Gig
                        </h2>
                        <p class="mb-4">Edit: {{$problem->title}} </p>
                    </header>

                    <form method="POST" action="/problems/{{$problem->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Job Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Senior Laravel Developer"
                                value="{{$problem->title}}"
                            />
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{$problem->email}}"
                            />
                        </div>

                        <div class="mb-6">
                            <label
                                for="mobile"
                                class="inline-block text-lg mb-2"
                            >
                                Mobile
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="mobile"
                                value="{{$problem->mobile}}"
                            />
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: Laravel, Backend, Postgres, etc"
                                value="{{$problem->tags}}"
                            />
                        </div>

                        <div class="mb-6">
                            <label for="p_file" class="inline-block text-lg mb-2">
                                Problem File
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="p_file"
                            />

                            <img
                            class="w-48 mr-6 mb-6"
                            src="{{$problem->p_file ? asset('storage/'.$problem->p_file) : asset('images/no-image.png')}}"
                            alt=""
                           />

                            @error('file')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                            >{{$problem->description}}
                        </textarea>
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Create Gig
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>
@endsection

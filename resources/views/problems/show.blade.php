@extends('layout')
@section('content')
<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$problem->p_file ? asset('storage/'.$problem->p_file) : asset('images/no-image.png')}}"
                            alt=""
                        />
                        <a href="{{'../storage/'.$problem->p_file}}">sakin</a>

                        <h3 class="text-2xl mb-2">{{$problem->title}}</h3>
                        <x-problem-tags :tagsCsv="$problem->tags"></x-problem-tags>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$problem->description}}

                                <a
                                    {{-- href="mailto:{{$problem->email}}"  ekhane problem poster er email hbe--}}
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>

                <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/problems/{{$problem->id}}/edit">
                        <i class="fa-solid fa-pencil">
                            Edit
                        </i>
                    </a>
                    <form method="POST" action="/problems/{{$problem->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </x-card>
            </div> 
@endsection

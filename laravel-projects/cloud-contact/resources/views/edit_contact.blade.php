@extends('layouts.master')
@section('title', 'Add Contact')
@section('content')
    <section class="">
        <div class="py-5 lg:py-10 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Edit Contact
            </h2>
            <form action={{ url("/contacts/update/$contact->id")}} class="space-y-8" method="POST">
                @csrf {{-- Generate hidden csrf token input field --}}
                @method('PUT')
                <div>
                    <label for="contactName"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input type="text" id="contactName" name="contactName" value="{{ $contact->name }}"
                    class="bg-zinc-900 shadow-sm border-b border-gray-300 text-white text-sm block w-full py-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none dark:shadow-sm-light">
                    @error('contactName')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="contactNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone
                        No.</label>
                    <input type="text" id="contactNumber" name="contactNumber" value="{{ $contact->phone }}"
                    class="bg-zinc-900 shadow-sm border-b border-gray-300 text-white text-sm block w-full py-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none dark:shadow-sm-light">
                    @error('contactNumber')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="py-3 px-5 text-sm font-medium text-center text-black rounded-lg bg-white sm:w-fit hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit</button>
            </form>
        </div>
    </section>
@endsection

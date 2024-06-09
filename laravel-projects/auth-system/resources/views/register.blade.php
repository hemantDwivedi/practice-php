@extends("layouts.default")
@section("title", "Register")
@section("content")
<div class="w-full flex flex-wrap h-screen">
    <div class="w-full md:w-1/2 flex flex-col">
        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-3xl">Join Us.</p>
            <form class="flex flex-col pt-3 md:pt-8" method="post" action="{{route("register.post")}}">
                @csrf
                <div class="flex flex-col pt-4">
                    <label for="name" class="text-lg">Name</label>
                    <input type="text" id="name" name="fullName" placeholder="John Smith" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    <span class="text-red-500 mt-2">
                        @error('fullName'){{$message}}@enderror
                    </span>
                </div>

                <div class="flex flex-col pt-4">
                    <label for="email" class="text-lg">Email</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    <span class="text-red-500 mt-2">
                        @error('email'){{$message}}@enderror
                    </span>
                </div>

                <div class="flex flex-col pt-4">
                    <label for="password" class="text-lg">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    <span class="text-red-500 mt-2">
                        @error('password'){{$message}}@enderror
                    </span>
                </div>

                <div class="flex flex-col pt-4">
                    <label for="confirm-password" class="text-lg">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirmPassword" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    <span class="text-red-500 mt-2">
                        @error('confirmPassword'){{$message}}@enderror
                    </span>
                </div>

                <input type="submit" value="Register" class="cursor-pointer bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" />
            </form>
            <div class="text-center pt-12 pb-12">
                <p>Already have an account? <a href="/login" class="underline font-semibold">Log in here.</a></p>
            </div>
        </div>

    </div>
    <div class="w-1/2 shadow-2xl">
        <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0" alt="Background" />
    </div>
</div>

@endsection
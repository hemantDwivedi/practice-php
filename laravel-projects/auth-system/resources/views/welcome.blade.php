@extends("layouts.default")
@section("title", "Auth System")
@section("content")
<div class="flex items-center justify-center h-screen">

    <div class=" text-black font-bold shadow-lg p-10">
        <h1>
            Authentication System
        </h1>
        <p class="text-gray-400">An authentication system is a security mechanism that verifies a user's identity to grant access to systems and resources.</p>
    </div>

</div>

@includeIf('footer.footer')
@endsection
@extends('layouts.master')
@section('title', 'Contacts')
@section('content')
    <div class="relative overflow-x-auto rounded-lg p-5">
        <table class="w-full lg:w-[70%] text-sm text-center mx-auto rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:bg-zinc-800 dark:text-gray-100">
                <tr class="flex w-full text-left">
                    <th class="p-4 w-1/4">Name</th>
                    <th class="p-4 w-1/4">Phone</th>
                    <th class="p-4 w-1/4">Saved At</th>
                    <th class="p-4 w-1/4">Actions</th>
                </tr>
            </thead>
            <tbody class="w-full flex flex-col items-center justify-between overflow-y-scroll h-[60vh]">
                @foreach ($contacts as $contacts)
                    <tr class="border-b-2 border-gray-800 hover:bg-zinc-800 text-left w-full flex mb-4">
                        <td scope="row" class="p-4 w-1/4">
                            {{$contacts->name}}
                        </td>
                        <td class="p-4 w-1/4">
                            {{$contacts->phone}}
                        </td>
                        <td class="p-4 w-1/4">
                            {{$contacts->created_at}}
                        </td>
                        <td class="p-4 w-1/4">
                            <div class="flex justify-center gap-3">
                                <a href={{"/contacts/edit/$contacts->id"}}>
                                    <svg class="w-6 h-6 text-white hover:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <title>Edit</title>
                                        <path fill-rule="evenodd"
                                            d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href={{"/contacts/$contacts->id"}}>
                                    <svg class="w-6 h-6 text-white hover:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <title>Delete</title>
                                        <path fill-rule="evenodd"
                                            d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div
        class="bg-white rounded-full py-2 px-3 text-black lg:w-[10%] mx-5 lg:mx-auto flex justify-center mt-5 hover:bg-zinc-900 hover:border-2 hover:text-white">
        <a href="/addcontact" class="flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <title>Add Contact</title>
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

            <p class="font-bold text-md">
                Contact
            </p>
        </a>
    </div>
@endsection

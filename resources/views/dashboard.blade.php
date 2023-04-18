<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('success'))       
    <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">Muvaffaqiyatli!</span> {{ session('success') }}.
        </div>
    </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-gray-900">
                    @if (auth()->user()->role->name == 'manager')
                        <h3 class="text-xl text-blue-500 font-bold">Applications</h3>
                        @foreach ($applications as $application)                
                        <div class="max-w-3xl py-8 px-8 bg-white shadow-lg rounded-lg my-20">
                            <div class="flex justify-center md:justify-end -mt-16">
                                <img class="w-20 h-20 object-cover rounded-full border border-black-500"
                                    src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80">
                            </div>
                            <div class="flex">
                                <div>
                                    <h2 class="text-gray-800 text-3xl font-semibold">{{ $application->user->name }}</h2>
                                    <p class="mt-1 italic mb-2 font-bold text-gray-600">{{ $application->user->email }}</p>
                                    <hr class="mb-5">
                                    <h4 class="flex justify-center mt-2 mx:auto font-bold text-gray-600">{{ $application->subject }}</h4>
                                    <p class="mt-2 text-gray-600">{{ $application->message }}</p>
                                    <p class="mt-2 text-blue-600 text-gray-600">{{ $application->created_at }}</p>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <a href=""
                                    class="font-medium text-dark-200"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="m-5 w-10 h-10 text-blue-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg></a>
                            </div>
                        </div>
                        @endforeach

                        {{ $applications->links() }}

                    @else
                        <div
                            class="!z-5 relative mx-auto flex flex-col rounded-[20px] max-w-[300px] md:max-w-[400px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 flex flex-col w-full !p-6 3xl:p-![18px] bg-white undefined">

                            <div class="relative flex flex-row justify-between">
                                <h4 class="text-xl font-bold text-navy-700 text-blue-500 mb-3">
                                    Send Application
                                </h4>
                            </div>
                            <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="email"
                                        class="text-sm text-gray-600 dark:text-dark font-bold">Subject</label>
                                    <input type="text" name="subject" placeholder="Enter Subject"
                                        class="mt-2 flex h-12 w-full items-center justify-center rounded-xl border bg-white/0 p-3 text-sm outline-none border-gray-200">
                                        @error('subject')
                                            <p class="text-red-600">{{ $message }}</p>                                    
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email"
                                        class="text-sm text-gray-600 dark:text-dark font-bold">Message</label>
                                    <textarea name="message" rows="5" placeholder="Enter Message"
                                        class="mt-2 flex w-full items-center justify-center rounded-xl border bg-white/0 p-3 text-sm outline-none border-gray-200"></textarea>
                                        @error('message')
                                            <p class="text-red-600">{{ $message }}</p>                                    
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email"
                                        class="text-sm text-gray-600 dark:text-dark font-bold">File</label>
                                    <input type="file" name="file_url"
                                        class="mt-2 flex h-12 w-full items-center justify-center rounded-xl border bg-white/0 p-3 text-sm outline-none border-gray-200">
                                        @error('file_url')
                                            <p class="text-red-600">{{ $message }}</p>                                    
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit"
                                        class="mt-2 flex h-12 w-20 items-center justify-center rounded-xl border bg-white/0 p-3 text-sm outline-none border-blue-500 text-blue-500 placeholder:text-blue-500 dark:!border-blue-400 dark:!text-blue-400 dark:placeholder:!text-blue-400">Send</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

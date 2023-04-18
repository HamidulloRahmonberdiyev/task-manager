<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">Muvaffaqiyatli!</span> {{ session('success') }}.
            </div>
        </div>
    @elseif (session('error'))
        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium">Xatolik!</span> {{ session('error') }}.
            </div>
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 text-gray-900">
                        <div
                            class="!z-5 relative mx-auto flex flex-col rounded-[20px] max-w-[300px] md:max-w-[400px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 flex flex-col w-full !p-6 3xl:p-![18px] bg-white undefined">
                            <div class="relative flex flex-row justify-between">
                                <h4 class="text-xl font-bold text-navy-700 text-blue-500 mb-3">
                                    Send Answer in {{ $application->user->name }}
                                </h4>
                            </div>
                            <form action="{{ route('answer.store', $application->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email"
                                        class="text-sm text-gray-600 dark:text-dark font-bold">Answer</label>
                                    <textarea name="body" rows="5" placeholder="Enter Answer"
                                        class="mt-2 flex w-full items-center justify-center rounded-xl border bg-white/0 p-3 text-sm outline-none border-gray-200"></textarea>
                                    @error('body')
                                        <p class="text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 flex">
                                    <button type="submit" class="mt-2 flex h-12 w-20 items-center justify-center rounded-xl border bg-white/0 p-3 text-sm outline-none border-blue-500 text-blue-500 placeholder:text-blue-500 dark:!border-blue-400 dark:!text-blue-400 dark:placeholder:!text-blue-400">Send</button>
                                    <a href="{{ route('dashboard') }}" type="submit" class="mt-2 ml-4 flex h-12 w-20 items-center justify-center rounded-xl border bg-white/0 p-3 text-sm outline-none border-red-500 text-red-500 placeholder:text-red-500 dark:!border-red-400 dark:!text-red-400 dark:placeholder:!text-red-400">Cancel</a>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

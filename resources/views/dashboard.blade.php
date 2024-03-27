<x-app-layout>
    <x-slot name="header">
        <div class="p-8 bg-amber-300 leading-loose rounded shadow-md" style="margin-top: -9rem;">
            <h2 class="text-2xl font-semibold mb-3">Hello, <span>{{ Auth::user()->name }}</span></h2>
            <h1 class="text-6xl font-bold">Welcome to Todos Application</h1>
        </div>
    </x-slot>
    <div class="pb-12">
        <div class="w-full">
            <div class="overflow-hidden sm:rounded-sm bg-white">
                <div class="max-w-6xl my-9 mx-auto p-6 text-white-700 border-2">
                    <h1 class="text-3xl font-extrabold text-center py-3">Add Your Todo</h1>
                    <div class="flex justify-center mb-8 gap-x-4">
                        <a href="{{ route('dashboard', ['view' => 'card']) }}"
                            class="bg-transparant outline outline-offset-1 outline-amber-500 hover:bg-amber-700 text-dark font-bold py-2 px-4 rounded-0">Card
                            View</a>
                        <a href="{{ route('dashboard', ['view' => 'table']) }}"
                            class="bg-transparant outline outline-offset-1 outline-amber-500 hover:bg-amber-700 text-dark font-bold py-2 px-4 rounded-0">Table
                            View</a>
                    </div>

                    @if ($views === 'card')
                        {{-- card todo --}}
                        <x-card-todo-component :todos="$tasks" />
                    @elseif($views === 'table')
                        {{-- table todo --}}
                        <x-table-todo-component :todos="$tasks" />
                    @endif
                </div>
            </div>

        </div>
    </div>



</x-app-layout>

<div>
    @if ($todos->where('is_done', 0))
    <div class="flex justify-between">

        <h2 class="text-4xl font-bold text-slate-600">Tasks</h2>
        <div>
            <a href="{{ route('task.create') }}"
                class="bg-amber-700 hover:bg-amber-900 text-white font-bold py-2 px-4 rounded ">Add
                Task
            </a>
        </div>
    </div>

    <hr>

    @if ($todos->where('is_done', 0)->isEmpty())
        <div class="py-5 grid place-items-center mt-6">
            <p>No Todos Found</p>
        </div>
    @endif
    <div class="flex flex-wrap justify-left gap-4 mb-10 mt-6">

        @foreach ($todos->where('is_done', 0) as $item)
            <div class="max-w-xs w-full bg-amber-500 shadow-lg rounded-lg overflow-hidden my-6">

                <div class="p-4 flex flex-col h-full  justify-between ">
                    <div>
                        <h2 class="font-bold text-xl mb-2"> {{ $item->title }} </h2>
                        <p class="text-gray-700 text-justify">
                            {{ $item->description }}
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('task.edit', $item->id) }}"
                            class="bg-orange-500 hover:bg-orange-300 text-white font-bold mx-1  rounded"
                            style="display: inline-block; width:2rem; height:auto; padding: 4px;">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('task.check', $item->id) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="bg-lime-700 hover:bg-lime-300 text-white font-bold mx-1  rounded"
                                style="display: inline-block; width:2rem; height:auto; padding: 4px;">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                        <form action="{{ route('task.destroy', $item->id) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold mx-1  rounded"
                                style="display: inline-block; width:2rem; height:auto; padding: 4px;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <button data-modal-target="default-modal{{ $item->id }}"
                            data-modal-toggle="default-modal{{ $item->id }}"
                            class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold mx-1  rounded"
                            type="button"
                            style="display: inline-block; width:2rem; height:auto; padding: 4px;">
                            <i class="fas fa-eye"></i>
                        </button>
                        <x-modal-component :currentTask="$item" />

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@if ($todos->where('is_done', 1))
    <div class="flex justify-between">
        <h2 class="text-4xl font-bold text-slate-600">Tasks Done</h2>
    </div>
    <hr>

    @if ($todos->where('is_done', 1)->isEmpty())
        <div class="py-5 grid place-items-center">
            <p>No Todos Found</p>
        </div>
    @endif

    <div class="flex flex-wrap justify-left gap-4">
        @foreach ($todos->where('is_done', 1) as $item)
            <div class="max-w-xs w-full bg-amber-500 shadow-lg rounded-lg overflow-hidden my-6">

                <div class="p-4 flex flex-col h-full justify-between ">
                    <div>
                        <h2 class="font-bold text-xl mb-2"> {{ $item->title }} </h2>
                        <p class="text-gray-700 text-justify">
                            {{ $item->description }}
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('task.edit', $item->id) }}"
                            class="bg-orange-500 hover:bg-orange-300 text-white font-bold mx-1  rounded"
                            style="display: inline-block; width:2rem; height:auto; padding: 4px;">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('task.destroy', $item->id) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold mx-1  rounded"
                                style="display: inline-block; width:2rem; height:auto; padding: 4px;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <button data-modal-target="default-modal{{ $item->id }}"
                            data-modal-toggle="default-modal{{ $item->id }}"
                            class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold mx-1  rounded"
                            type="button"
                            style="display: inline-block; width:2rem; height:auto; padding: 4px;">
                            <i class="fas fa-eye"></i>
                        </button>
                        <x-modal-component :currentTask="$item" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
</div>

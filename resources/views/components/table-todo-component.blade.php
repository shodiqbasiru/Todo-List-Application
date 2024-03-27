<div>
    @if ($todos->where('is_done', 0))
    <div class="flex justify-between">

        <h2 class="text-3xl font-bold text-slate-600">Tasks</h2>
        <div>
            <a href="{{ route('task.create') }}"
                class="bg-amber-700 hover:bg-amber-900 text-white font-bold py-2 px-4 rounded ">Add
                Task
            </a>
        </div>
    </div>
    <table class="table-fixed border w-full my-5 mb-20">
        <thead>
            <tr class="bg-amber-500">
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($todos->where('is_done', 0)->isEmpty())
                <tr>
                    <td class="border px-4 py-2 text-center"
                        colspan="3">No Todos Found</td>
                </tr>
            @endif
            @foreach ($todos->where('is_done', 0) as $item)
                <tr>
                    <td class="border  px-4 py-2">{{ $item->title }}</td>
                    <td class="border  px-4 py-2">
                        {{ $item->is_done ? 'Sudah Dikerjakan' : 'Belum Dikerjakan' }}</td>
                    <td class="border px-4 py-2 text-center ">
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if ($todos->where('is_done', 1))
    <div class="flex justify-between">

        <h2 class="text-3xl font-bold text-slate-600">Tasks Done</h2>

    </div>
    <table class="table-fixed border white w-full my-5">
        <thead>
            <tr class="bg-amber-500">
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @if ($todos->where('is_done', 0)->isEmpty())
                <tr>
                    <td class="border px-4 py-2 text-center"
                        colspan="3">No Todos Found</td>
                </tr>
            @endif
            @foreach ($todos->where('is_done', 1) as $item)
                <tr>
                    <td class="border  px-4 py-2">{{ $item->title }}</td>
                    <td class="border  px-4 py-2">
                        {{ $item->is_done ? 'Sudah Dikerjakan' : 'Belum Dikerjakan' }}
                    </td>
                    <td class="border px-4 py-2 text-center ">
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</div>
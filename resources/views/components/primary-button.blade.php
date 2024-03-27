<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-3 my-3 bg-blue-300 hover:bg-blue-500  border-none rounded-md font-bold text-xs text-black uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#073b4c] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#118ab2] focus:bg-[#118ab2] active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

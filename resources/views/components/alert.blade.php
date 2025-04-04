<div id="alert" {{ $attributes->merge(['class' => 'bg-gray-900 bg-opacity-50 fixed inset-0 flex items-center justify-center hidden']) }}>
    <div class="flex flex-col gap-4 bg-white p-4 rounded">
        <div class="flex flex-col gap-2">
            <strong>Peringatan</strong>
            <p class="text-sm">{{ $slot }}</p>
        </div>
        <button id="closePopup" type="button" class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded">Tutup</button>
    </div>
</div>

<script>

    function alertAction() {
        document.getElementById('alert').classList.remove('hidden');

        document.getElementById('closePopup').addEventListener('click', () => {
        document.getElementById('alert').classList.add('hidden');
    })
    }
</script>
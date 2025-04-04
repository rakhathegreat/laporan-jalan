<div id="confirm" {{ $attributes->merge(['class' => 'bg-gray-900 bg-opacity-50 fixed inset-0 flex items-center justify-center hidden']) }}>
    <div class="flex flex-col gap-4 bg-white p-4 rounded">
        <div class="flex flex-col gap-2">
            <strong>Konfirmasi</strong>
            <p class="text-sm">{{ $slot }}</p>
        </div>
        <div class="flex gap-2">
            <button id="cancel"  type="button" class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded">Tidak</button>
            <button id="delete"  type="button" class="bg-green-500 hover:bg-green-700 text-white text-sm font-bold py-2 px-4 rounded">Ya</button>
        </div>
    </div>
</div>

<script>
    function confirmAction() {
        return new Promise((resolve) => {
            const confirm = document.getElementById('confirm');
            confirm.classList.remove('hidden');

            document.getElementById('cancel').addEventListener('click', () => {
                confirm.classList.add('hidden');
                resolve(false);
            });

            document.getElementById('delete').addEventListener('click', () => {
                confirm.classList.add('hidden');
                resolve(true);
            });
        });
    }
</script>
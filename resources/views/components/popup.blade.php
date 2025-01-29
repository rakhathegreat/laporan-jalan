@props(['id' => null])
<button {{ $attributes }} id="{{ $id }}">
    {{ $slot }}
</button>

<div class="bg-gray-900 bg-opacity-50 fixed inset-0 flex items-center justify-center hidden" id="popup">
    {{ $content }}
</div>

<script>
    const popupBtn = document.getElementById('{{ $id }}');
    const popup = document.getElementById('popup');
    const close = document.getElementById('closePopup');
    close.addEventListener('click', () => {
        popup.classList.add('hidden');
    });

    popupBtn.addEventListener('click', () => {
        popup.classList.remove('hidden');
    });

    window.onclick = function(event) {
            if (event.target === popup) {
                popup.classList.add("hidden");
            } 
        }
    
</script>
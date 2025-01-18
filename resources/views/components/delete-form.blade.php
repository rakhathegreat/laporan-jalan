@props(['id' => null])

<form id="deleteForm" action="/data-jalan/{{ $id }}" method="POST" type="hidden">
    @csrf
    @method('DELETE')
</form>
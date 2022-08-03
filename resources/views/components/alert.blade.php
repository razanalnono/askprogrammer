@if (session()->has($type))
<div class="div alert alert-{{ $type }}">
  {{ session($type) }}
</div>

@endif


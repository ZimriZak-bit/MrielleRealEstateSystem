{{-- Messages from controllers: ->with('success', '...') or ->with('error', '...') --}}
@if (session('success'))
    <div class="alert alert-success" role="status">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-error" role="alert">{{ session('error') }}</div>
@endif

@if (session('info'))
    <div class="alert alert-info" role="status">{{ session('info') }}</div>
@endif

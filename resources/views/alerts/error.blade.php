@if (session($key ?? 'error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session($key ?? 'error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="tim-icons icon-simple-remove"></i>
    </button>
</div>
@endif
@if (session($key ?? 'status'))
<div class="alert alert-success alert-dismissible fade show" role="alert" data-dismiss="alert" aria-label="Close">
    {{ session($key ?? 'status') }}
    <button type="button" class="close"  style="height: 100px">
        <i class="tim-icons icon-simple-remove"></i>
    </button>
</div>
@endif
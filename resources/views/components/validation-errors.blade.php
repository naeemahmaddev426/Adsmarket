@if ($errors->any())
<div class="alert alert-danger-custom mb-3">
    <div class="d-flex align-items-start gap-2">
        <i class="bi bi-exclamation-triangle-fill mt-1 flex-shrink-0"></i>
        <div>
            <div class="fw-semibold mb-1 small">Please fix the following errors:</div>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

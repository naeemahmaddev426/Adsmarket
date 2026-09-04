<x-app-admin-layout>
@section('page-title', 'Manage Ads')

<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
    <div>
        <h5 class="fw-bold text-primary-custom mb-0">All Ads</h5>
        <p class="text-muted small mb-0">Approve, reject, or delete ads</p>
    </div>
    <div class="d-flex gap-2">
        <input type="text" id="adsSearch" class="form-control form-control-sm" style="width:220px" placeholder="Search ads…" onkeyup="filterAds()">
        <select id="statusFilter" class="form-select form-select-sm" style="width:140px" onchange="filterAds()">
            <option value="">All Status</option>
            <option value="active">Active</option>
            <option value="pending">Pending</option>
            <option value="rejected">Rejected</option>
        </select>
    </div>
</div>

<div class="admin-table">
    <div class="table-responsive">
        <table class="table" id="adsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ad</th>
                    <th>Category</th>
                    <th>User</th>
                    <th>Price</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @isset($ads)
                    @forelse($ads as $i => $ad)
                    <tr>
                        <td class="text-muted small">{{ $i + 1 }}</td>
                        <td style="max-width:200px">
                            <div class="fw-semibold small text-dark text-truncate" title="{{ $ad->title }}">
                                {{ $ad->title }}
                            </div>
                            <div class="text-muted" style="font-size:.72rem">#{{ $ad->id }}</div>
                        </td>
                        <td><span class="badge-primary-custom">{{ $ad->category_name ?? '—' }}</span></td>
                        <td class="small text-muted">{{ $ad->user?->name ?? '—' }}</td>
                        <td class="fw-semibold small" style="color:var(--accent)">
                            {{ $ad->price ? 'Rs ' . number_format($ad->price) : '—' }}
                        </td>
                        <td class="small text-muted">{{ $ad->city ?? '—' }}</td>
                        <td data-status="{{ $ad->ad_status }}">
                            @if($ad->ad_status === 'active')
                                <span class="badge-success-custom">Active</span>
                            @elseif($ad->ad_status === 'pending')
                                <span class="badge-accent">Pending</span>
                            @elseif($ad->ad_status === 'rejected')
                                <span style="background:rgba(229,62,62,.1);color:#c53030;font-weight:600;padding:.3rem .7rem;border-radius:50px;font-size:.775rem">Rejected</span>
                            @else
                                <span class="badge-primary-custom">{{ ucfirst($ad->ad_status) }}</span>
                            @endif
                        </td>
                        <td class="small text-muted">{{ $ad->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('product.detail', $ad->id) }}" target="_blank"
                                   class="btn btn-sm btn-outline-secondary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if($ad->ad_status !== 'active')
                                <form method="POST" action="{{ route('admin.approve_ad', $ad->id) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Approve">
                                        <i class="bi bi-check-lg"></i>
                                    </button>
                                </form>
                                @endif
                                @if($ad->ad_status !== 'rejected')
                                <form method="POST" action="{{ route('admin.reject_ad', $ad->id) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Reject">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </form>
                                @endif
                                <form method="POST" action="{{ route('admin.delete_ad', $ad->id) }}"
                                      onsubmit="return confirm('Delete this ad?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5 text-muted">
                            <i class="bi bi-megaphone d-block fs-3 mb-2"></i>No ads found
                        </td>
                    </tr>
                    @endforelse
                @else
                <tr><td colspan="9" class="text-center py-4 text-muted">No data available</td></tr>
                @endisset
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
function filterAds() {
    const q = document.getElementById('adsSearch').value.toLowerCase();
    const status = document.getElementById('statusFilter').value.toLowerCase();
    document.querySelectorAll('#adsTable tbody tr').forEach(row => {
        const matchQ = !q || row.textContent.toLowerCase().includes(q);
        const rowStatus = row.querySelector('[data-status]')?.dataset.status?.toLowerCase() || '';
        const matchStatus = !status || rowStatus === status;
        row.style.display = matchQ && matchStatus ? '' : 'none';
    });
}
</script>
@endpush

</x-app-admin-layout>

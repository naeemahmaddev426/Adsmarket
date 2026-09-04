<x-app-admin-layout>
@section('page-title', 'Manage Users')

<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h5 class="fw-bold text-primary-custom mb-0">All Users</h5>
        <p class="text-muted small mb-0">Manage all registered users</p>
    </div>
</div>

<div class="admin-table">
    <div class="p-3 border-bottom d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h6 class="fw-bold mb-0 text-primary-custom"><i class="bi bi-people me-2"></i>Users</h6>
        <div class="d-flex gap-2">
            <input type="text" id="userSearch" class="form-control form-control-sm" style="width:220px" placeholder="Search users…" onkeyup="filterTable()">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table" id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @isset($users)
                    @forelse($users as $i => $user)
                    <tr>
                        <td class="text-muted small">{{ $i + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold flex-shrink-0"
                                     style="width:34px;height:34px;background:var(--primary);font-size:.8rem">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="fw-semibold small">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="small text-muted">{{ $user->email }}</td>
                        <td class="small text-muted">{{ $user->phone_no ?? '—' }}</td>
                        <td>
                            @if($user->role === 'admin')
                            <span class="badge-primary-custom">Admin</span>
                            @else
                            <span class="badge-success-custom">User</span>
                            @endif
                        </td>
                        <td class="small text-muted">{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.user_ads', ['userId' => $user->id]) }}"
                                   class="btn btn-sm btn-outline-primary-custom" title="View Ads">
                                    <i class="bi bi-megaphone"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.delete_user', $user->id) }}"
                                      onsubmit="return confirm('Delete this user?')">
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
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-people d-block fs-3 mb-2"></i>No users found
                        </td>
                    </tr>
                    @endforelse
                @else
                <tr><td colspan="7" class="text-center py-4 text-muted">No data available</td></tr>
                @endisset
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
function filterTable() {
    const q = document.getElementById('userSearch').value.toLowerCase();
    document.querySelectorAll('#usersTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
}
</script>
@endpush

</x-app-admin-layout>

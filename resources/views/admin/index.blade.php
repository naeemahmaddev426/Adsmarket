<x-app-admin-layout>
@section('page-title', 'Dashboard')

<div class="row g-4 mb-4">

    {{-- Stat: Total Active Ads --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-accent-icon">
                <i class="bi bi-megaphone"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalActiveAds ?? 0 }}</div>
                <div class="stat-label">Total Active Ads</div>
            </div>
        </div>
    </div>

    {{-- Stat: Total Users --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-primary-icon">
                <i class="bi bi-people"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalUsers ?? 0 }}</div>
                <div class="stat-label">Registered Users</div>
            </div>
        </div>
    </div>

    {{-- Stat: Pending Ads --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-info-icon">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalPendingAds ?? 0 }}</div>
                <div class="stat-label">Pending Ads</div>
            </div>
        </div>
    </div>

    {{-- Stat: Total Categories --}}
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-success-icon">
                <i class="bi bi-grid-3x3-gap"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalCategories ?? 0 }}</div>
                <div class="stat-label">Categories</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">

    {{-- Recent Ads Table --}}
    <div class="col-lg-8">
        <div class="admin-table">
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h6 class="fw-bold mb-0 text-primary-custom"><i class="bi bi-clock-history me-2"></i>Recent Ads</h6>
                <a href="{{ route('admin.all_ads') }}" class="btn btn-sm btn-outline-primary-custom">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>City</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($recentAds)
                            @forelse($recentAds as $i => $ad)
                            <tr>
                                <td class="text-muted small">{{ $i + 1 }}</td>
                                <td>
                                    <a href="{{ route('product.detail', $ad->id) }}" target="_blank"
                                       class="fw-semibold text-dark text-decoration-none"
                                       style="max-width:200px;display:block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis">
                                        {{ $ad->title }}
                                    </a>
                                </td>
                                <td><span class="badge-primary-custom">{{ $ad->category_name ?? '—' }}</span></td>
                                <td class="text-muted small">{{ $ad->city ?? '—' }}</td>
                                <td class="fw-semibold" style="color:var(--accent)">
                                    {{ $ad->price ? 'Rs ' . number_format($ad->price) : '—' }}
                                </td>
                                <td>
                                    @if($ad->ad_status === 'active')
                                        <span class="badge-success-custom">Active</span>
                                    @elseif($ad->ad_status === 'pending')
                                        <span class="badge-accent">Pending</span>
                                    @else
                                        <span class="badge-primary-custom">{{ ucfirst($ad->ad_status) }}</span>
                                    @endif
                                </td>
                                <td class="text-muted small">{{ $ad->created_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox d-block fs-3 mb-2"></i>
                                    No ads yet
                                </td>
                            </tr>
                            @endforelse
                        @else
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No data available</td>
                        </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Quick Stats Panel --}}
    <div class="col-lg-4">

        {{-- Quick Links --}}
        <div class="admin-table mb-4">
            <div class="p-3 border-bottom">
                <h6 class="fw-bold mb-0 text-primary-custom"><i class="bi bi-lightning me-2"></i>Quick Actions</h6>
            </div>
            <div class="p-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.adscategory') }}" class="btn btn-primary-custom btn-sm">
                        <i class="bi bi-plus-lg me-2"></i>Add Category
                    </a>
                    <a href="{{ route('admin.all_ads') }}" class="btn btn-outline-primary-custom btn-sm">
                        <i class="bi bi-list-ul me-2"></i>Manage Ads
                    </a>
                    <a href="{{ route('admin.user_data') }}" class="btn btn-outline-primary-custom btn-sm">
                        <i class="bi bi-people me-2"></i>Manage Users
                    </a>
                    <a href="{{ route('admin.home_banner') }}" class="btn btn-outline-primary-custom btn-sm">
                        <i class="bi bi-image me-2"></i>Update Banners
                    </a>
                    <a href="{{ route('index') }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-box-arrow-up-right me-2"></i>View Live Site
                    </a>
                </div>
            </div>
        </div>

        {{-- Recent Users --}}
        <div class="admin-table">
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h6 class="fw-bold mb-0 text-primary-custom"><i class="bi bi-person-plus me-2"></i>New Users</h6>
                <a href="{{ route('admin.user_data') }}" class="small" style="color:var(--secondary)">View all</a>
            </div>
            @isset($recentUsers)
                @forelse($recentUsers as $user)
                <div class="d-flex align-items-center gap-3 p-3 border-bottom">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold flex-shrink-0"
                         style="width:38px;height:38px;background:var(--primary);font-size:.85rem">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="overflow-hidden">
                        <div class="fw-semibold small text-dark text-truncate">{{ $user->name }}</div>
                        <div class="text-muted" style="font-size:.75rem">{{ $user->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                @empty
                <div class="text-center text-muted py-3 small">No users yet</div>
                @endforelse
            @else
            <div class="text-center text-muted py-3 small">No data</div>
            @endisset
        </div>
    </div>
</div>

</x-app-admin-layout>

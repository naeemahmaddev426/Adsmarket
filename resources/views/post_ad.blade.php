<x-app-layout>
@section('title', 'Post Free Ad — AdsMarket')

<div class="breadcrumb-bar">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active">Post Ad</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5" style="max-width:900px">

    <div class="text-center mb-5">
        <h2 class="fw-800 text-primary-custom" style="font-weight:800">Post Your Free Ad</h2>
        <p class="text-muted">Choose a category to get started — it only takes 2 minutes</p>
    </div>

    {{-- Errors --}}
    @if($errors->any())
    <div class="alert alert-danger-custom d-flex gap-2 mb-4">
        <i class="bi bi-exclamation-triangle-fill mt-1"></i>
        <ul class="mb-0 ps-3">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Step indicator --}}
    <div class="step-indicator mb-5">
        <div class="step-item active">
            <div class="step-dot">1</div>
            <div class="step-label">Choose Category</div>
        </div>
        <div class="step-item">
            <div class="step-dot">2</div>
            <div class="step-label">Fill Details</div>
        </div>
        <div class="step-item">
            <div class="step-dot">3</div>
            <div class="step-label">Add Photos</div>
        </div>
        <div class="step-item">
            <div class="step-dot">4</div>
            <div class="step-label">Post Ad</div>
        </div>
    </div>

    {{-- Category Picker --}}
    <div class="bg-white rounded-3 border p-0 overflow-hidden">
        <div class="p-4 border-bottom">
            <h5 class="fw-bold text-primary-custom mb-0">
                <i class="bi bi-grid me-2"></i>Choose a Category
            </h5>
        </div>

        <div class="row g-0" style="min-height:400px">
            {{-- Col 1: Main Categories --}}
            <div class="col-md-4 border-end" style="background:var(--light-bg)">
                <div class="py-2">
                    @foreach($categories as $category)
                    <button class="border-0 w-100 text-start px-4 py-3 bg-transparent cat-btn-main d-flex align-items-center gap-3"
                            data-cat="{{ $category->category_name }}"
                            onclick="selectCat('{{ $category->category_name }}', this)">
                        @if($category->category_image)
                        <img src="{{ asset('/' . $category->category_image) }}" width="24" height="24" alt="" loading="lazy" class="rounded">
                        @else
                        <i class="bi bi-tag text-muted"></i>
                        @endif
                        <span class="fw-500 small">{{ $category->category_name }}</span>
                        <i class="bi bi-chevron-right ms-auto text-muted small"></i>
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- Col 2: Sub-Categories --}}
            <div class="col-md-4 border-end" id="subcat-col">
                <div class="py-2" id="subcat-list">
                    <div class="px-4 py-5 text-center text-muted">
                        <i class="bi bi-arrow-left fs-3 d-block mb-2"></i>
                        <small>Select a category first</small>
                    </div>
                </div>
            </div>

            {{-- Col 3: Sub-Category Types --}}
            <div class="col-md-4" id="subtype-col">
                <div class="py-2" id="subtype-list">
                    <div class="px-4 py-5 text-center text-muted">
                        <i class="bi bi-arrow-left fs-3 d-block mb-2"></i>
                        <small>Select a sub-category</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="category_name" name="category_name">
<input type="hidden" id="sub_category_name" name="sub_category_name">

@push('styles')
<style>
.cat-btn-main:hover, .cat-btn-main.selected {
    background: var(--primary) !important;
    color: #fff;
}
.cat-btn-main:hover i, .cat-btn-main.selected i { color: #fff !important; }
.cat-btn-main:hover img, .cat-btn-main.selected img { filter: brightness(10); }

.subcat-btn, .subtype-btn {
    display: block;
    width: 100%;
    text-align: left;
    background: transparent;
    border: none;
    padding: .75rem 1.25rem;
    font-size: .875rem;
    color: var(--text);
    cursor: pointer;
    transition: all .2s;
    text-decoration: none;
}
.subcat-btn:hover, .subcat-btn.selected { background: var(--light-bg); color: var(--primary); font-weight: 600; }
.subtype-btn:hover { background: rgba(244,129,15,.06); color: var(--accent); }
</style>
@endpush

@push('scripts')
<script>
const catData = @json($categories->map(function($cat) {
    return [
        'name' => $cat->category_name,
        'subs' => $cat->subcategories->map(function($sub) {
            return [
                'name' => $sub->sub_category_name,
                'types' => $sub->subCategoryNameTypes->map(fn($t) => $t->sub_category_name_type)
            ];
        })
    ];
}));

function selectCat(catName, btn) {
    document.querySelectorAll('.cat-btn-main').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    document.getElementById('category_name').value = catName;

    const cat = catData.find(c => c.name === catName);
    const subcatList = document.getElementById('subcat-list');
    const subtypeList = document.getElementById('subtype-list');

    subtypeList.innerHTML = '<div class="px-4 py-5 text-center text-muted"><i class="bi bi-arrow-left fs-3 d-block mb-2"></i><small>Select a sub-category</small></div>';

    if (!cat || !cat.subs.length) {
        subcatList.innerHTML = '<div class="px-4 py-5 text-center text-muted"><small>No sub-categories</small></div>';
        return;
    }

    subcatList.innerHTML = cat.subs.map(sub => {
        if (sub.types.length > 0) {
            return `<button class="subcat-btn" onclick="selectSubcat('${catName}', '${sub.name}', ${JSON.stringify(sub.types)}, this)">
                ${sub.name} <i class="bi bi-chevron-right float-end text-muted"></i>
            </button>`;
        } else {
            return `<a href="/post-ad-attributes?cat=${encodeURIComponent(catName)}&sub_cat=${encodeURIComponent(sub.name)}" class="subcat-btn">
                ${sub.name}
            </a>`;
        }
    }).join('');
}

function selectSubcat(catName, subName, types, btn) {
    document.querySelectorAll('.subcat-btn').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    document.getElementById('sub_category_name').value = subName;

    const subtypeList = document.getElementById('subtype-list');
    subtypeList.innerHTML = types.map(type =>
        `<a href="/post-ad-attributes?cat=${encodeURIComponent(catName)}&sub_cat=${encodeURIComponent(subName)}&sub_cat_type=${encodeURIComponent(type)}" class="subtype-btn">
            ${type}
        </a>`
    ).join('');
}
</script>
@endpush

</x-app-layout>

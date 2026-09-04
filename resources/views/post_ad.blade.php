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
    <div class="step-indicator mb-5" id="step-indicator">
        <div class="step-item active" id="step-1">
            <div class="step-dot">1</div>
            <div class="step-label">Choose Category</div>
        </div>
        <div class="step-item" id="step-2">
            <div class="step-dot">2</div>
            <div class="step-label">Fill Details</div>
        </div>
        <div class="step-item" id="step-3">
            <div class="step-dot">3</div>
            <div class="step-label">Add Photos</div>
        </div>
        <div class="step-item" id="step-4">
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
                    <button type="button" class="border-0 w-100 text-start px-4 py-3 bg-transparent cat-btn-main d-flex align-items-center gap-3"
                            data-category-id="{{ $category->id }}"
                            data-category-name="{{ $category->category_name }}">
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
const postAdAttributesUrl = @json(route('post_ad_attributes'));
const postAdApiBase = @json(url('/post_ad'));

function markStepComplete() {
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');
    if (step1) {
        step1.classList.remove('active');
        step1.classList.add('completed');
        step1.querySelector('.step-dot').textContent = '✓';
    }
    if (step2) {
        step2.classList.add('active');
    }
}

function showMessage(container, message) {
    container.innerHTML = '';
    const wrapper = document.createElement('div');
    wrapper.className = 'px-4 py-5 text-center text-muted';
    wrapper.textContent = message;
    container.appendChild(wrapper);
}

function goToAttributes(categoryId, subCategoryId, typeId = null) {
    const query = new URLSearchParams({
        category_id: categoryId,
        sub_category_id: subCategoryId,
    });

    if (typeId) {
        query.set('sub_category_type_id', typeId);
    }

    window.location.href = `${postAdAttributesUrl}?${query.toString()}`;
}

async function loadJson(url) {
    const response = await fetch(url, { headers: { Accept: 'application/json' } });

    if (!response.ok) {
        throw new Error(`Request failed with status ${response.status}`);
    }

    return response.json();
}

async function selectCat(categoryId, categoryName, btn) {
    document.querySelectorAll('.cat-btn-main').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    const subcatList = document.getElementById('subcat-list');
    const subtypeList = document.getElementById('subtype-list');

    showMessage(subtypeList, 'Select a sub-category');
    showMessage(subcatList, 'Loading sub-categories…');

    try {
        const payload = await loadJson(`${postAdApiBase}/categories/${categoryId}/subcategories`);
        const subCategories = payload.data || [];

        if (!subCategories.length) {
            showMessage(subcatList, 'No sub-categories available for this category.');
            return;
        }

        subcatList.innerHTML = '';
        subCategories.forEach(subCategory => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'subcat-btn';
            button.textContent = subCategory.sub_category_name;
            button.addEventListener('click', () => selectSubcat(
                categoryId,
                categoryName,
                subCategory.id,
                subCategory.sub_category_name,
                button
            ));
            subcatList.appendChild(button);
        });
    } catch (error) {
        console.error('Unable to load sub-categories.', error);
        showMessage(subcatList, 'Unable to load sub-categories. Please try again.');
    }
}

async function selectSubcat(categoryId, categoryName, subCategoryId, subCategoryName, btn) {
    document.querySelectorAll('.subcat-btn').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    const subtypeList = document.getElementById('subtype-list');
    showMessage(subtypeList, 'Loading types…');

    try {
        const payload = await loadJson(`${postAdApiBase}/subcategories/${subCategoryId}/types`);
        const types = payload.data || [];
        subtypeList.innerHTML = '';

        if (!types.length) {
            showMessage(subtypeList, 'No types available for this sub category.');
            const continueButton = document.createElement('button');
            continueButton.type = 'button';
            continueButton.className = 'subtype-btn';
            continueButton.textContent = 'Continue with this sub-category';
            continueButton.addEventListener('click', () => goToAttributes(categoryId, subCategoryId));
            subtypeList.appendChild(continueButton);
            return;
        }

        types.forEach(type => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'subtype-btn';
            button.textContent = type.sub_category_name_type;
            button.addEventListener('click', () => goToAttributes(categoryId, subCategoryId, type.id));
            subtypeList.appendChild(button);
        });
    } catch (error) {
        console.error('Unable to load types.', error);
        showMessage(subtypeList, 'Unable to load types. Please try again.');
    }
}

document.querySelectorAll('.cat-btn-main').forEach(button => {
    button.addEventListener('click', () => selectCat(
        button.dataset.categoryId,
        button.dataset.categoryName,
        button
    ));
});
</script>
@endpush

</x-app-layout>

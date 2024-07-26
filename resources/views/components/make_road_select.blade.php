@props([
    'id' => 'nav-auto-tab',
    'class' => 'nav-tab-button rounded px-3 py-2',
    'dataBsToggle' => 'tab',
    'dataBsTarget' => '',
    'type' => 'button',
    'role' => 'tab',
    'ariaControls' => 'nav-auto',
    'ariaSelected' => 'false',
    'label' => ''
])

<button
    class="{{ $class }}"
    id="{{ $id }}"
    data-bs-toggle="{{ $dataBsToggle }}"
    data-bs-target="{{ $dataBsTarget }}"
    type="{{ $type }}"
    role="{{ $role }}"
    aria-controls="{{ $ariaControls }}"
    aria-selected="{{ $ariaSelected }}"
>
    {{ $label }}
</button>

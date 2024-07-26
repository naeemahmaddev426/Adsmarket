
	@props(['dataBsTarget' => '#', 'dataBsToggle' => '', 'type' => 'button', 'class' => 'nav-tab-button rounded px-3 py-2', 'id' => 'nav-auto-tab', 'ariaControls' => 'nav-auto', 'ariaSelected' => 'true', 'label' => ''])

<button
    class="{{ $class }}"
    id="{{ $id }}"
    data-bs-toggle="{{ $dataBsToggle }}"
    data-bs-target="{{ $dataBsTarget }}"
    type="{{ $type }}"
    role="tab"
    aria-controls="{{ $ariaControls }}"
    aria-selected="{{ $ariaSelected }}"
>
    {{ $label }}
</button>



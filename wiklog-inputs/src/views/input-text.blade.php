@props([
  'property',
  'label',
  'placeholder',
  'old',
  'required' => false,
  'maxlength',
  'minlength',
  'classDiv',
  'classLabel',
  'classInput',
  'readonly' => false,
  'disabled' => false,
  'entity',
  'pivot' => false,
  'itemPivot',
  'autofocus' => false,
  'itemProperty'
])

<div class="{{ $classDiv ?? 'form-floating mb-3' }}" id="div_{{ $property }}">

  <input type="text" name="{{ $property }}" id="{{ $property }}" {{ $attributes->merge(['class' => 'form-control' . ($errors->has($property) ? ' is-invalid' : '')]) }}
    placeholder="{{ $placeholder ?? $label }}"
    value="{{ old($property, $entity != null
      ?
        ($itemPivot == null
          ? ($itemProperty == null
            ? $entity->$property
            : $entity->$itemProperty)
          : ($pivot
            ? $entity->pivot->$itemPivot
            : $entity->$itemPivot)
        )
      : ($old ?? '')) }}"
    {{ boolval($required) ? 'required="required"' : '' }}
    {{ $maxlength != null ? 'maxlength=' . $maxlength : '' }}
    {{ $minlength != null ? 'minlength=' . $minlength : '' }}
    {{ boolval($readonly) ? 'readonly="readonly"' : '' }}
    {{ boolval($disabled) ? 'disabled' : '' }}
    {{ boolval($autofocus) ? 'autofocus' : '' }}
  />
  <label for="{{ $property }}" class="{{ $classLabel ?? '' }} {{ boolval($required) ? 'required' : '' }}">
    {{ $label }}
  </label>
  @error($property)
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

@if (boolval($autofocus))
  <script>
    window.onload = function() {
      document.getElementById("{{ $property }}").focus();
    };
  </script>
@endif

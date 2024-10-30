<div class="mb-3">
    <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>

    @php
        $invalidFeedback = '';
        if ($errors->has($name)) {
            $invalidFeedback = '<div class="invalid-feedback font-weight-bold" role="alert">' . $errors->first($name) . '</div>';
        }

        $path = $value ?? 'images/no-image.svg';
    @endphp

    @if ($type === 'file')
        <div class="d-flex">
            <div>
                <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" value="{{ old($name, $value ?? '') }}" placeholder="{{ $placeholder }}" class="form-control {{ $name }} {{ $attributes->get('class') }} @error($name) is-invalid @enderror" {{ $attributes }}>
                {!! $invalidFeedback !!}
            </div>
            <a id="{{ $name }}Link" href="{{ Storage::url($path) }}" target="_balnk">
                <img id="{{ $name }}Preview" src="{{ Storage::url($path) }}" alt="Image Preview" class="img-thumbnail img-input ml-1" />
            </a>
        </div>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}" value="{{ old($name, $value ?? '') }}" placeholder="{{ $placeholder }}" class="form-control {{ $name }} {{ $attributes->get('class') }} @error($name) is-invalid @enderror"
            {{ $attributes }}>
        {!! $invalidFeedback !!}
    @endif

    @if ($attributes->has('data-indicator') && $attributes->get('data-indicator') === 'pwindicator')
        <div id="pwindicator" class="pwindicator">
            <div class="bar"></div>
            <div class="label"></div>
        </div>
    @endif
</div>

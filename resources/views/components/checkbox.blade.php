@php use Illuminate\Support\Str; @endphp
@php($id = Str::uuid())

<div class="form-check">
    <input type="checkbox" {{ $attributes->merge([
    'value' => '1',
]) }}vvalue="1" class="form-check-input" id="{{ $id }}">

    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>

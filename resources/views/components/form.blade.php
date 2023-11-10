<form novalidate {{ $attributes }}>
    @csrf
    {{ $slot }}
</form>

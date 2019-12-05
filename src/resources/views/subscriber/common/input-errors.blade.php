@if ($errors->any())
    <ul id="login-validation-errors" class="validation-errors text-danger">
        @foreach ($errors->all() as $error)
            <li class="validation-error-item">{{ $error }}</li>
        @endforeach
    </ul>
@endif

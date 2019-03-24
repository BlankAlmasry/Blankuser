@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <ul class="list-unstyled font-weight-bold small text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

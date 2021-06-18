@if ($errors->any())
<div class="d-inline-flex p-2">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all()  as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

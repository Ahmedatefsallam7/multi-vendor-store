<div>
    @if ($errors->any())
    <div id="alert_errors" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<script>
    setTimeout(function() {
        $('#alert_errors').alert('close');
    }, 5000);

</script>

<div>
    @session("Add")
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-check-circle"></i> {{ $value /*session()->get('Add')*/ }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endsession


    @session('Edit')
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-pencil-alt"></i> {{ $value /*session()->get('Edit')*/ }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endsession


    @session("Delete")
    <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-times-circle"></i> {{$value /*session()->get('Delete')*/ }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endsession
</div>

<script>
    setTimeout(function() {
        $('#alert').alert('close');
    }, 5000);

</script>

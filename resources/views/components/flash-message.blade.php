<div>
    @if (session()->has('done'))
        <div class="alert alert-success" role="alert">
            {{ session('done') }}
        </div>
    @endif
</div>



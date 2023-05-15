@if(session()->has('alert.success'))
    <div class="alert alert-success mb-0 rounded-0 p-2 text-center small" role="alert">
        {{ session()->pull('alert.success') }}
    </div>
@elseif(session()->has('alert.danger'))
    <div class="alert alert-danger mb-0 rounded-0 p-2 text-center small" role="alert">
        {{ session()->pull('alert.danger') }}
    </div>
@elseif(session()->has('alert.warning'))
    <div class="alert alert-warning mb-0 rounded-0 p-2 text-center small" role="alert">
        {{ session()->pull('alert.warning') }}
    </div>
@endif
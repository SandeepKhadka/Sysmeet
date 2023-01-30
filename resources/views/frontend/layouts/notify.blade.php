@if (session('success'))
    <div class="alert alert-dismissible fade show text-center" id="alert" role="alert" style="background-color: lightgreen">
        <span class="text-white fw-bold h5" style="text-align: center; font-weight: 500px">{{ session('success') }}</span>
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> --}}
    </div>
@elseif (session('error'))
    <div class="alert alert-dismissible fade show" id="alert" role="alert" style="background-color: lightcoral">
        <span class="text-white fw-bold h5" style="text-align: center; font-weight: 500px">{{ session('error') }}</span>
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> --}}
    </div>
@endif

@if(session('success'))
    <div class="alert border-0 alert-dismissible fade show py-2 text-center">
        <div class="d-flex align-items-center text-center">
            <div class="font-35 text-green"><i class="bx bxs-check-circle"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-green">{{session('success')}}</h6>

            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if(session('error'))
     <div class="alert border-0 alert-dismissible fade show py-2 text-center">
        <div class="d-flex align-items-center text-center">
            <div class="font-35 text-red"><i class="bx bxs-check-circle"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-red">{{session('error')}}</h6>

            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



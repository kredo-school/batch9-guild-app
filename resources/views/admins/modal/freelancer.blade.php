@if ($freelancer->trashed())
    {{-- Activate --}}
    <div class="modal fade" id="activate-user-{{ $freelancer->user->id }}">
        <div class="modal-dialog">
            <div class="modal-content border-success">
                <div class="modal-header border-success">
                    <h3 class="h5 modal-title text-success">
                        <i class="fa-solid fa-user-check"></i> Activate Freelancer
                    </h3>
                </div>
                <div class="modal-body">
                    Are you sure you want to activate <span class="fw-bold">{{ $freelancer->user->name }}</span>?
                </div>
                <div class="modal-footer border-0">
                    <form action="{{ route('admin.freelancer.activate', $freelancer->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">Activate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    {{-- Deactivate --}}
    <div class="modal fade" id="deactivate-user-{{ $freelancer->user->id }}">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-solid fa-user-slash"></i> Deactivate Freelancer
                    </h3>
                </div>
                <div class="modal-body">
                    Are you sure you want to deactivate <span class="fw-bold">{{ $freelancer->user->name }}</span>?
                </div>
                <div class="modal-footer border-0">
                    <form action="{{ route('admin.freelancer.deactivate', $freelancer->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif



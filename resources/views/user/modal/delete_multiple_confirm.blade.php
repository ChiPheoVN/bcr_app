<div class="modal fade" id="modalDeleteMultipleUsersConfirm">
    <form action="{{ route('delete-multiple-users') }}" method="post" class="form-delete-multiple-users">
        @csrf
        @method('DELETE')
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Delete Multiple Users Confirm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="d-none">
                    @foreach ($users as $user)
                        <input value="{{ $user->id }}" name="user[]" type="checkbox" data-modal-body-text-append="Confirm delete user {{ $user->user_name }}">
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i></button>
            </div>
        </div>
        </div>
    </form>
</div>
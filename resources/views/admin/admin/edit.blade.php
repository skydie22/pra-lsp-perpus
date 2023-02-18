@foreach ($admin as $a)

<div class="modal fade" id="update-admin{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.update.admin' , $a->id) }}" method="post">
            @csrf
            @method('put')
        <div class="modal-body">

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="fullname"  value="{{ $a->fullname }}" required>
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">username</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="username" value="{{ $a->username }}" required>
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endforeach

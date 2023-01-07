<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload new image</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf
                <div class="form-group row">
                    <label for="image" class="col-md-3 col-form-label text-md-right">
                        {{ __('image') }}
                    </label>
                    <div class="col-md-9">
                        <input id="upload{{$iteration}}" type="file" wire:model="image"
                            class="form-control @error('image') is-invalid @enderror" name="image" required
                            autocomplete="image" autofocus>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="image" class="col-md-3 col-form-label text-md-right">
                        {{ __('description') }}
                    </label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="description" wire:model="description" cols="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="saveImage" id="save">save</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="id" id="id_data" value="{{ $divisi->id }}" />
                <div class="form-group">
                    <label @error('nama') class="text-danger" @enderror>Nama Divisi
                        @error('nama')
                            | {{ $message }}
                        @enderror</label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        value="{{ $divisi->nama }}">
                </div>
        </div>
</div>
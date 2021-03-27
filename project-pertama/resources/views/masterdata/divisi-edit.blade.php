<div class="row">
    <div class="col-md-6">
        <input type="hidden" name="id" id="id_data" value="{{ $setup->id }}" />
                <div class="form-group">
                    <label @error('nama_aplikasi') class="text-danger" @enderror>Nama Aplikasi
                        @error('nama_aplikasi')
                            | {{ $message }}
                        @enderror</label>
                    <input type="text" class="form-control" name="nama_aplikasi" id="nama_aplikasi"
                        value="{{ $setup->nama_aplikasi }}">
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label @error('jumlah_hari_kerja') class="text-danger" @enderror>Hari Kerja
                    @error('jumlah_hari_kerja')
                        | {{ $message }}
                    @enderror</label>
                <input type="text" class="form-control" name="jumlah_hari_kerja" id="jumlah_hari_kerja"
                    value="{{ $setup->jumlah_hari_kerja }}">
            </div>
        </div>
</div>
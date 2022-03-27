@foreach ($ajax as $d )

<div class="form-group">
    <label>harga</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Rp.</span>
        </div>
        <input type="number" class="form-control" id="harga" value="{{ $d->harga }}" readonly required>
    </div>
</div>

@endforeach

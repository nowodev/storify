<div class="mb-3">
  <label for="title" class="form-label">Title:</label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
    value="{{ old('title', $story->title) }}">
  @error('title')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="mb-3">
  <label for="body" class="form-label">Body:</label>
  <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3"">{{ old('body', $story->body) }}</textarea>
  @error('body')
    <span class=" invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="mb-3">
  <label for="type" class="form-label">Type:</label>
  <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
    <option value="">-- Select --</option>
    <option value="short" {{ 'short' == old('type', $story->type ) ? 'selected' : '' }}>Short</option>
    <option value="long" {{ 'long' == old('type', $story->type) ? 'selected' : '' }}>Long</option>
  </select>
  @error('type')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>

<div class="mb-3">
  <h6 class="form-label">Status:</h6>
  <div class="form-check @error('status') is-invalid @enderror">
    <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status"
      value="1" {{ '1' == old('status', $story->status) ? 'checked' : '' }}>Yes
    </label>
  </div>
  <div class="form-check @error('status') is-invalid @enderror">
    <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status"
      value="0" {{ '0' == old('status', $story->status) ? 'checked' : '' }}>No
    </label>
  </div>
  @error('status')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
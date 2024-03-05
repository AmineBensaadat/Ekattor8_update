<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.create.section') }}">
        @csrf 
        <div class="form-row">
            <div class="fpb-7">
              <label for="name" class="eForm-label">{{ get_phrase('Classes') }}</label>
              <select name="classe_id" id="classes_id" class="form-select" required>
                <option value="">{{ get_phrase('Select a Section') }}</option>
                  @foreach($classes as $key => $classe)
                  <option value="{{ $classe['id'] }}">{{ $classe['name'] }}</option>
                  @endforeach
              </select>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('Create section') }}</button>
            </div>
            <div class="fpb-7 pt-2">
        </div>
    </form>
</div>
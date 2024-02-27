<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.create.class') }}">
        @csrf 
        <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>
                <input type="text" class="form-control eForm-control" id="name" name="name" required>
            </div>
            <div class="fpb-7">
              <label for="name" class="eForm-label">{{ get_phrase('Section') }}</label>
              <select name="section" id="section_id" class="form-select" required>
                <option value="">{{ get_phrase('Select a Section') }}</option>
                  @foreach($sections as $key => $section)
                  <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                  @endforeach
              </select>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('Create class') }}</button>
            </div>
        </div>
    </form>
</div>
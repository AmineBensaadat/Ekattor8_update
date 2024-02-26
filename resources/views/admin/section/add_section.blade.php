<div class="eoff-form">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('admin.create.section') }}">
        @csrf 
        <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>
                <input type="text" class="form-control eForm-control" id="name" name="name" required>
            </div>
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Classes') }}</label>
                <select name="class" id="class_id" class="form-select" required>
                  <option value="">{{ get_phrase('Select a Class') }}</option>
                    @foreach($classes as $key => $class)
                    <option value="{{ $class['id'] }}">{{ $class['name'] }}</option>
                    @endforeach
                </select>
              </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('Create class') }}</button>
            </div>
        </div>
    </form>
</div>
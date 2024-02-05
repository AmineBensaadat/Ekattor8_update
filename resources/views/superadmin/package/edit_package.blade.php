<style>
    .limitedst{
    display: none;
}
</style>

<div class="eForm-layouts">
    <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('superadmin.package.update', ['id' => $package->id]) }}">
         @csrf 
        <div class="form-row">
            <div class="fpb-7">
                <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>
                <input type="text" class="form-control eForm-control" value="{{ $package->name }}" id="name" name = "name" placeholder="Provide package name" required>
            </div>
            <div class="fpb-7">
                <label for="price" class="eForm-label">{{ get_phrase('Package price') }}</label>
                <input type="number" min="0" class="form-control eForm-control" value="{{ $package->price }}" id="price" name = "price" placeholder="Provide package price" required>
            </div>
            <div class="fpb-7">
                <label for="package_type" class="eForm-label">{{ get_phrase('Package Type') }}</label>
                <select name="package_type" id="package_type" class="form-select eForm-select eChoice-multiple-with-remove" >
                    <option value="">{{ get_phrase('Select a package type') }}</option>
                    <option value="paid" {{ $package->package_type == 'paid' ?  'selected':'' }} >{{ get_phrase('Paid') }}</option>
                    <option value="trial" {{ $package->package_type == 'trial' ?  'selected':'' }}>{{ get_phrase('Trial') }}</option>
                    
                </select>
            </div>
            <div class="fpb-7">
                <label for="interval" class="eForm-label">{{ get_phrase('Interval') }}</label>
                <select name="interval" id="interval" class="form-select eForm-select eChoice-multiple-with-remove" onchange="togglepackageWiseOptions(this.value)">
                    <option value="">{{ get_phrase('Select a interval') }}</option>
                    <option value="Days" {{ $package->interval == 'Days' ?  'selected':'' }} >{{ get_phrase('Days') }}</option>
                    <option value="Monthly" {{ $package->interval == 'Monthly' ?  'selected':'' }} >{{ get_phrase('Monthly') }}</option>
                    <option value="Yearly" {{ $package->interval == 'Yearly' ?  'selected':'' }} >{{ get_phrase('Yearly') }}</option>
                    <option value="life_time" {{ $package->interval == 'life_time' ?  'selected':'' }}>{{ get_phrase('Life time') }}</option>
                </select>
            </div>

            <div class="fpb-7">
                <label for="days" class="eForm-label">{{ get_phrase('Interval Preiod') }}</label>
                <input type="number" min="0" class="form-control eForm-control" value="{{ $package->days }}" id="days" name = "days" placeholder="Provide interval days/month/year" required>
            </div>

            <div class="fpb-7 limitst">
                <input  class="form-check-input" type="radio" name="studentLimit" id="unlimitedst" value="Unlimited" {{ $package->studentLimit == 'Unlimited' ?  'checked':''}} >
                <label class="eForm-label" for="unlimitedst">
                    Unlimited Students
                </label>
            </div>

            <div class="fpb-7">
                <input class="form-check-input" type="radio" name="studentLimit" id="limited" value="{{$package->studentLimit}}"     {{ $package->studentLimit != 'Unlimited' ?  'checked':'' }}>
                <label class="eForm-label" for="limited">
                  Limited Students
                </label>
            </div>

            <div class="fpb-7 limitedst">
                <label for="studentLimit" class="eForm-label">{{ get_phrase('Students Limit') }}</label>
                <input type="number" min="0" class="form-control eForm-control" id="studentLimit" name="" value="{{$package->studentLimit}}" placeholder="Provide Students Limit" >
            </div>


            <div class="fpb-7">
                <label for="status" class="eForm-label">{{ get_phrase('Status') }}</label>
                <select name="status" id="status" class="form-select eForm-select eChoice-multiple-with-remove">
                    <option value="">{{ get_phrase('Select a status') }}</option>
                    <option value="1" {{ $package->status == '1' ?  'selected':'' }} >{{ get_phrase('Active') }}</option>
                    <option value="0" {{ $package->status == '0' ?  'selected':'' }} >{{ get_phrase('Archive') }}</option>
                </select>
            </div>
            @if(!empty($package->features))
            <div class="fpb-7">
                <label for="features" class="eForm-label">{{ get_phrase('Features') }}</label>
                <div class="new_div">
                    <div class="row">
                       
                        @php

						$packages_features = json_decode($package->features);
                        
					   @endphp 
                        <div class="col-sm-9" id="inputContainer">
                            @foreach ($packages_features as $packages_feature)
						
                        <input type="text" name="features[]" class="form-control eForm-control mb-1" value="{{ $packages_feature }}" placeholder="{{get_phrase('Write a new features')}}">
						@endforeach
                       
                        </div>
                        <div class="col-sm-3 p-0">
                            <button type="button" onclick="appendInput()" class="btn btn-icon feature_btn btn-success"><i class="bi bi-plus"></i></button>
                            <button type="button"  onclick="removeInput()" class="btn btn-icon feature_btn btn-danger"> <i class="bi bi-dash"></i></button>
                        </div>
                    </div>
                </div>
            </div>  
            @else
            <div class="fpb-7">
                <label for="features" class="eForm-label">{{ get_phrase('Features') }}</label>
                <div class="new_div">
                    <div class="row">
                        <div class="col-sm-9" id="inputContainer">
                            <input type="text" name="features[]" class="eForm-control form-control" placeholder="{{get_phrase('Write Features')}}">
                        </div>
                        <div class="col-sm-3 p-0">
                            <button type="button" onclick="appendInput()" class="btn btn-icon feature_btn btn-success"><i class="bi bi-plus"></i></button>
                            <button type="button"  onclick="removeInput()" class="btn btn-icon feature_btn btn-danger"> <i class="bi bi-dash"></i></button>
                        </div>
                    </div>
                </div>
            </div>             
            @endif
            <div class="fpb-7">
                <label for="description" class="eForm-label">{{ get_phrase('Description') }}</label>
                <textarea class="form-control eForm-control" id="description" name = "description" rows="2" placeholder="Provide a short description" required>{{ $package->description }}</textarea>
            </div>
            <div class="fpb-7 pt-2">
                <button class="btn-form" type="submit">{{ get_phrase('Update package') }}</button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

    "use strict";
    
    $(document).ready(function () {
      $(".eChoice-multiple-with-remove").select2();
    });

    function togglepackageWiseOptions(interval) {
        if (interval === "life_time") {
            
            $("#days").hide();
            $('#limited').prop('disabled', true);
        }else{
           
            $("#days").show();
            $('#limited').prop('disabled', false);
        }
    }

    $(document).ready(function(){
  $("#unlimitedst").click(function(){
    $(".limitedst").hide();
  });
  $("#limited").click(function(){
    $(".limitedst").show();
    $("#studentLimit").attr('name', 'studentLimit');

  });
});


function appendInput() {
      var container = document.getElementById('inputContainer');
      var newInput = document.createElement('input');
      newInput.setAttribute('type', 'text');
      newInput.setAttribute('placeholder', '{{get_phrase('Write service')}}');
      newInput.setAttribute('class', 'eForm-control mt-2');
      newInput.setAttribute('name', 'features[]');
      container.appendChild(newInput);
    }

    function removeInput() {
      var container = document.getElementById('inputContainer');
      var inputs = container.getElementsByTagName('input');
      if (inputs.length > 1) {
        container.removeChild(inputs[inputs.length - 1]);
      }
    }

</script>
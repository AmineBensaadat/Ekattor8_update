@extends('admin.navigation')
   
@section('content')

<?php 

use App\Http\Controllers\CommonController;
use App\Models\School;
use App\Models\Section;

?>
<style>
  .dataTables_filter {
    display: none;
}
</style>
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('Students') }}</h4>
            <ul class="d-flex align-items-center eBreadcrumb-2">
              <li><a href="#">{{ get_phrase('Home') }}</a></li>
              <li><a href="#">{{ get_phrase('Users') }}</a></li>
              <li><a href="#">{{ get_phrase('Students') }}</a></li>
            </ul>
          </div>
          <div class="export-btn-area">
            <a href="{{ route('admin.offline_admission.single', ['type' => 'single']) }}" class="export_btn">{{ get_phrase('Create Student') }}</a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Start Students area -->
<div class="row">
    <div class="col-12">
        <div class="eSection-wrap-2">
          <!-- Search and filter -->
            <div
              class="search-filter-area d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15"
            >
              <form action="{{ route('admin.student') }}">
                <div
                  class="search-input d-flex justify-content-start align-items-center"
                >
                  <span>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      viewBox="0 0 16 16"
                    >
                      <path
                        id="Search_icon"
                        data-name="Search icon"
                        d="M2,7A4.951,4.951,0,0,1,7,2a4.951,4.951,0,0,1,5,5,4.951,4.951,0,0,1-5,5A4.951,4.951,0,0,1,2,7Zm12.3,8.7a.99.99,0,0,0,1.4-1.4l-3.1-3.1A6.847,6.847,0,0,0,14,7,6.957,6.957,0,0,0,7,0,6.957,6.957,0,0,0,0,7a6.957,6.957,0,0,0,7,7,6.847,6.847,0,0,0,4.2-1.4Z"
                        fill="#797c8b"
                      />
                    </svg>
                  </span>
                  <input
                    type="text"
                    id="search"
                    name="search"
                    placeholder="Search Students"
                    class="form-control"
                  />
                  @if($class_id != '')
                  <input type="hidden" name="class_id" id="class_id" value="{{ $class_id }}">
                  @endif
                  @if($section_id != '')
                  <input type="hidden" name="section_id" id="section_id" value="{{ $section_id }}">
                  @endif
                </div>
              </form>
              <div class="filter-export-area d-flex align-items-center">

              </div>
            </div>
            @if(count($students) > 0)
            <div class="table-responsive">
              <table id="student_dt" class="table eTable eTable-2 table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ get_phrase('Name') }}</th>
                    <th scope="col">{{ get_phrase('Email') }}</th>
                    <th scope="col">{{ get_phrase('Options') }}</th>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <?php 

                        $student = DB::table('users')->where('id', $student->id)->first();

                        $user_image = get_user_image($student->id);

                        //$student_details = (new CommonController)->get_student_academic_info($student->id);
                    ?>
                      <tr>
                        <th scope="row">
                          {{-- <p class="row-number">{{ $students->firstItem() + $key }}</p> --}}
                        </th>
                        <td>
                          <div
                            class="dAdmin_profile d-flex align-items-center min-w-200px"
                          >
                            <div class="dAdmin_profile_img">
                              <img
                                class="img-fluid"
                                width="50"
                                height="50"
                                src="{{ $user_image }}"
                              />
                            </div>
                            <div class="dAdmin_profile_name dAdmin_info_name">
                              <h4>{{ $student->name }}</h4>
                              <p>
                                @if(empty($student_details->class_name))
                                <span>{{ get_phrase('Class') }}:</span>
                                 {{ get_phrase('Removed') }}
                                 <br>
                                <span>{{ get_phrase('Section') }}:</span>
                                {{ get_phrase('Removed') }}
                                @else
                                <span>{{ get_phrase('Class') }}:</span> {{ $student_details->class_name }}
                                <br>
                                <span>{{ get_phrase('Section') }}:</span> {{ $student_details->section_name }}
                                @endif
                              </p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="dAdmin_info_name min-w-250px">
                            <p>{{ $student->email }}</p>
                          </div>
                        </td>
                        <td>
                          <div class="adminTable-action">
                            <button
                              type="button"
                              class="eBtn eBtn-black dropdown-toggle table-action-btn-2"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              {{ get_phrase('Actions') }}
                            </button>
                            <ul
                              class="dropdown-menu dropdown-menu-end eDropdown-menu-2 eDropdown-table-action"
                            >
                              <li>
                                <a class="dropdown-item" href="javascript:;" onclick="largeModal('{{ route('admin.student.id_card', ['id' => $student->id]) }}', '{{ get_phrase('Generate id card') }}')">{{ get_phrase('Generate Id card') }}</a>
                              </li>

                              <li>
                                <a class="dropdown-item" href="javascript:;" onclick="rightModal('{{ route('admin.student_edit_modal', ['id' => $student->id]) }}', 'Edit Student')">{{ get_phrase('Edit') }}</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:;" onclick="confirmModal('{{ route('admin.student.delete', ['id' => $student->id]) }}', 'undefined');">{{ get_phrase('Delete') }}</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:;" onclick="largeModal('{{ route('admin.student.student_profile', ['id' => $student->id]) }}','{{ get_phrase('Student Profile') }}')">{{ get_phrase('Profile') }}</a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              
              <div
                  class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center flex-wrap gr-15"
                >
                  {{-- <p class="admin-tInfo">{{ get_phrase('Showing').' 1 - '.count($students).' '.get_phrase('from').' '.$students->total().' '.get_phrase('data') }}</p> --}}
                  {{-- <div class="admin-pagi">
                    {!! $students->appends(request()->all())->links() !!}
                  </div> --}}
                </div>
              </div>
              
            </div>
            @else
            <div class="empty_box center">
              <img class="mb-3" width="150px" src="{{ asset('assets/images/empty_box.png') }}" />
              <br>
              <span class="">{{ get_phrase('No data found') }}</span>
            </div>
            @endif
        </div>
    </div>
</div>

@if(count($students) > 0)
<!-- Table -->
<div class="table-responsive student_list display-none-view" id="student_list">
  <h4 class="" style="font-size: 16px; font-weight: 600; line-height: 26px; color: #181c32; margin-left:45%; margin-bottom:15px; margin-top:17px;">{{ get_phrase(' Students List') }}</h4>
  <table class="table eTable eTable-2">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{ get_phrase('Name') }}</th>
        <th scope="col">{{ get_phrase('Email') }}</th>
        <th scope="col">{{ get_phrase('User Info') }}</th>
    </thead>
    <tbody>
      @foreach($students as $student)
      <?php 

          $student = DB::table('users')->where('id', $student->id)->first();

          $user_image = get_user_image($student->id);
          // $info = json_decode($student->user_information);

          //$student_details = (new CommonController)->get_student_academic_info($student->id);
      ?>
        <tr>
          <th scope="row">
            <p class="row-number">{{ $loop->index + 1 }}</p>
          </th>
          <td>
            <div
              class="dAdmin_profile d-flex align-items-center min-w-200px"
            >
              <div class="dAdmin_profile_img">
                <img
                  class="img-fluid"
                  width="50"
                  height="50"
                  src="{{ asset('assets') }}/{{ $user_image }}"
                />
              </div>
              <div class="dAdmin_profile_name dAdmin_info_name">
                <h4>{{ $student->name }}</h4>
                <p>
                  @if(empty($student_details->class_name))
                  <span>{{ get_phrase('Class') }}:</span> removed
                  @else
                  <span>{{ get_phrase('Class') }}:</span> {{ $student_details->class_name }}
                  @endif
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="dAdmin_info_name min-w-250px">
              <p>{{ $student->email }}</p>
            </div>
          </td>
          <td>
            <div class="dAdmin_info_name min-w-250px">
              {{-- <p><span>{{ get_phrase('Phone') }}:</span> {{ $student->phone }}</p> --}}
              {{-- <p>
                <span>{{ get_phrase('Address') }}:</span> {{ $student->address }}
              </p> --}}
            </div>
          </td>
          
        </tr>
      @endforeach
  </tbody>
  </table>
  {{-- {{!! $students->appends(request()->all())->links() !!}} --}}
</div>
@endif

<!-- jQuery -->
<script
	  src="https://code.jquery.com/jquery-3.1.1.min.js"
	  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	  crossorigin="anonymous"></script>

	 <!-- datatables script -->
	 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js" defer></script>

	 <!-- datatables bootstrap script -->
	 <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" defer></script>

	 <!-- bootstrap style -->
	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 
	 <!-- datatables style css -->
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

	 <!-- create datatables -->
	  <script type="text/javascript">
	  	$(document).ready(function(){
	   		$('#student_dt').DataTable();
		});

    $('#search').keyup(function() {
    var table = $('#student_dt').DataTable();
    table.search($(this).val()).draw();
});
	  </script>
<script type="text/javascript">

  "use strict";
  function classWiseSection(classId) {
    let url = "{{ route('class_wise_sections', ['id' => ":classId"]) }}";
    url = url.replace(":classId", classId);
    $.ajax({
        url: url,
        success: function(response){
            $('#section_id').html(response);
        }
    });
  }

  function Export() {

      // Choose the element that our invoice is rendered in.
      const element = document.getElementById("student_list");

      // clone the element
      var clonedElement = element.cloneNode(true);

      // change display of cloned element
      $(clonedElement).css("display", "block");

      // Choose the clonedElement and save the PDF for our user.
    var opt = {
      margin:       1,
      filename:     'student_list_{{ date("y-m-d") }}.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 }
    };

    // New Promise-based usage:
    html2pdf().set(opt).from(clonedElement).save();

      // remove cloned element
      clonedElement.remove();
  }

  function printableDiv(printableAreaDivId) {
    var printContents = document.getElementById(printableAreaDivId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }

</script>


<!-- End Students area -->
@endsection
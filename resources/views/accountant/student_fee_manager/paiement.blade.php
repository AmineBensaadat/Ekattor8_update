@extends('accountant.navigation')
   
@section('content')
    <!-- Start User Profile area -->
    <div class="user-profile-area d-flex flex-wrap">
        <!-- Left side -->
        <div class="user-info d-flex flex-column">
            <div
            class="user-info-basic d-flex flex-column justify-content-center"
            >
            <div class="user-graphic-element-1">
                <img src="{{ asset('assets/images/sprial_1.png') }}" alt="" />
            </div>
            <div class="user-graphic-element-2">
                <img src="{{ asset('assets/images/polygon_1.png') }}" alt="" />
            </div>
            <div class="user-graphic-element-3">
                <img src="{{ asset('assets/images/circle_1.png') }}" alt="" />
            </div>
            <div class="userImg">
                <img width="100%" height="150px" src="{{ get_user_image(auth()->user()->id) }}" alt="" />
            </div>
            <div class="userContent text-center">
                <h4 class="title">{{ auth()->user()->name }}</h4>
                <p class="info">{{ get_phrase('Accountant') }}</p>
                <p class="user-status-verify">{{ get_phrase('Verified') }}</p>
            </div>
            </div>
            <div class="user-info-edit">
            <div
                class="user-edit-title d-flex justify-content-between align-items-center"
            >
                <h3 class="title">{{ get_phrase('Details info') }}</h3>
            </div>
            <div class="user-info-edit-items">
                <div class="item">
                <p class="title">{{ get_phrase('Email') }}</p>
                <p class="info">{{ auth()->user()->email }}</p>
                </div>
                <div class="item">
                <p class="title">{{ get_phrase('Phone Number') }}</p>
                <p class="info">{{ json_decode(auth()->user()->user_information, true)['phone'] }}</p>
                </div>
                <div class="item">
                <p class="title">{{ get_phrase('Address') }}</p>
                <p class="info">
                {{ json_decode(auth()->user()->user_information, true)['address'] }}
                </p>
                </div>
            </div>
            </div>
        </div>
        <!-- Right side -->
        <div class="user-details-info">
            
            <!-- Tab content -->
            <div class="tab-content eNav-Tabs-content" id="myTabContent">
            <div
                class="tab-pane fade show active"
                id="basicInfo"
                role="tabpanel"
                aria-labelledby="basicInfo-tab"
            >
                <div class="eForm-layouts">
                <!----------------------------------------- my form ----------------- -->
                <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm" action="{{ route('accountant.create.fee_manager', ['value' => 'single']) }}">
                  @csrf 
                  <div class="form-row">
                
                    <div class="fpb-7">
                      <label for="title" class="eForm-label">{{ get_phrase('Invoice title') }}</label>
                      <input type="text" class="form-control eForm-control" id="title" name = "title" required>
                    </div>
                
                    <div class="fpb-7">
                      <label for="total_amount" class="eForm-label">{{ get_phrase('Total amount').'('.school_currency().')' }}</label>
                      <input type="number" class="form-control eForm-control" id="total_amount" name = "total_amount" required>
                    </div>
                
                    <div class="fpb-7">
                      <label for="paid_amount" class="eForm-label">{{ get_phrase('Paid amount').'('.school_currency().')' }}</label>
                      <input type="number" class="form-control eForm-control" id="paid_amount" name = "paid_amount" required>
                    </div>
                
                    <div class="fpb-7">
                      <label for="status" class="eForm-label">{{ get_phrase('Status') }}</label>
                      <select name="status" id="status" class="form-select eForm-select eChoice-multiple-with-remove" required >
                        <option value="">{{ get_phrase('Select a status') }}</option>
                        <option value="paid">{{ get_phrase('Paid') }}</option>
                        <option value="unpaid">{{ get_phrase('Unpaid') }}</option>
                      </select>
                    </div>

                    <input type="hidden" id="student_id" name="student_id" value="{{ $student_id }}">
                    <input type="hidden" id="class_id" name="class_id" value="1">
                    
                    <div class="fpb-7">
                      <label for="payment_method" class="eForm-label">{{ get_phrase('Payment method') }}</label>
                      <select name="payment_method" id="payment_method" class="form-select eForm-select eChoice-multiple-with-remove">
                        <option value="">{{ get_phrase('Select a payment method') }}</option>
                        <option value="cash">{{ get_phrase('Cash') }}</option>
                        <option value="paypal">{{ get_phrase('Paypal') }}</option>
                        <option value="paytm">{{ get_phrase('Paytm') }}</option>
                        <option value="razorpay">{{ get_phrase('Razorpay') }}</option>
                      </select>
                    </div>
                
                  </div>
                  <div class="form-group  col-md-12">
                    <button class="btn-form" type="submit">{{ get_phrase('Create invoice') }}</button>
                  </div>
                </form>
                <!------------------------- end form ------------------------- -->
                </div>
            </div>

            </div>
        </div>
    </div>
    <!-- End User Profile area -->
@endsection
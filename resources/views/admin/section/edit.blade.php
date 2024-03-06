<?php
use App\Models\Section;
use App\Models\Classes;
use App\Models\ClasseSection;
?>

@extends('admin.navigation')

@section('content')
    <div class="eoff-form">
        <form method="POST" enctype="multipart/form-data" class="d-block ajaxForm"
            action="{{ route('admin.update.section', ['id' => $section->name]) }}">
            @csrf
            <div class="form-row col-md-4">
                <div class="fpb-7">
                    <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>
                    <input type="text" class="form-control eForm-control" value="{{ $section->name }}" id="name"
                        name = "name" required>
                </div>
                <br>
                <div class="fpb-7">
                    <label for="name" class="eForm-label">{{ get_phrase('Name') }}</label>

                    @foreach ($classes as $classe)
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input"
                                @php 
                                if( count(ClasseSection::get()->where('class_id', $classe->id)->where('section_id', $section->id)->where('school_id', auth()->user()->school_id)) >  0){
                                  echo ('checked');
                                } @endphp
                                name="classes[]" value="{{ $classe->id }}">
                            <label class="custom-control-label">{{ $classe->name }}</label>
                        </div>
                        <br>
                    @endforeach
                    <br>


                </div>

                <div class="fpb-7 pt-2">
                    <button class="btn-form" type="submit">{{ get_phrase('Update') }}</button>
                </div>
            </div>

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

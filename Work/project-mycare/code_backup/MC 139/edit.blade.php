@extends('layouts.app')

<!--
@section('style')

<link rel="stylesheet" href="{{url('css/cropper/cropper.css')}}">
<link rel="stylesheet" href="{{url('css/cropper/main.css')}}">

<style>

.cropper_button {
    
    font-size: 26px;
    text-align: center;
    text-decoration: none;
    
}

</style>
@endsection
-->

    <!--
@section('content')
    <div class="container">
   
        <div class="columns">
            <div class="column is-8">
                @include('template.resident_header', ['resident' => $resident])
            </div>
            <div class="column is-4">
                <a href="{{url('/resident/select/'.$resident->_id)}}" class="button is-outlined is-primary">{{__('mycare.resident_view')}}</a>
                <a href="{{url('/resident/movement/'.$resident->_id)}}" class="button is-outlined is-primary">{{__('mycare.movement')}}</a>
            </div>
        </div>
   

        <form method="post" action="{{url('/resident/update')}}">
        <div class="columns">
    
            <div class="column is-6">

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.admission_type')}}</label>
                    <div class="control">
                        <span class="select">
                            <select name="AdmissionType" disabled>
                                @foreach($services as $s)
                                    @if ($s->_id == #resident->AdmissionType)
                                        <option value="{{$s->_id}}" selected>{{$s->text}}</option>
                                    @else
                                        <option value="{{$s->_id}}">{{$s->text}}</option>
                                    @endif                                    
                                @endforeach
                            </select>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.ur_number')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="URNumber" value="{{$resident->URNumber}}" readonly/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.title')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="title" value="{{$resident->title}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.first_name')}}</label>
                    <div class="control">
                        <input class="input" type="text" name="first_name" value="{{$resident->first_name}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.middle_name')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="middle_name" value="{{$resident->middle_name}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.last_name')}}</label>
                    <div class="control">
                        <input class="input" type="text" name="last_name" value="{{$resident->last_name}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.preferred_name')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="preferred_name" value="{{$resident->preferred_name}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.dob')}}</label>
                    <div class="contorl">
                        <input class="input" id="datepicker" name="dob" value=""/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.gender')}}</label>
                    <div class="control">
                        <span class="select">
                            <select name="Gender">
                            <option value="male">{{__('mycare.male')}}</option>
                            <option value="female">{{__('mycare.female')}}</option>
                            </select>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <div class="control"><label class="label has-text-left">{{__('mycare.location')}}</label>
                    </div>

                    <div class="field has-addons">
                        <div class="control">
                            <input class="input" type="text" readonly name="location" value="{{$resident->LocationName}}"/>
                        </div>
                        <div class="control">
                            <a class=button href="{{url('/resident/locationchange/'.$resident->_id)}}">{{__('mycare.change')}}</a>

                        </div>
                    </div>

                </div>

                <div class="field">
                    <div class="control"><label class="label has-text-left">{{__('mycare.room')}}</label>
                    </div>
                    <div class="field has-addons">
                        <div class="control">
                            <input class="input" type="text" readonly name="room" value="{{$resident->Room}}"/>
                        </div>
                        <div class="control">
                            <a class=button href="{{url('/resident/roomchange/'.$resident->_id)}}">{{__('mycare.change')}}</a>

                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.bed')}}</label>
                    <div class="control">
                        <span class="select">
                            <select name="bed">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            </select>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.medication_trolley')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="medication_trolley" value="{{$resident->medication_trolley}}"/>
                    </div>
                </div>

            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label has-text-left">{{trans_choice('mycare.status',1)}}</label>
                    <div class="control">
                        <input class="radio" type="radio" name="status" value="1" @if($resident->StatusID==1) checked @endif/> {{__('mycare.active')}}
                        <input class="radio" type="radio" name="status" value="0" @if($resident->StatusID==0) checked @endif/> {{__('mycare.inactive')}}
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.resident_photo')}}</label>
                    <div class="field has-addons" >
                        <a class="button is-primary" onclick="event.preventDefault();onClickAddPhoto(this)">Add photo</a>
                        <label id="label_photo_uploaded" class="label" style="visibility: hidden"> {{__('mycare.photo_uploaded')}} </label>
                    </div>        
                    <input type="hidden" id="upload_hidden" name="croppedImage" />
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.photo_taken_date')}}</label>
                    <div class="contorl">
                        <input class="input" id="datepicker" name="photo_taken_date" />
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.province')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="province" value="{{$resident->province}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.primary_language')}}</label>
                    <div class="control">
                        <span class="select">
                            <select name="primary_language">
                            <option value="1">English</option>
                            <option value="2">Chinese</option>
                            </select>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.secondary_language')}}</label>
                    <div class="control">
                        <span class="select">
                            <select name="secondary_language">
                            <option value="1">English</option>
                            <option value="2">Chinese</option>
                            </select>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.social_security_number')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="social_security_number" value="{{$resident->social_security_number}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.pension_number')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="pension_number" value="{{$resident->pension_number}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.private_health_insurance')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="private_health_insurance" value="{{$resident->private_health_insurance}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.private_health_insurance_provider')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="private_health_insurance_provider" value="{{$resident->private_health_insurance_provider}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.nominated_hospital')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="nominated_hospital" value="{{$resident->nominated_hospital}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.funeral_arrangement')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="funeral_arrangement" value="{{$resident->funeral_arrangement}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.funeral_directory')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="funeral_directory" value="{{$resident->funeral_directory}}"/>
                    </div>
                </div>

                <div class="field">
                    <label class="label has-text-left">{{__('mycare.additional_information')}}</label>
                    <div class="control">
                        <input type="text" class="input" name="additional_information" value="{{$resident->additional_information}}"/>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="columns">
            <div class="column is-6">
                <button class="button is-primary">{{__('mycare.save')}}</button>
            </div>
        </div>

            <input type="hidden" name="residentId" value="{{$resident->_id}}"/>

            {{csrf_field()}}
        </form>

    </div>
@endsection
-->



<!--Modal for uploading photo.   Must put outside of main content
<div class="modal fade" id="upload_modal" style="background-color: rgba(224, 224, 224, 0.5)">
    <button type="button" class="cropper_button button is-primary" data-dismiss="modal">Close</button>
    @include('cropper.cropper_modal')
</div>
-->

<!--
@section('script')
    <script>
      function onClickAddPhoto(){
        $('#upload_modal').modal();
      }

      // Callback from Cropper
      function onImgDataURLReady(imageDataURL){
        document.getElementById('resident_header_img').setAttribute( 'src', imageDataURL );
        $("#label_photo_uploaded").css({ "visibility": "visible" });
      }
    </script>
    <script src="{{ url('js/cropper/common.js')}}"></script>
    <script src="{{ url('js/cropper/cropper.js')}}"></script>
    <script src="{{ url('js/cropper/main.js')}}"></script>
@endsection
-->

@extends('layouts.app')


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


@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-8">
                @include('template.resident_header', ['resident' => $resident])
            </div>
            <div class="column is-4">
                <a href="{{url('/resident/select/'.$resident->_id)}}" class="button is-outlined is-primary">{{__('mycare.resident_view')}}</a>
                <a href="{{url('/resident/movement/'.$resident->_id)}}" class="button is-outlined is-primary">{{__('mycare.movement')}}</a>
                <a onclick="event.preventDefault();onClickTab('link_contacts','tab_contacts')" class="button is-outlined is-primary">{{__('mycare.add_contact')}}</a>
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
                
        <div class="tabs is-boxed is-medium">
            <ul>
                <li id="link_details" class="tab-link is-active" onclick="onClickTab('link_details','tab_details')"><a>Resident details</a></li>
                <li id="link_contacts" class="tab-link" onclick="onClickTab('link_contacts','tab_contacts')"><a>Contacts</a></li>
                <li id="link_movement" class="tab-link" onclick="onClickTab('link_movement','tab_movement')"><a>Movement</a></li>
            </ul>
        </div> 

        <form method="post" action="{{url('/resident/update')}}">
        
        <div id="tab_details" class="tab-container">
            <div class="columns">
                <div class="column is-6">

                    <div class="field">
                        <label class="label has-text-left">{{__('mycare.admission_type')}}</label>
                        <div class="control">
                            <span class="select">
                                <select name="admission_type" disabled>
                                    @foreach($services as $s)
                                        @if ($s->_id == $resident->admission_type)
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
                            <input class="input" type="text" name="first_name" value="{{$resident->NameFirst}}"/>
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
                            <input class="input" type="text" name="last_name" value="{{$resident->NameLast}}"/>
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
                            <input class="input" id="datepicker" name="dob" value="{{$resident->dob}}"/>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label has-text-left">{{__('mycare.gender')}}</label>
                        <div class="control">
                            <span class="select">
                                <select name="gender">
                                @if ($resident->gender == 'male')
                                <option value="male" selected>{{__('mycare.male')}}</option>
                                <option value="female">{{__('mycare.female')}}</option>
                                @else
                                <option value="male">{{__('mycare.male')}}</option>
                                <option value="female" selected>{{__('mycare.female')}}</option>
                                @endif
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
                            <input class="radio" type="radio" name="status_id" value="1" @if($resident->StatusID==1) checked @endif/> {{__('mycare.active')}}
                            <input class="radio" type="radio" name="status_id" value="0" @if($resident->StatusID==0) checked @endif/> {{__('mycare.inactive')}}
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
                            <input class="input datepicker" name="photo_taken_date" value="{{$resident->photo_taken_date}}"/>
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

                </div>
            </div>

        </div>  <!--<div id="tab_details" class="tab-container">-->

        <div id="tab_contacts" class="tab-container">

            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{__('mycare.primary_contact')}}
                    </p>
                </header>
                <div class="card-content">    
                    <div class="columns">
                        <div class="column is-6">

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.first_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][first_name]"
                                    @if (isset($resident['contact']['primary']['first_name']))
                                    value="{{$resident['contact']['primary']['first_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.last_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][last_name]"
                                    @if (isset($resident['contact']['primary']['last_name']))
                                    value="{{$resident['contact']['primary']['last_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.address')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][address]" 
                                    @if (isset($resident['contact']['primary']['address']))
                                    value="{{$resident['contact']['primary']['address']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.suburb')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][suburb]" 
                                    @if (isset($resident['contact']['primary']['suburb']))
                                    value="{{$resident['contact']['primary']['suburb']}}"
                                    @endif                        
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.city')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][city]" 
                                    @if (isset($resident['contact']['primary']['city']))
                                    value="{{$resident['contact']['primary']['city']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="column is-6">
                        
                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.postcode')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][postcode]" 
                                    @if (isset($resident['contact']['primary']['postcode']))
                                    value="{{$resident['contact']['primary']['postcode']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_mobile')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][mobile]" 
                                    @if (isset($resident['contact']['primary']['mobile']))
                                    value="{{$resident['contact']['primary']['mobile']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_phone')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][phone]" 
                                    @if (isset($resident['contact']['primary']['phone']))
                                    value="{{$resident['contact']['primary']['phone']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_email')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][email]" 
                                    @if (isset($resident['contact']['primary']['email']))
                                    value="{{$resident['contact']['primary']['email']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.relationship')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[primary][relationship]" 
                                    @if (isset($resident['contact']['primary']['relationship']))
                                    value="{{$resident['contact']['primary']['relationship']}}"
                                    @endif                          
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!--<div class="card-content">-->    
                <footer class="card-footer">
                    <a class="card-footer-item contact-edit-btn">Edit</a>
                </footer>
            </div> <!--<div class="card">-->   

            <br>

            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{__('mycare.secondary_contact')}}
                    </p>
                </header>
                <div class="card-content">    
                    <div class="columns">
                        <div class="column is-6">

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.first_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][first_name]"
                                    @if (isset($resident['contact']['secondary']['first_name']))
                                    value="{{$resident['contact']['secondary']['first_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.last_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][last_name]"
                                    @if (isset($resident['contact']['secondary']['last_name']))
                                    value="{{$resident['contact']['secondary']['last_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.address')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][address]" 
                                    @if (isset($resident['contact']['secondary']['address']))
                                    value="{{$resident['contact']['secondary']['address']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.suburb')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][suburb]" 
                                    @if (isset($resident['contact']['secondary']['suburb']))
                                    value="{{$resident['contact']['secondary']['suburb']}}"
                                    @endif                        
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.city')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][city]" 
                                    @if (isset($resident['contact']['secondary']['city']))
                                    value="{{$resident['contact']['secondary']['city']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="column is-6">
                        
                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.postcode')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][postcode]" 
                                    @if (isset($resident['contact']['secondary']['postcode']))
                                    value="{{$resident['contact']['secondary']['postcode']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_mobile')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][mobile]" 
                                    @if (isset($resident['contact']['secondary']['mobile']))
                                    value="{{$resident['contact']['secondary']['mobile']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_phone')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][phone]" 
                                    @if (isset($resident['contact']['secondary']['phone']))
                                    value="{{$resident['contact']['secondary']['phone']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_email')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][email]" 
                                    @if (isset($resident['contact']['secondary']['email']))
                                    value="{{$resident['contact']['secondary']['email']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.relationship')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[secondary][relationship]" 
                                    @if (isset($resident['contact']['secondary']['relationship']))
                                    value="{{$resident['contact']['secondary']['relationship']}}"
                                    @endif                          
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!--<div class="card-content">-->    
                <footer class="card-footer">
                    <a class="card-footer-item contact-edit-btn">Edit</a>
                </footer>        
            </div> <!--<div class="card">-->   

            <br>

            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{__('mycare.next_of_kin')}}
                    </p>
                </header>
                <div class="card-content">    
                    <div class="columns">
                        <div class="column is-6">

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.first_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][first_name]"
                                    @if (isset($resident['contact']['next_of_kin']['first_name']))
                                    value="{{$resident['contact']['next_of_kin']['first_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.last_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][last_name]"
                                    @if (isset($resident['contact']['next_of_kin']['last_name']))
                                    value="{{$resident['contact']['next_of_kin']['last_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.address')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][address]" 
                                    @if (isset($resident['contact']['next_of_kin']['address']))
                                    value="{{$resident['contact']['next_of_kin']['address']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.suburb')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][suburb]" 
                                    @if (isset($resident['contact']['next_of_kin']['suburb']))
                                    value="{{$resident['contact']['next_of_kin']['suburb']}}"
                                    @endif                        
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.city')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][city]" 
                                    @if (isset($resident['contact']['next_of_kin']['city']))
                                    value="{{$resident['contact']['next_of_kin']['city']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="column is-6">
                        
                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.postcode')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][postcode]" 
                                    @if (isset($resident['contact']['next_of_kin']['postcode']))
                                    value="{{$resident['contact']['next_of_kin']['postcode']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_mobile')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][mobile]" 
                                    @if (isset($resident['contact']['next_of_kin']['mobile']))
                                    value="{{$resident['contact']['next_of_kin']['mobile']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_phone')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][phone]" 
                                    @if (isset($resident['contact']['next_of_kin']['phone']))
                                    value="{{$resident['contact']['next_of_kin']['phone']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_email')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][email]" 
                                    @if (isset($resident['contact']['next_of_kin']['email']))
                                    value="{{$resident['contact']['next_of_kin']['email']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.relationship')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[next_of_kin][relationship]" 
                                    @if (isset($resident['contact']['next_of_kin']['relationship']))
                                    value="{{$resident['contact']['next_of_kin']['relationship']}}"
                                    @endif                          
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!--<div class="card-content">-->    
                <footer class="card-footer">
                    <a class="card-footer-item contact-edit-btn">Edit</a>
                </footer>        
            </div> <!--<div class="card">-->   

            <br>

            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{__('mycare.power_of_attorney')}}
                    </p>
                </header>
                <div class="card-content">    
                    <div class="columns">
                        <div class="column is-6">

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.first_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][first_name]"
                                    @if (isset($resident['contact']['power_of_attorney']['first_name']))
                                    value="{{$resident['contact']['power_of_attorney']['first_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.last_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][last_name]"
                                    @if (isset($resident['contact']['power_of_attorney']['last_name']))
                                    value="{{$resident['contact']['power_of_attorney']['last_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.address')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][address]" 
                                    @if (isset($resident['contact']['power_of_attorney']['address']))
                                    value="{{$resident['contact']['power_of_attorney']['address']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.suburb')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][suburb]" 
                                    @if (isset($resident['contact']['power_of_attorney']['suburb']))
                                    value="{{$resident['contact']['power_of_attorney']['suburb']}}"
                                    @endif                        
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.city')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][city]" 
                                    @if (isset($resident['contact']['power_of_attorney']['city']))
                                    value="{{$resident['contact']['power_of_attorney']['city']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="column is-6">
                        
                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.postcode')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][postcode]" 
                                    @if (isset($resident['contact']['power_of_attorney']['postcode']))
                                    value="{{$resident['contact']['power_of_attorney']['postcode']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_mobile')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][mobile]" 
                                    @if (isset($resident['contact']['power_of_attorney']['mobile']))
                                    value="{{$resident['contact']['power_of_attorney']['mobile']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_phone')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][phone]" 
                                    @if (isset($resident['contact']['power_of_attorney']['phone']))
                                    value="{{$resident['contact']['power_of_attorney']['phone']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_email')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][email]" 
                                    @if (isset($resident['contact']['power_of_attorney']['email']))
                                    value="{{$resident['contact']['power_of_attorney']['email']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.relationship')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[power_of_attorney][relationship]" 
                                    @if (isset($resident['contact']['power_of_attorney']['relationship']))
                                    value="{{$resident['contact']['power_of_attorney']['relationship']}}"
                                    @endif                          
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!--<div class="card-content">-->    
                <footer class="card-footer">
                    <a class="card-footer-item contact-edit-btn">Edit</a>
                </footer>        
            </div> <!--<div class="card">-->   

            <br>
<!--
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        {{__('mycare.gp')}}
                    </p>
                </header>
                <div class="card-content">    
                    <div class="columns">
                        <div class="column is-6">

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.first_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][first_name]"
                                    @if (isset($resident['contact']['gp']['first_name']))
                                    value="{{$resident['contact']['gp']['first_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.last_name')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][last_name]"
                                    @if (isset($resident['contact']['gp']['last_name']))
                                    value="{{$resident['contact']['gp']['last_name']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.address')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][address]" 
                                    @if (isset($resident['contact']['gp']['address']))
                                    value="{{$resident['contact']['gp']['address']}}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.suburb')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][suburb]" 
                                    @if (isset($resident['contact']['gp']['suburb']))
                                    value="{{$resident['contact']['gp']['suburb']}}"
                                    @endif                        
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.city')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][city]" 
                                    @if (isset($resident['contact']['gp']['city']))
                                    value="{{$resident['contact']['gp']['city']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="column is-6">
                        
                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.postcode')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][postcode]" 
                                    @if (isset($resident['contact']['gp']['postcode']))
                                    value="{{$resident['contact']['gp']['postcode']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_mobile')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][mobile]" 
                                    @if (isset($resident['contact']['gp']['mobile']))
                                    value="{{$resident['contact']['gp']['mobile']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_phone')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][phone]" 
                                    @if (isset($resident['contact']['gp']['phone']))
                                    value="{{$resident['contact']['gp']['phone']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.contact_email')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][email]" 
                                    @if (isset($resident['contact']['gp']['email']))
                                    value="{{$resident['contact']['gp']['email']}}"
                                    @endif  
                                    />
                                </div>
                            </div>

                            <div class="field">
                                <label class="label has-text-left">{{__('mycare.relationship')}}</label>
                                <div class="control">
                                    <input class="input" type="text" name="contact[gp][relationship]" 
                                    @if (isset($resident['contact']['gp']['relationship']))
                                    value="{{$resident['contact']['gp']['relationship']}}"
                                    @endif                          
                                    />
                                </div>
                            </div>

                        </div>
                    </div>
                </div> 
                <footer class="card-footer">
                    <a class="card-footer-item contact-edit-btn">Edit</a>
                </footer>        
            </div>                   
-->

            @include ('template.resident_contact', ['title' => __('mycare.gp'),
                                                    'input_name' => 'contact[gp]',
                                                    'contact' => $resident['contact']['gp']
                                                   ])


        </div> <!--<div id="tab_contacts" class="tab-container">-->

        
        <div id="tab_movement" class="tab-container">
            Movement
        </div>

        <div class="columns">
            <div class="column is-6">
                <button class="button is-primary">{{__('mycare.save')}}</button>
            </div>
        </div>

            <input type="hidden" name="residentId" value="{{$resident->_id}}"/>

            {{csrf_field()}}
        </form>

    </div> <!--<div class="container">-->
@endsection




<!--Modal for uploading photo.   Must put outside of main content-->
<div class="modal fade" id="upload_modal" style="background-color: rgba(224, 224, 224, 0.5)">
    <button type="button" class="cropper_button button is-primary" data-dismiss="modal">Close</button>
    @include('cropper.cropper_modal')
</div>



@section('script')
    <script>
      $(document).ready(function () {
        // disabe contact input by default 
        $('#tab_contacts input').addClass('is-disabled');  
        $('.contact-edit-btn').click(
          function(event){
            $(this).closest('.card').find('input').removeClass('is-disabled');  
          }
        );  
      });

      function onClickTab(link_id, tab_id){
          var i, x, tablinks;
          x = document.getElementsByClassName("tab-container");
          for (i = 0; i < x.length; i++) {
              x[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tab-link");
          for (i = 0; i < x.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" is-active", "");
          }
          document.getElementById(tab_id).style.display = "block";
          document.getElementById(link_id).className += " is-active";
      }

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


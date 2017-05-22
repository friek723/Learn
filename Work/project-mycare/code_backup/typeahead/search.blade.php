@extends('layouts.app')





@section('style')


<style>
#my_input {
  position: relative;  
  width: 100%;
  font-size: 14px;
  color: #2c3e50;
  line-height: 1.42857143;
  box-shadow: inset 0 1px 4px rgba(0,0,0,.4);
  -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  font-weight: 300;
  padding: 12px 26px;
  border: none;
  letter-spacing: 1px;
  box-sizing: border-box;
    
}
</style>
@endsection


@section('content')
<div class="pagehead-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-title">{{ __('mycare.search_resident') }} {{$facility->FacilityName}}</h1>
                        </div>
                    </div>
                </div>
</div>
<div class="dashboard-section bg-light">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							{{--<form method="post" action="{{url('/resident/browse')}}">--}}
								{{--{{csrf_field()}}--}}
								{{--<div class="field">--}}
									{{--<p class="control">--}}
										{{--<input class="input is-large" type="text" name="name" placeholder="{{__('mycare.enter_user_name')}}">--}}
									{{--</p>--}}
								{{--</div>--}}
							{{--</form>--}}

							<div>
								<typeahead id="my_typeahead" src_url="/resident/findahead" clickaction='fillinput'>
								    
								</typeahead>
								<input type="text" id="my_input" style="display: none" onclick="onClickMyInput()"/>	
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="content">
								<h2>{{trans_choice('mycare.task',2)}}</h2>
							</div>
							<div class="box">
								@foreach($tasks as $task)
									<div class="media">
										<div class="media-left">
											<div class="content">
												<p>{{$task->DueDate}}<br/>
													{{$task->DueTime}}
												</p>
											</div>
										</div>
										<div class="media-content">
											<div class="content">
												<p><a href="{{url('task/action/'.$task->_id)}}">{{$task->Title}} {{__('mycare.for')}} {{$task->Resident['ResidentName']}}</a>
												</p>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>

						<div class="col-md-6">
							<div class="content">
								<h2>{{__('mycare.whats_happening')}}</h2>
							</div>
							<div class="box">
								@foreach($activities as $act)
								<div class="media">
									<div class="media-left">
										<div class="content">
											<p>{{$act->updated_at->format('d-M-Y')}}<br/>
												{{$act->updated_at->format('H:i')}}
											</p>
										</div>
									</div>
									<div class="media-content">
										<div class="content">
											<p><a href="{{$act->link}}">{{$act->text}}</a>
											</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>

						</div>
					</div>


				</div>
			</div>
 @endsection

@section('script')
<script>
    function onClickMyInput(){
    	$('#my_input').css({display: "none"});
    	$('#my_typeahead').css({display: "block"});
    }

    function typeaheadCallback(value){
    	console.log("typeaheadCallback");
    	$('#my_input').val(value);
    	$('#my_input').css({display: "block"});
    	$('#my_typeahead').css({display: "none"});
    }
</script>
@endsection
 
@extends('app')
@section('title')
Game | Create
@stop
@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-content">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Portlet-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									2 Columns  Form Layout
								</h3>
							</div>
						</div>
					</div>
					<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="" id="config-form">
						<div class="m-portlet__body">
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label for="example-text-input">
										Code
									</label>
									@if(isset($game) && isset($game['Code']))
										<div class="form-control m-input">{{$game['Code']}}</div>
										<input class="form-control m-input" type="hidden" placeholder="{{ __('Ex: PR1') }}" name="Code" required value="{{$game['Code']}}">
									@else
									   <input class="form-control m-input" type="text" placeholder="{{ __('Code') }}" name="Code" autocomplete="off" required>
									@endif
								</div>
								<div class="col-lg-6">
									<label for="example-text-input">
										Picked no
									</label>
									@if(isset($game) && isset($game['Picked_No']))
										<input class="form-control m-input" type="number" placeholder="{{ __('Picked no') }}" name="Picked_No" autocomplete="off" required value="{{$game['Picked_No']}}">
									@else
									   <input class="form-control m-input" type="number" placeholder="{{ __('Picked no') }}" name="Picked_No" autocomplete="off" required>
									@endif
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label for="example-text-input">
										Collection no
									</label>
									@if(isset($game) && isset($game['Collection_No']))
										<input class="form-control m-input" type="number" placeholder="{{ __('Collection no') }}" name="Collection_No" autocomplete="off" required value="{{$game['Collection_No']}}">
									@else
									   <input class="form-control m-input" type="number" placeholder="{{ __('Collection no') }}" name="Collection_No" autocomplete="off" required>
									@endif

								</div>
								<div class="col-lg-6">
									<label for="example-text-input">
										Name
									</label>
									@if(isset($game) && isset($game['Name']))
										<input class="form-control m-input" type="text" placeholder="{{ __('Name') }}" name="Name" autocomplete="off" required value="{{$game['Name']}}">
									@else
										<input class="form-control m-input" type="text" placeholder="{{ __('Name') }}" name="Name" autocomplete="off" required>
									@endif
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label for="example-text-input">
										Price
									</label>
									@if(isset($game) && isset($game['Price']))
										<input class="form-control m-input" type="number" placeholder="{{ __('Price') }}" name="Price" autocomplete="off" required value="{{$game['Price']}}">
									@else
										<input class="form-control m-input" type="number" placeholder="{{ __('Price') }}" name="Price" autocomplete="off" required>
									@endif
								</div>
								<div class="col-lg-6">
									<label for="example-text-input">
										Image
									</label>
									@if(isset($game) && isset($game['Image']))
										<input class="form-control m-input" type="file" placeholder="{{ __('Image') }}" id="image" name="Image" autocomplete="off" size = '50'" required value="{{$game['Image']}}">
									@else
										<input class="form-control m-input" type="file" placeholder="{{ __('Image') }}" id="image" name="Image" autocomplete="off" size = '50'" required>
									@endif
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label for="example-text-input">
										Color
									</label>
									@if(isset($game) && isset($game['Color']))
										<input class="form-control m-input" type="text" placeholder="{{ __('Color') }}" name="Color" autocomplete="off" required value="{{$game['Color']}}">
									@else
										<input class="form-control m-input" type="text" placeholder="{{ __('Color') }}" name="Color" autocomplete="off" required>
									@endif
								</div>
								<div class="col-lg-6">
									<label for="example-text-input">
										Expire time
									</label>
									@if(isset($game) && isset($game['Expire_Time']))
										<input class="form-control m-input" type="text" placeholder="{{ __('Expire time') }}" name="Expire_Time" autocomplete="off" required value="{{$game['Expire_Time']}}">
									@else
										<input class="form-control m-input" type="text" placeholder="{{ __('Expire time') }}" name="Expire_Time" autocomplete="off" required>
									@endif
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label for="example-text-input">
										Draw time
									</label>
									@if(isset($game) && isset($game['Draw_Time']))
										<input class="form-control m-input" type="text" placeholder="{{ __('Draw time') }}" name="Draw_Time" autocomplete="off" required value="{{$game['Draw_Time']}}">
									@else
									   <input class="form-control m-input" type="text" placeholder="{{ __('Draw time') }}" name="Draw_Time" autocomplete="off" required>
									@endif

								</div>
								<div class="col-lg-6">
									<label for="example-text-input">
										Status
									</label>
									@if(isset($game) && isset($game['Status']))
										<div>
											<span class="m-switch m-switch--icon m-switch--success">
												<label>
									                <input type="checkbox" {{$game['Status'] ? 'checked="checked"' : ''}} name="Status" required="">
									                <span></span>
							                    </label>
							                </span>
							            </div>
									@else
									   <div>
											<span class="m-switch m-switch--icon m-switch--success">
												<label>
									                <input type="checkbox" checked="checked" name="Status" required="">
									                <span></span>
							                    </label>
							                </span>
							            </div>
									@endif
								</div>
							</div>

							<input type="hidden" name="mod" value="update_game">
						</div>
						<div style="clear: both;"></div>
						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions" style="text-align: right;">
								<button type="submit" class="btn btn-success" id="{{isset($game['Code']) ? 'edit' : 'add'}}">
									Submit
								</button>
								<button type="reset" class="btn btn-default">
									Cancel
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
{!!Html::script('app/components/games/jquery-game.js?v='.time())!!}
@stop
@stop

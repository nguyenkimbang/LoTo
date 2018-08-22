@extends('app')
@section('title')
Config | Create
@stop
@section('contents')
<div class="m-portlet m-portlet--tab col-xs-12">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Create Config Form
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right" action="" id="config-form">
		<div class="col-xs-12" style="text-align: center; margin-top: 20px; font-size: 20px;">
			<div class="" id="show-error-config"></div>
		</div>
		<input type="hidden" name="mod" value="update_config">
		<input type="hidden" name="isCreate" value="true">
		<div class="form-group m-form__group">
			<input class="form-control m-input m-input--solid" type="text" placeholder="{{ __('Code (Ex: PR1)') }}" name="Code" >
		</div>
		<div class="form-group m-form__group">
			<textarea class="form-control m-input m-input--solid" placeholder="{{ __('Description') }}" name="Description"></textarea>
		</div>

		<div class="form-group m-form__group">
			<input class="form-control m-input m-input--solid" type="number" placeholder="{{ __('Value (Ex: 0-100)') }}" name="Value" autocomplete="off">
		</div>

		<div class="form-group m-form__group">
			<input class="form-control m-input m-input--solid" type="number" placeholder="{{ __('Type (Ex: 1)') }}" name="Type" autocomplete="off">
		</div>

		<div class="form-group m-form__group">
			<select class="form-control m-input m-input--solid" name="Parent_Code">
				<option value="">Choose parent code...</option>
				@foreach($listParentCode as $key => $parentCode)
				<option value="{{$parentCode}}">{{$parentCode}}</option>
				@endforeach
			</select>
			{{-- <input class="form-control m-input m-input--solid" type="number" placeholder="{{ __('Parent_Code (Ex: 0)') }}" name="Parent_Code" autocomplete="off"> --}}
		</div>

		<div class="form-group m-form__group">
			<input class="form-control m-input m-input--solid" type="text" placeholder="{{ __('Game_Code (Ex: 4x20)') }}" id="image" name="Game_Code" autocomplete="off" size = '50'">
		</div>

		<div class="form-group m-form__group">
			<input class="form-control m-input m-input--solid" type="text" placeholder="{{ __('ETH_Address') }}" name="ETH_Address" autocomplete="off">
		</div>

		<div class="form-group m-form__group">
			<input class="form-control m-input m-input--solid" type="text" placeholder="{{ __('Status (Ex: 0 or 1)') }}" name="Status" autocomplete="off">
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions" style="text-align: right;">
				<button type="submit" class="btn btn-success">
					Submit
				</button>
				<button type="reset" class="btn btn-default">
					Cancel
				</button>
			</div>
		</div>
	</form>
	<!--end::Form-->
</div>
@section('scripts')
{!!Html::script('app/components/configs/jquery-config.js?v='.time())!!}
@stop
@stop

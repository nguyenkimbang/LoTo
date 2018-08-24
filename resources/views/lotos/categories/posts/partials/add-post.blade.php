@extends('app')
@section('title')
Config | Create Setting
@stop
@section('contents')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Create Post Form
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
		<div class="m-portlet__body">
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Title:
				</label>
				<div class="col-lg-6">
					<input type="text" class="form-control m-input" placeholder="Enter Title" name="Title">
				</div>
			</div>
			<div class="form-group m-form__group row">
				<label class="col-lg-2 col-form-label">
					Content
				</label>
				<div class="col-lg-6">

					<textarea class="form-control m-input" name="Content"></textarea>
				</div>
			</div>
			<div class="m-form__group m-form__group--last form-group row">
				<label class="col-lg-2 col-form-label">
					Communication:
				</label>
				<div class="col-lg-6">
					<div class="m-checkbox-list">
						<label class="m-checkbox">
							<input type="checkbox">
							Email
							<span></span>
						</label>
						<label class="m-checkbox">
							<input type="checkbox">
							SMS
							<span></span>
						</label>
						<label class="m-checkbox">
							<input type="checkbox">
							Phone
							<span></span>
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions--solid">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-6">
						<button type="reset" class="btn btn-success">
							Submit
						</button>
						<button type="reset" class="btn btn-secondary">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--end::Form-->
</div>
<div class="m-portlet m-portlet--tab col-xs-12">
{{-- 	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Create System Setting Form
				</h3>
			</div>
		</div>
	</div> --}}
	<!--begin::Form-->
	<div class="" style="width: 50%; margin: 60px auto">
		<div style="text-align: center; font-size: 30px;">
			Create Post Form
		</div>
		<form class="m-form m-form--fit m-form--label-align-right" action="" id="post-form">
			<div class="col-xs-12" style="text-align: center; margin-top: 20px; font-size: 20px;">
				<div class="" id="show-error-config"></div>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input">
					Title
				</label>
				<input class="form-control m-input m-input--air" type="text" placeholder="{{ __('')}}" name="Title" required>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input">
					Content
				</label>
				<textarea class="form-control m-input m-input--air" placeholder="{{ __('') }}" name="Content" required></textarea>
			</div>

			<div class="form-group m-form__group row">
				<label for="example-text-input">
					Category Code
				</label>
				<select class="form-control m-input m-input--air" name="Category_Code" required>
					<option value="0">Choose category...</option>
					@foreach($listCategory as $key => $category)
					<option value="{{$category}}">{{$category}}</option>
					@endforeach
				</select>
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
		<div style="clear: both"></div>
	</div>
	<!--end::Form-->
</div>
@section('scripts')
{!!Html::script('app/components/lotos/categories/posts/jquery-post.js?v='.time())!!}
@stop
@stop

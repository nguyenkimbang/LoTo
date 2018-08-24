@extends('app')
@section('title')
Config | Create
@stop
@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">Create Post Form</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="{{URL::to('/dashboard')}}" class="m-nav__link m-nav__link--icon">
							<i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/post')}}" class="m-nav__link">
							<span class="m-nav__link-text">Post</span>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/post/create')}}" class="m-nav__link">
							<span class="m-nav__link-text">Post & Add</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-content">
			<div class="row">
				<div class="col-lg-12">
					<!--begin::Portlet-->
					<div class="col-lg-4"></div>
					<div class="col-lg-8" style="margin: 0 auto">
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
							<form class="m-form" action="" id="post-form">
								<div class="m-portlet__body">
									<div class="m-form__section m-form__section--first">
										<div class="form-group m-form__group">
										<label class="">
											Title:
										</label>
										@if(isset($post) && isset($post['Title']))
											<input type="text" class="form-control m-input" placeholder="Enter Title" name="Title" value="{{$post['Title']}}" required="">
										@else
											<input type="text" class="form-control m-input" placeholder="Enter Title" name="Title" required="">
										@endif
									</div>
									<div class="form-group m-form__group">
										<label class="">
											Content
										</label>
										@if(isset($post) && isset($post['Content']))
											<textarea class="form-control m-input" name="Content" id="ckediter">{!!$post['Content']!!}</textarea>
										@else
											<textarea class="form-control m-input" name="Content" id="ckediter">{!!$post['Content']!!}</textarea>
										@endif
									</div>
									<div class="form-group m-form__group">
										<label class="">
											Category Code
										</label>
										@if(isset($post) && isset($post['Category_Code']))
											<select class="form-control m-input" name="Category_Code" required>
												@foreach($listCategory as $key => $category)
												<option value="{{$category}}" {{$post['Category_Code'] == $category ? 'selected="selected"' : ''}}>{{$category}}</option>
												@endforeach
											</select>
										@else
											<select class="form-control m-input" name="Category_Code" required>
												<option value="">Choose category...</option>
												@foreach($listCategory as $key => $category)
												<option value="{{$category}}">{{$category}}</option>
												@endforeach
											</select>
										@endif
									</div>

									@if(isset($post) && isset($post['ID']))
									<input type="hidden" name="ID" value="{{$post['ID']}}">
									@endif

									</div>
									<div class="m-portlet__foot m-portlet__foot--fit">
										<div class="m-form__actions" style="text-align: right;">
											<button type="submit" class="btn btn-success" id="{{isset($post['ID']) ? 'edit' : 'add'}}" style="margin-right: 8px">
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
		</div>
	</div>
</div>
@section('scripts')
<script>
    CKEDITOR.editorConfig = function (config) {
        // Define changes to default configuration here. For example:
        config.language = 'vi';
        config.uiColor = '#AADC6E';
        config.width('100%');

    };
    var editor = CKEDITOR.replace( 'ckediter',
		{
			filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
			filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
			filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		});
   CKFinder.setupCKEditor( editor, '/ckfinder/');


    </script>
{!!Html::script('app/components/lotos/categories/posts/jquery-post.js?v='.time())!!}
@stop
@stop

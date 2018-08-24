@extends('app')
@section('title')
@stop
@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">List Post</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="{{URL::to('/dashboard')}}" class="m-nav__link m-nav__link--icon">
							<i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/category')}}" class="m-nav__link">
							<span class="m-nav__link-text">Category</span>
						</a>
					</li>
					<li class="m-nav__separator">-</li>
					<li class="m-nav__item">
						<a href="{{URL::to('/admin/post')}}" class="m-nav__link">
							<span class="m-nav__link-text">List Post</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
							List Post
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<ul class="m-portlet__nav">
							<li class="m-portlet__nav-item">
								<a href="{!!URL::to('/admin/post/create')!!}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
									<span>
										<i class="la la-plus"></i>
										<span>
											Add Post
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="col-md-12 col-xs-12 show-note">
						<div class="" id="show-note"></div>
					</div>
					<div style="clear: both;"></div>
					<div class="m-portlet__body" style='padding-top:0'>
						<div class="m_datatable" id="post-table"></div>
						<!--end: Datatable -->
						<div id="m_datatable_reload"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
{!!Html::script('app/components/lotos/categories/posts/jquery-post-datatable.js?v='.time())!!}
{!!Html::script('app/components/lotos/categories/posts/jquery-post.js?v='.time())!!}
@stop
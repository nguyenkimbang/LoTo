@extends('app')
@section('title')
Game List Admin
@stop

@section('contents')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<!-- <div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="">
					User Manager
				</h3>
			</div>
		</div>
	</div> -->
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							List Games
						</h3>
					</div>
				</div>
				{{-- <div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="{!!URL::to('/admin/user/create')!!}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>
										Add User
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div> --}}
			</div>
			<div class="m-portlet__body">
				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
					<thead>
						<tr>
							<th>
								ID
							</th>
							<th>
								Name
							</th>
							<th>
								Price
							</th>
							<th>
								Code
							</th>
							<th>
								Color
							</th>
							<th>
								Picked_No
							</th>
							<th>
								Collection_No
							</th>
							<th>
								Expire_Time
							</th>
							<th>
								Draw_Time
							</th>
							<th>
								Image
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listGame as $game)
						<tr>
							<td>
								{{$game['ID']}}
							</td>
							<td>
								{{$game['Name']}}
							</td>
							<td>
								{{$game['Price']}}
							</td>
							<td>
								{{$game['Code']}}
							</td>
							<td>
								{{$game['Color']}}
							</td>
							<td>
								{{$game['Picked_No']}}
							</td>
							<td>
								{{$game['Collection_No']}}
							</td>
							<td>
								{{$game['Expire_Time']}}
							</td>
							<td>
								{{$game['Draw_Time']}}
							</td>
							<td>
								{{$game['Image']}}
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

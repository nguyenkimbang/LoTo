@extends('app')
@section('title')
@stop
@section('contents')

@stop
@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$.get(window.baseUrl + "/admin/category/post/get-data/" + 'T01', function(data, status){
	        console.log("Data: " + data + "\nStatus: " + status);
	    });
	});
</script>
@stop

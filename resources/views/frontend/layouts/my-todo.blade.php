<!DOCTYPE html>
<html>
<head>
	<title>my todo</title>
	<style type="text/css">
		.container{
			width: 100%;
			margin:0 auto;
			height: 100%;
			margin-left: 50px;
			margin-right: 50px;
		}
		.row{
			width: 50%;
			height:50%;
			position: relative;
			margin-top: 10px;
		}
		.righ_side{
			float: right;
		}
		.relative{
			position: relative;
			margin-right: 0;
		}

	</style>
</head>
<body>
 
 <div class="container"> 
 	<h1> My TODOs! </h1>
 	<div>
 		<a href="{!! url('/add') !!}"> + Add a New Task </a>
 	</div>
 	<div>
 		@foreach( $todos as $todo )
 			<div class="row">
 				<input class="relative" type="checkbox" name="title"  id= "box_{{ $todo->id }}" value="{{ $todo->title }}">
 				<div  id="{{ $todo->id }}"> {{ $todo->title }}  </div>
 				<button onclick="editFunction({{ $todo->id }})" >Edit</button> 
 				
 			 	
 			 	<div class="righ_side">
 			 		<button onclick="saveRecord({{ $todo->id }})" >Save</button>
 			 		<button onclick="deleteRecord({{ $todo->id }})">Delete</button>
 			 	</div>
 			</div>
 		@endforeach
 	</div>
 </div>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
<script type="text/javascript">

var test;
	function editFunction(cl) {
		var val = "hello";
		console.log(val);
		document.getElementById(cl).innerHTML = "<input type='text' id= 'New_"+cl+"'>";
	} 
	function saveRecord(cl) {
		test = document.getElementById('New_'+cl).value;
		// test = $("#New_"+cl).val();
	 		$.ajax({
                url:"{!! URL::to('/edit') !!}/"+cl,
                type: 'PUT',
                data: { test: test
                       
                      },
                success: function(data) {
                   console.log(data);
                }
                
           	});
	}

	function deleteRecord(cl) {
		$.ajax({
            url:"{!! URL::to('/delete') !!}/"+cl,
            type: 'DELETE',
            success: function(respone) {
               console.log(respone);
            }
            
       	});
	}

</script>
</body>
</html>
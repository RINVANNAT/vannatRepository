<form action="{!! url('/add') !!}" method="POST" id="todoform">
	<fieldset>
		<legend>Adding New Todo</legend>
		<p>Title: <input type="text" name="title"></input></p>
		<p>Description: <input type="text" name="description"></input></p>
		<p>Deadline: <input type="date" name="deadline"></input></p>
		<p>Is_Done: <input type="date" id="myDate" name="date" value="2016-02-09"></p>
		<button type="submit" form="todoform" value="Submit">Submit</button>
	</fieldset>
</form>
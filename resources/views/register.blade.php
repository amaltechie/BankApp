<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
</head>
<body>
	<h1 class="title ">Register</h1>
	<form action="/register" method="post">

		{{ csrf_field() }}

		<div class="field">
			<label class="label" for="name">Name</label>
			<div class="control">
				<input class="input" type="text" name="name">
			</div>
		</div>
		<div class="field">
			<label class="label" for="email">Email</label>
			<div class="control">
				<input class="input" type="email" name="email">
			</div>
		</div>
		<div class="field">
			<label class="label" for="password">Password</label>
			<div class="control">
				<input class="input" type="password" name="password">
			</div>
		</div>
		<div class="field">
			<div class="control">
				<button class="button is-link" type="submit">Register</button>
			</div>
		</div>
	</form>
</body>
</html>
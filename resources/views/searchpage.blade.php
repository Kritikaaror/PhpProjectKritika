<!DOCTYPE html>
<html>
<head>
<title>Search functionality</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form action="/search" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search products"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		<div class="container">
			@if(isset($details))
			<p> The Search results for your query <b> {{ $query }} </b> are :</p>
			<h2>Product Details</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $product)
					<tr>
						<td><a href="{{ route('product.single', ['id' => $product->id ]) }}">{{$product->name}}</a></td>
						<td>{{$product->description}}</td>
                         <td>{{$product->price}}</td>
                        <td><img src="{{$product->image}}" width="200px" height="200px"></td>
                       
					</tr>
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>

</body>
</html>

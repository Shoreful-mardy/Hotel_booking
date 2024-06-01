<form action="" method="post">
	@csrf
	<table class="table">
		<tr>
			<th>Room Number</th>
			<th>Action</th>
		</tr>

		@foreach($room_numbers as $room_no)
		<tr>
			<td>{{ $room_no->room_type_no }}</td>
			<td><a href="{{ route('assign_room_store',[$booking->id,$room_no->id]) }}" class="btn bg-primary"><i class="lni lni-circle-plus" ></i></a></td>
		</tr>
		@endforeach

		

	</table>
</form>
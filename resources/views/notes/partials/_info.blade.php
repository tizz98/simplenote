<h3>
<a href="{{ route('notes.show', $note->id) }}" class="link">{{ $note->title }}</a>
@if ($note->collection != null)
<a href="{{ route('collections.show', $note->collection->id) }}" class="no-dec">
<span class="label" style="background-color:{{ $note->collection->color }}">{{ $note->collection->name }}</span></a> 
@endif
<a href="{{ route('notes.edit', $note->id) }}" class="no-dec"><i class="fa fa-fw fa-pencil"></i></a> <a href="#" class="no-dec"><i class="fa fa-fw fa-trash-o"></i></a></h3>
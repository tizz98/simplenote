<ul class="list-unstyled">
	<li>
		@if($note->is_public)
		<i class="fa fa-fw fa-users"></i> Public
		@else
		<i class="fa fa-fw fa-user-secret"></i> Private
		@endif
	</li>

	<li>
		<i class="fa fa-fw fa-font"></i>
		{{ str_word_count($note->body_text) }} words
	</li>
</ul>
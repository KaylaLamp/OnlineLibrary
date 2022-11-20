@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<label class="label" for="first_name">First Name</label>
<input class="input" name="first_name" id="first_name" type="text" value="{{ $author->first_name }}" max="50"/>
<label class="label" for="last_name">Last Name</label>
<input class="input" name="last_name" id="last_name" type="text" value="{{ $author->last_name }}" maxlength="50"/>
<div class="button-group">
    <a href="{{ route('books.index') }}" class="button is-primary">Back</a>
    <button type="submit" class="button is-warning">{{ $buttonText }}</button>
</div>

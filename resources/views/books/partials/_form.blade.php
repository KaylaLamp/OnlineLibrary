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
<label class="label" for="name">Book Name</label>
<input class="input" name="name" id="name" type="text" value="{{ $book->name }}"/>
<label class="label" for="authors">Authors</label>
<div class="select is-multiple">
    <select name="authors[]" id="authors" multiple size="9">
        @foreach($authors as $author)
            @if (in_array($author->id, $book->authors->pluck('id')->toArray()))
                <option selected value="{{ $author->id }}">{{ $author->fullName }}</option>
            @else
                <option value="{{ $author->id }}">{{ $author->fullName }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="button-group">
    <a href="{{ route('books.index') }}" class="button is-primary">Back</a>
    <button type="submit" class="button is-warning">{{ $buttonText }}</button>
</div>

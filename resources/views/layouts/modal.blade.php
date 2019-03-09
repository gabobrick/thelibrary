<div class="modal fade" id="exampleModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $book->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ isset($book->user->name) ? 'Do you want to change to available?' : 'Do you want to lend the book?' }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        <form method="POST" action="{{ route('books.status', $book->id) }}">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}

          <button class="btn btn-primary" type="submit">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>
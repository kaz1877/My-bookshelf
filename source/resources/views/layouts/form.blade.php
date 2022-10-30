<form class="mx-auto" action="{{route('book.search')}}" method="GET" class="form-inline">
    @csrf
    <div class="input-group input-group-sm">
        <input type="search" id="search" name="keyword" class="form-control border mt-1" placeholder="本をさがす">
        <div class="input-group-append">
            <button class="btn border bg-white text-teal1 mt-1" type="submit" id="search">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>

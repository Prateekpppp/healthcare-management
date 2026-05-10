
        <form method="GET" action="{{route('app_get.searchItem')}}" class="card p-3 mb-3 row">
            <input type="hidden" name="model" value="{{$model}}">
            <input type="hidden" name="key" value="{{$key ?? 'name'}}">
                <!-- Search -->
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control"
                    placeholder="Search...">
            </div>
            
            <div class="col-md-3 d-none">
                <button type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>
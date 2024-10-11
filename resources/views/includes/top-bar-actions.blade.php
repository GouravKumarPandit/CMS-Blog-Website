<div class="row mt-3">
    <div class="col-12">
        <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle float-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('blog.create') }}" class="dropdown-item text-dark border-bottom py-2"><i class="fas fa-plus"></i> Create Post</a></li>
                <li><a href="{{ route('home.mypost') }}" class="dropdown-item text-dark border-bottom py-2"><i class="fas fa-blog"></i> My Posts</a></li>
                <li><a href="{{ route('category.create') }}" class="dropdown-item text-dark border-bottom py-2"><i class="fas fa-plus"></i> Create Category</a></li>
                <li><a href="{{ route('category.index') }}" class="dropdown-item text-dark border-bottom py-2"><i class="fas fa-list"></i> Categories List</a></li>
                <li>
                    <form action="/logout" method="post">
                        @csrf 
                        <button type="submit" class='dropdown-item'><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
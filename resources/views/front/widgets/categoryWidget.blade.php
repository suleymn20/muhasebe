<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Kategoriler
        </div>
        <div class="list-group">
          @foreach($categories as $category)
            <a href="#" class="list-group-item">{{$category->name}} <span class="badge bg-dark float-end">12</span></a>
          @endforeach
        </div>
    </div>
</div>

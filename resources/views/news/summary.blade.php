<div class="single_stuff wow fadeInDown">
    <div class="single_stuff_img"> <a href="/news/{{ $news->id }}"><img src="{{ asset('storage/' . $news->image) }}" alt=""></a> </div>
    <div class="single_stuff_article">
        <div class="single_sarticle_inner"> 
            
            <div class="stuff_article_inner"> <span class="stuff_date">{{ $news->created_at->format('d M')}} <strong>{{ $news->created_at->format('y')}}</strong></span>
            <h2><a href="/news/{{ $news->id }}">{{ $news->title }}</a></h2>
            @if ($mylist)
            <form id="logout-form-{{ $news->id }}" action="{{ route('news.destroy', $news->id) }}" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn-primary" onclick="return confirm('Are you sure you want to delete this iteam?')">Delete</button>
                            </form>
            @endif
            <p>{{ $news->description }}</p>
            </div>
        </div>
    </div>
</div>
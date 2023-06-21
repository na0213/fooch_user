<div class="breadcrumbs">
    @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb->url && !$loop->last)
            <span><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></span>
            <span> > </span>
        @else
            <span>{{ $breadcrumb->title }}</span>
        @endif
    @endforeach
</div>

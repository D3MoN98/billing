<div class="page-header">
    <h4 class="page-title">{{ucwords(strtolower(Request::segments()[0]))}}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-light-color">Dashboard</a></li>
        <?php $segments = ''; ?>
        @foreach(Request::segments() as $key => $segment)
        <?php $segments .= '/'.$segment; ?>
        <li class="breadcrumb-item">
            <a href="{{ $segments }}" class="text-light-color">{{ucwords(strtolower($segment))}}</a>
        </li>
        @endforeach
    </ol>
</div>

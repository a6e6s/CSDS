<div class="main_nav text-center py-2">
    <div class="main_menu ml-lg-4">
        <ul class="ul_clear d-none d-xl-block">
            <li class="active"><a href="{{ route('home') }}">الرئيسية</a></li>
            {{-- @foreach (App\Models\Page::where('status', 1)->get(['title', 'id', 'alias']) as $page)
                <li><a href="{{ route('page.show', ['page' => $page->id]) . '/' . $page->alias }}">{{ $page->title }}</a></li>
            @endforeach --}}
            <li><a href="{{ route('doctors') }}">الأطباء</a></li>
            <li><a href="{{ route('offers') }}">العروض</a></li>
            @foreach ($menu as $item)
                <li><a href="{{ route('page', $item->id) }}">{{ $item->title }}</a></li>
            @endforeach
            <li><a href="{{ route('contactus') }}">اتصل بنا</a></li>
            <li><a href="{{ route('contactus') }}">حجز موعد</a></li>
        </ul>
        <a href="" class="d-xl-none top_menu_btn"><i class="icofont icofont-navigation-menu"></i></a>

        <div class="clearfix"></div>
    </div>
    <!--end main_menu-->

</div>

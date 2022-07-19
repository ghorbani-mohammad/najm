<ul class="nav side-menu">
    <li>
        <a><i class="fa fa-edit"></i> نشریات <span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            @foreach($publicationTypes as $type => $name)
                <li>
                    <a href="{{route('publication.all', ['type' => $type])}}">
                        {{$name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
    <li>
        <a><i class="fa fa-edit"></i> کتب <span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            @foreach($bookTypes as $type => $name)
                <li>
                    <a href="{{route('book.all', ['type' => $type])}}">
                        {{$name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
    <li>
        <a><i class="fa fa-edit"></i> پروژه‌های تحقیقاتی <span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            @foreach($projectTypes as $type => $name)
                <li>
                    <a href="{{route('project.all', ['type' => $type])}}">
                        {{$name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
    <li>
        <a><i class="fa fa-edit"></i> میز‌های تخصصی <span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            @foreach($mizLanguages as $language)
                <li>
                    <a href="{{route('miz.sessions.all', ['language' => $language->id])}}">
                        {{$language->language}}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
    <li>
        <a><i class="fa fa-edit"></i> بانک پژوهشگران <span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            <li>
                <a href="{{route('all-personnel-list')}}">
                    پژوهشگران موجود
                </a>
            </li>
            <li style="font-size: 10px">
                <a href="{{route('add-personnel-form')}}">
                    اضافه نمودن پژوهشگر جدید
                </a>
            </li>
            <li>
                <a href="{{route('search-personnel-form')}}">
                    جستجوی پژوهشگران
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a><i class="fa fa-edit"></i> آرشیو <span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            <li>
                <a href="{{route('archive.publications')}}">
                    نشریات
                </a>
            </li>
            <li>
                <a href="{{route('archive.books')}}">
                    کتب
                </a>
            </li>
            <li>
                <a href="{{route('archive.miz')}}">
                    میزها
                </a>
            </li>
            <li>
                <a href="{{route('archive.projects')}}">
                    پروژه‌ها
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a><i class="fa fa-edit"></i> گزارش‌ها <span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            <li>
                <a href="{{route('report.products')}}">
                    محصولات
                </a>
            </li>
            <li>
                <a href="{{route('report.personnel')}}">
                    مقایسه پژوهگشران
                </a>
            </li>
            <li>
                <a href="{{route('report.person')}}">
                    فعالیت پژوهشگر
                </a>
            </li>
        </ul>
    </li>

    <li>
        <a><i class="fa fa-edit"></i>مدیریت کاربران<span
                class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
            <li>
                <a href="{{route('report.products')}}">
                    مدیریت کاربران
                </a>
            </li>
        </ul>
    </li>

</ul>


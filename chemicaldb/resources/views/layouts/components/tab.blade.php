    <div class="nav-tabs-custom" style="box-shadow:none;">
        <ul class="nav nav-tabs nav-tabs-responsive">
            @stack(($id ?? null).'_nav')
            {{ $nav ?? null }}
        </ul>
        <div class="tab-content no-padding">
            @stack(($id ?? null).'_content')
            {{ $content ?? null}}
        </div>
    </div>
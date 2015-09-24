<div id="breadcrumbs" class="breadcrumbs">
    <ul class="breadcrumb">
        <li><i class="fa fa-home home-icon"></i> <a href="/">{!! \Config::get('site.home') !!}</a></li>
        @if(isset($breadcrumbs))
        <li class="active"><a href=""> <span class="label label-lg label-purple arrowed-right">{!! $breadcrumbs !!}</span></a></li>
        @endif

    </ul><!-- /.breadcrumb -->

    <!-- searchbox -->
    <div id="nav-search" class="nav-search minimized">
        <form class="form-search">
      <span class="input-icon">
        <input type="text" class="nav-search-input" id="nav-search-input" autocomplete="off" placeholder="Search ..." />
        <i class="ace-icon fa fa-search nav-search-icon"></i>
      </span>
        </form>
    </div>
</div>
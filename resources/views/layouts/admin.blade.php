@extends('layouts.default')

@section('body')
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {!! link_to_route('admin.root', 'Dopusk Admin Panel', [], ['class'=>'navbar-brand']) !!}
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="admin_navbar">
          <ul class="nav navbar-nav">
            <li class="{{ ($nav_page == 'dashboard')? 'active': '' }}">
                {!! link_to_route('admin.dashboard', 'Главная панель') !!}
            </li>
            <li class="{{ ($nav_page == 'ranges')? 'active': '' }}">
                {!! link_to_route('admin.ranges.index', 'Диапазоны') !!}
            </li>
            <li class="{{ ($nav_page == 'qualities')? 'active': '' }}">
                {!! link_to_route('admin.qualities.index', 'Квалитеты') !!}
            </li>
            <li class="{{ ($nav_page == 'fields')? 'active': '' }}">
                {!! link_to_route('admin.fields.index', 'Поля') !!}
            </li>
          </ul>
          <div class="nav navbar-nav navbar-right">
            {!! link_to_route('root', "На сайт", [], ['class'=>'btn btn-default navbar-btn']) !!}
            {!! link_to_route('logout', "Выйти", [], ['class'=>'btn btn-default navbar-btn']) !!}
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        @yield('content')
    </div>
@stop

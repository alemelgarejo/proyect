<div class="sidebar" data-color="blue">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
    <div class="logo">
        <a href="https://github.com/alemelgarejo" target="__blank" class="simple-text logo-mini">
            {{ __('AM') }}
        </a>
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <h6 style="margin-top: 4%">{{ __('Inmodata') }}</h6>
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage=='home' ) active @endif">
                <a href="{{ route('home') }}">
                    <i class="now-ui-icons design_app"></i>
                    <h6 style="margin-top: 4.5%">{{ __('messages.Dashboard') }}</h6>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#adminSection">
                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                    <h6 style="margin-top: 5%">
                        {{ __('messages.Admin Section') }}
                        <b class="caret mt-2"></b>
                    </h6>
                </a>
                <div class="collapse @if (auth()->user()->role_id == 1 or auth()->user()->role_id
                    == 2) show @endif" id="adminSection">
                    <ul class="nav">
                        <li class="@if ($activePage=='users' ) active @endif">
                            <a href="{{ route('user.index') }}">
                                <i class="now-ui-icons users_single-02"></i>
                                <h6 style="margin-top: 5%"> {{ __('messages.Users') }} </h6>
                            </a>
                        </li>

                        <li class="@if ($activePage=='customers' ) active @endif">
                            <a href="{{ route('customers.index') }}">
                                <i class="now-ui-icons users_circle-08"></i>
                                <h6 style="margin-top: 4.5%"> {{ __('messages.Customers') }} </h6>
                            </a>
                        </li>
                        <li class="@if ($activePage=='orders' ) active @endif">
                            <a href="{{ route('orders.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <h6 style="margin-top: 5%"> {{ __('messages.Orders') }} </h6>
                            </a>
                        </li>
                        <li class="@if ($activePage=='owners' ) active @endif">
                            <a href="{{ route('owners.index') }}">
                                <i class="now-ui-icons business_badge"></i>
                                <h6 style="margin-top: 5.5%"> {{ __('messages.Owners') }} </h6>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="@if ($activePage=='my-customers' ) active @endif">
                <a href="{{ route('customers.index2') }}">
                    <i class="now-ui-icons users_circle-08"></i>
                    <h6 style="margin-top: 4.5%"> {{ __('messages.My Customers') }} </h6>
                </a>
            </li>
            <li class="@if ($activePage=='my-customers-orders' ) active @endif">
                <a href="{{ route('orders.index2') }}">
                    <i class="now-ui-icons files_paper"></i>
                    <h6 style="margin-top: 5%"> {{ __('messages.My Orders') }} </h6>
                </a>
            </li>
            <li class="@if ($activePage=='my-owners' ) active @endif">
                <a href="{{ route('owners.index2') }}">
                    <i class="now-ui-icons business_badge"></i>
                    <h6 style="margin-top: 5.5%"> {{ __('messages.My Owners') }} </h6>
                </a>
            </li>
            <li class="@if ($activePage=='estates' ) active @endif">
                <a href="{{ route('estates.index') }}">
                    <i class="now-ui-icons business_bank"></i>
                    <h6 style="margin-top: 6%"> {{ __('messages.Estates') }} </h6>
                </a>
            </li>
            <li class="@if ($activePage=='my-estates' ) active @endif">
                <a href="{{ route('estates.index2') }}">
                    <i class="now-ui-icons business_bank"></i>
                    <h6 style="margin-top: 5%"> {{ __('messages.My Estates') }} </h6>
                </a>
            </li>
            {{-- <li class="@if ($activePage == 'icons') active @endif">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="now-ui-icons education_atom"></i>
                    <h6 style="margin-top: 5%">{{ __('Icons') }}</h6>
                </a>
            </li>
            <li class="@if ($activePage == 'maps') active @endif">
                <a href="{{ route('page.index', 'maps') }}">
                    <i class="now-ui-icons location_map-big"></i>
                    <h6 style="margin-top: 5%">{{ __('Maps') }}</h6>
                </a>
            </li>
             <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
       <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
            <li class="@if ($activePage == 'typography') active @endif">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="now-ui-icons text_caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>

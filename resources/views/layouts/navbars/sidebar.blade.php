<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-mini">
            Honda
        </a>
        <a href="{{route('home')}}" class="simple-text logo-normal">
            {{ env('APP_NAME') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="@if ($activePage == 'credit_application') active @endif">
                <a href="{{ route('credit-applications.index') }}">
                    <i class="now-ui-icons education_paper"></i>
                    <p>{{ __('Credit Application') }}</p>
                </a>
            </li>
            <li class=" @if ($activePage == 'customer') active @endif">
                <a href="{{ route('customers.index') }}">
                    <i class="now-ui-icons emoticons_satisfied"></i>
                    <p>{{ __('Customers') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'staff') active @endif">
                <a href="{{ route('staffs.index') }}">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>{{ __('Staffs') }}</p>
                </a>
            </li>
            <li class=" @if ($activePage == 'sale') active @endif">
                <a href="{{ route('sales.index') }}">
                    <i class="now-ui-icons business_chart-bar-32"></i>
                    <p>{{ __('Sales') }}</p>
                </a>
            </li>
            <li class=" @if ($activePage == 'payment') active @endif">
                <a href="{{ route('payment.index') }}">
                    <i class="fa fa-money-bill-wave"></i>
                    <p>{{ __('Payment') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'product') active @endif">
                <a href="{{ route('products.index') }}">
                    <i class="now-ui-icons transportation_bus-front-12"></i>
                    <p>{{ __('Products') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'overdue') active @endif">
                <a href="{{ route('payment.overdue') }}">
                    <i class="now-ui-icons ui-2_time-alarm"></i>
                    <p>{{ __('Due Payment') }}</p>
                </a>
            </li>
            <li class="@if ($activePage == 'users') active @endif">
                <a href="{{ route('user.index') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p> {{ __("User Management") }} </p>
                </a>
            </li>
            <li class="@if ($activePage == 'settings') active @endif">
                <a href="/settings">
                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                    <p>{{ __('Settings') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>

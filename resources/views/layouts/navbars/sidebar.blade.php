<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="" class="simple-text logo-mini">
      {{ __('BMS') }}
    </a>
    <a href="{{ route('page.index','home') }}" class="simple-text logo-normal">
      {{ __('Business Management System') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
          <i class="now-ui-icons users_single-02"></i>
          <p>
            {{ __("Customer") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExamples">
          <ul class="nav">
            <li class="@if ($activePage == 'customer' ) @endif">
              <a href="{{ route('page.index','customer') }}">
                <i class="now-ui-icons users_circle-08"></i>
                <p> {{ __("Register Customer") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'customerview') @endif">
              <a href="{{ route('page.index','customerview') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("View Customer") }} </p>
              </a>
            </li>
          </ul>
        </div>

        <a data-toggle="collapse" href="#laravelExamples4">
          <i class="now-ui-icons shopping_cart-simple"></i>
          <p>
            {{ __("Sales") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExamples4">
          <ul class="nav">
            <li class="@if ($activePage == 'sales')  @endif">
              <a href="{{ route('page.index','sales') }}">
                <i class="now-ui-icons business_money-coins"></i>
                <p> {{ __("Add Sales") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'viewsales')  @endif">
              <a href="{{ route('page.index','viewsales') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("View Sales") }} </p>
              </a>
            </li>
          </ul>
        </div>

        <a data-toggle="collapse" href="#laravelExamples1">
          <i class="now-ui-icons ui-2_settings-90"></i>
          <p>
            {{ __("Repair Services") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExamples1">
          <ul class="nav">
            <li class="@if ($activePage == 'services')  @endif">
              <a href="{{ route('page.index','services') }}">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p> {{ __("Add Repair Services") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'services')  @endif">
              <a href="{{ route('page.index','viewservice') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("View Repair Services") }} </p>
              </a>
            </li>
          </ul>
        </div>

        <a data-toggle="collapse" href="#laravelExamples2">
          <i class="now-ui-icons tech_laptop"></i>
          <p>
            {{ __("Inventory") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="laravelExamples2">
          <ul class="nav">
            <li class="@if ($activePage == 'inventory')  @endif">
              <a href="{{ route('page.index','inventory') }}">
                <i class="now-ui-icons ui-1_simple-add"></i>
                <p> {{ __("Add Inventory") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'inventoryview')  @endif">
              <a href="{{ route('page.index','inventoryview') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("View Inventory") }} </p>
              </a>
            </li>
          </ul>
        </div>

  <!--    
      <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li> 
      <li class="@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class=" @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class=" @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>
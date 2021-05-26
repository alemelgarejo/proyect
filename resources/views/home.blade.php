@extends('layouts.app', [
'namePage' => __('messages.Dashboard'),
'class' => 'login-page sidebar-mini ',
'activePage' => 'home',
'route' => route('home'),
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
    <div class="panel-header panel-header-lg" style="text-align: center; height:260px;">
        {{-- <canvas id="bigDashboardChart"></canvas> --}}
        <br>
        <h2 style="color: white;">{{ __('messages.Bienvenido') }}, {{ auth()->user()->first_name }}
            {{ auth()->user()->last_name }}</h2>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-sm-2" style="margin-left: 7%">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" style="text-align: center">
                        <p class="card-category">{{ __('messages.Customers') }}</p>
                        <h3 class="card-title">
                            <small>{{ __('messages.My Customers') }}</small>
                        </h3>
                    </div>
                    <div class="card-footer" style="text-align: center">
                        <div class="stats">
                            <a href="{{ route('customers.index2') }}">{{ __('messages.Go to My customers') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" style="text-align: center">
                        <p class="card-category">{{ __('messages.Orders') }}</p>
                        <h3 class="card-title">
                            <small>{{ __('messages.My Orders') }}</small>
                        </h3>
                    </div>
                    <div class="card-footer" style="text-align: center">
                        <div class="stats">
                            <a href="{{ route('orders.index2') }}">{{ __('messages.Go to My orders') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" style="text-align: center">
                        <p class="card-category">{{ __('messages.Owners') }}</p>
                        <h3 class="card-title">
                            <small>{{ __('messages.My Owners') }}</small>
                        </h3>
                    </div>
                    <div class="card-footer" style="text-align: center">
                        <div class="stats">
                            <a href="{{ route('owners.index2') }}">{{ __('messages.Go to My owners') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon" style="text-align: center">
                        <p class="card-category">{{ __('messages.Estates') }}</p>
                        <h3 class="card-title">
                            <small>{{ __('messages.My Estates') }}</small>
                        </h3>
                    </div>
                    <div class="card-footer" style="text-align: center">
                        <div class="stats">
                            <a href="{{ route('estates.index2') }}">{{ __('messages.Go to My estates') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon"
                        style="text-align: center; margin-top:-8.5px;">
                        <h3 class="card-title" style="color: red">{{ count($not_readed) }}
                        </h3>
                        <p class="card-category">{{ __('messages.Unread messages') }}</p>
                    </div>
                    <div class="card-footer" style="text-align: center;">
                        <div class="stats">
                            <a href="{{ route('messages.index') }}">{{ __('messages.Go to My messages') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">{{ __('messages.Global Sales') }}</h5>
                        <h4 class="card-title">{{ __('messages.shipped') }}</h4>
                        <div class="dropdown">
                            <button type="button"
                                class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
                                data-toggle="dropdown">
                                <i class="now-ui-icons loader_gear"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item text-danger" href="#">Remove Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="lineChartExample"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">2018 Sales</h5>
                        <h4 class="card-title">All products</h4>
                        <div class="dropdown">
                            <button type="button"
                                class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
                                data-toggle="dropdown">
                                <i class="now-ui-icons loader_gear"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item text-danger" href="#">Remove Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">Email Statistics</h5>
                        <h4 class="card-title">24 Hours Performance</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="barChartSimpleGradientsNumbers"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card  card-tasks">
                    <div class="card-header ">
                        <h5 class="card-category">Backend development</h5>
                        <h4 class="card-title">Tasks</h4>
                    </div>
                    <div class="card-body ">
                        <div class="table-full-width table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-left">Sign contract for "What are conference organizers
                                            afraid of?"
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title=""
                                                class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                data-original-title="Edit Task">
                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title=""
                                                class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                data-original-title="Remove">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-left">Lines From Great Russian Literature? Or E-mails From
                                            My Boss?
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title=""
                                                class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                data-original-title="Edit Task">
                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title=""
                                                class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                data-original-title="Remove">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-left">Flooded: One year later, assessing what was lost and
                                            what was
                                            found when a ravaging rain swept through metro Detroit
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title=""
                                                class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                data-original-title="Edit Task">
                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title=""
                                                class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                data-original-title="Remove">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-category">{{ __('messages.Last information') }}</h5>
                        <h4 class="card-title">{{ __('messages.Last customers added') }}</h4>
                    </div>
                    <div class="card-body" style="margin-top: -20px">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('messages.Full Name') }}
                                    </th>
                                    <th>
                                        {{ __('messages.Email') }}
                                    </th>
                                    <th>
                                        {{ __('messages.Phone') }}
                                    </th>
                                    <th>
                                        {{ __('messages.DNI') }}
                                    </th>
                                    <th>
                                        {{ __('messages.Created At') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->dni }}</td>
                                            <td>{{ $customer->created_at->diffForHumans() }}</td>
                                            <td><a type="button" href="{{ route('customers.edit', $customer->id) }}"
                                                    rel="tooltip" class="btn btn-success btn-icon btn-sm "
                                                    data-original-title="" title="Edit">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">{{ __('messages.Last estates added') }}</h4>
                    </div>
                    <div class="card-body" style="margin-top: -20px">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        {{ __('messages.Owner') }}
                                    </th>
                                    <th>
                                        {{ __('messages.Address') }}
                                    </th>
                                    <th>
                                        {{ __('messages.City') }}
                                    </th>
                                    <th>
                                        {{ __('messages.Value') }}
                                    </th>
                                    <th>
                                        {{ __('messages.Surface') }}
                                    </th>
                                    <th>
                                        {{ __('messages.Created At') }}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($estates as $estate)
                                        <tr>
                                            <td>{{ $estate->owner->first_name }} {{ $estate->owner->last_name }}</td>
                                            <td>{{ $estate->address }}</td>
                                            <td>{{ $estate->city }}</td>
                                            <td>{{ $estate->value }} €</td>
                                            <td>{{ $estate->surface }} m<sup>2</sup> </td>
                                            <td>{{ $customer->created_at->diffForHumans() }}</td>
                                            <td><a type="button" href="{{ route('estates.edit', $estate->id) }}"
                                                    rel="tooltip" class="btn btn-success btn-icon btn-sm "
                                                    data-original-title="" title="Edit">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });

    </script>
@endpush

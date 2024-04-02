@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Display Data') }}</div>
                <div class="card-body">
                    @unless(count($diamonds) == 0)
                    <div style="overflow-x:auto;">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">cut</th>
                                    <th scope="col">color</th>
                                    <th scope="col">clarity</th>
                                    <th scope="col">carat_weight</th>
                                    <th scope="col">cut_quality</th>
                                    <th scope="col">lab</th>
                                    <th scope="col">symmetry</th>
                                    <th scope="col">polish</th>
                                    <th scope="col">eye_clean</th>
                                    <th scope="col">culet_size</th>
                                    <th scope="col">culet_condition</th>
                                    <th scope="col">depth_percent</th>
                                    <th scope="col">table_percent</th>
                                    <th scope="col">meas_length</th>
                                    <th scope="col">meas_width</th>
                                    <th scope="col">meas_depth</th>
                                    <th scope="col">girdle_min</th>
                                    <th scope="col">girdle_max</th>
                                    <th scope="col">fluor_color</th>
                                    <th scope="col">fluor_intensity</th>
                                    <th scope="col">fancy_color_dominant_color</th>
                                    <th scope="col">fancy_color_secondary_color</th>
                                    <th scope="col">fancy_color_overtone</th>
                                    <th scope="col">fancy_color_intensity</th>
                                    <th scope="col">total_sales_price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div>
                                    @foreach ($diamonds as $row)
                                    <tr>
                                        <td>{{ $row['id'] }}</td>
                                        <td>{{ $row['cut'] }}</td>
                                        <td>{{ $row['color'] }}</td>
                                        <td>{{ $row['clarity'] }}</td>
                                        <td>{{ $row['carat_weight'] }}</td>
                                        <td>{{ $row['cut_quality'] }}</td>
                                        <td>{{ $row['lab'] }}</td>
                                        <td>{{ $row['symmetry'] }}</td>
                                        <td>{{ $row['polish'] }}</td>
                                        <td>{{ $row['eye_clean'] }}</td>
                                        <td>{{ $row['culet_size'] }}</td>
                                        <td>{{ $row['culet_condition'] }}</td>
                                        <td>{{ $row['depth_percent'] }}</td>
                                        <td>{{ $row['table_percent'] }}</td>
                                        <td>{{ $row['meas_length'] }}</td>
                                        <td>{{ $row['meas_width'] }}</td>
                                        <td>{{ $row['meas_depth'] }}</td>
                                        <td>{{ $row['girdle_min'] }}</td>
                                        <td>{{ $row['girdle_max'] }}</td>
                                        <td>{{ $row['fluor_color'] }}</td>
                                        <td>{{ $row['fluor_intensity'] }}</td>
                                        <td>{{ $row['fancy_color_dominant_color'] }}</td>
                                        <td>{{ $row['fancy_color_secondary_color'] }}</td>
                                        <td>{{ $row['fancy_color_overtone'] }}</td>
                                        <td>{{ $row['fancy_color_intensity'] }}</td>
                                        <td>{{ $row['total_sales_price'] }}</td>

                                    </tr>
                                    @endforeach
                                </div>

                            </tbody>
                        </table>

                    </div>


                    <ul class="pagination">
                        @if ($diamonds->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&laquo; Previous</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $cargos->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
                        @endif

                        @foreach ($diamonds as $page => $url)
                        @if ($page == $diamonds->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                        @endforeach

                        @if ($diamonds->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $diamonds ->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
                        @else
                        <li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>
                        @endif
                    </ul>

                    <br>
                    <div class="col-md-8 offset-md-4">
                        <a href="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Export') }}
                            </button>
                        </a>

                    </div>
                    <br>
                    <a href="/delete">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </a>
                </div>
                @else
                <p class="text-center">No Diamonds added yet!</p>
                @endunless
            </div>
        </div>
    </div>
</div>
@endsection
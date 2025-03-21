@extends('navbar.navbar')

@section('title')

@section('content')
    <div class="container py-4">
        <h2 class="text-center mb-4">รายงานยอดขาย</h2>

        <!-- ตัวเลือกกรองข้อมูล -->
        <div class="d-flex justify-content-between align-items-center mb-3 w-75 mx-auto">
            <form method="GET" action="{{ route('reports') }}">
                <div class="form-group">
                    <select name="filter" class="form-control text-dark" style="min-width: 145px; background-color:#33fff8;" onchange="this.form.submit()">
                        <option value="daily" {{ $filter == 'daily' ? 'selected' : '' }}>รายวัน</option>
                        <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>รายเดือน</option>
                        <option value="yearly" {{ $filter == 'yearly' ? 'selected' : '' }}>รายปี</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center">
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif

            <!-- ตารางข้อมูล -->
            <div class="w-75">
                <table class="table" style="border: 2px solid #1d1d1d;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #1d1d1d;">ID</th>
                            <th style="border: 1px solid #1d1d1d;">Total Sales</th>
                            <th style="border: 1px solid #1d1d1d;">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td style="border: 1px solid #1d1d1d;">{{ $report->id }}</td>
                                <td style="border: 1px solid #1d1d1d;">{{ $report->total_sales }}</td>
                                <td style="border: 1px solid #1d1d1d;">
                                    @if ($filter == 'daily')
                                        {{ \Carbon\Carbon::parse($report->date)->format('d-m-Y') }}
                                    @elseif ($filter == 'monthly')
                                        {{ \Carbon\Carbon::parse($report->year.'-'.$report->month.'-01')->format('m-Y') }}
                                    @else
                                        {{ $report->year }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
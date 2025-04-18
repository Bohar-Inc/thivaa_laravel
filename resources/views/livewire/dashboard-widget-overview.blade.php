<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-stats-card title="Total Students" tooltip="Showing number of all active students" value="{{ $totalStudents }}" percentage="" />
        @if (auth()->user()->role == 'admin')
            <x-stats-card title="Total Users" tooltip="Showing number of all active Users" value="{{ $totalUsers }}" percentage="" />
            <x-stats-card title="Total Teachers" tooltip="Showing number of all active Teachers" value="{{ $totalTeachers }}" percentage="" />
        @endif
        <x-stats-card title="Attendance Today" tooltip="" value="{{ $attendanceToday }}" percentage="" />
        <x-stats-card title="Present Today" tooltip="" value="{{ $presentToday }}" percentage="" />
        <x-stats-card title="Absent Today" tooltip="" value="{{ $absentToday }}" percentage="" />
        <x-stats-card title="Weekly Attendance Rate" tooltip="" value="{{ $weeklyAttendanceRate }}" percentage="{{ $weeklyAttendanceRate }}" />
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chart for Monthly Attendance -->
    <div class="bg-white p-6 mt-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold mb-4 text-black">Monthly Attendance Trends</h3>
        <canvas id="attendanceChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('attendanceChart').getContext('2d');
            var chartData = @json($monthlyTrends);
            var labels = chartData.map(data => data.day);
            var values = chartData.map(data => data.count);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Attendance Count',
                        data: values,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</div>

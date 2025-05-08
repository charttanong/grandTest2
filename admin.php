<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grand Dragon</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">Grand Dragon</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="email-list.php">
                    <i class="fas fa-calendar fa-2x"></i>
                    <span>Email List</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="staff.php">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                    <span>Staff</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="articleboard.php">
                    <i class="fas fa-archive fa-2x"></i>
                    <span>Article</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Email List</div>


                                            <div id="emailCount" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <ul id="emailList"></ul>



                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">


                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                staff</div>

                                            <div id="staffCount" class="h5 mb-0 font-weight-bold text-gray-800">
                                            </div>


                                            <table id="staffTable">
                                                <thead>
                                                    <tr>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Staff members will be populated here -->
                                                </tbody>
                                            </table>




                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Download
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1</div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-folder fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Article</div>

                                            <div id="article-count" class="h5 mb-0 font-weight-bold text-gray-800">

                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Example HTML to display the data -->





                    <!-- Content Row -->

                    <div class="row">


                        <!-- Device Breakdown -->
                        <div class="col-12 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Device Breakdown</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2 d-flex justify-content-center">
                                        <canvas id="devicePieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Browser Breakdown -->
                        <div class="col-12 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Browser Breakdown</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2 d-flex justify-content-center">
                                        <canvas id="browserPieChart"></canvas>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                    <div class="row">


                        <!-- Total Visits -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Visits</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h4 id="total-visits" class="font-weight-bold text-center">0</h4>
                                </div>
                                <div>
                                    <label for="year-select" style="margin-left: 30px;">Select Year:</label>
                                    <select id="year-select">
                                        <option value="2030">2030</option>
                                        <option value="2029">2029</option>
                                        <option value="2028">2028</option>
                                        <option value="2027">2027</option>
                                        <option value="2026">2026</option>
                                        <option value="2025">2025</option>
                                        <option value="2024">2024</option>
                                        <!-- Add more years as needed -->
                                    </select>
                                </div>


                                <div class="card-body">
                                    <div class="chart-line pt-4 pb-2">
                                        <canvas id="monthlyVisitorsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- Charts -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        // Initialize Monthly Visitors Line Chart
                        const monthlyCtx = document.getElementById('monthlyVisitorsChart').getContext('2d');
                        const monthlyVisitorsChart = new Chart(monthlyCtx, {
                            type: 'line',
                            data: {
                                labels: [
                                    'January', 'February', 'March', 'April', 'May', 'June',
                                    'July', 'August', 'September', 'October', 'November', 'December'
                                ],
                                datasets: [{
                                    label: 'Monthly Visitors',
                                    data: Array(12).fill(0), // Start with empty data
                                    borderColor: '#4e73df',
                                    backgroundColor: 'rgba(78, 115, 223, 0.1)',
                                    tension: 0.3
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: true
                                    }
                                }
                            }
                        });

                        // Initialize Device Pie Chart
                        const deviceCtx = document.getElementById('devicePieChart').getContext('2d');
                        const deviceChart = new Chart(deviceCtx, {
                            type: 'pie',
                            data: {
                                labels: ['Desktop', 'Mobile', 'Tablet'],
                                datasets: [{
                                    label: 'Device Breakdown',
                                    data: [0, 0, 0], // Start with empty data
                                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                                }]
                            }
                        });

                        // Initialize Browser Pie Chart
                        const browserCtx = document.getElementById('browserPieChart').getContext('2d');
                        const browserChart = new Chart(browserCtx, {
                            type: 'pie',
                            data: {
                                labels: ['Chrome', 'Firefox', 'Safari', 'Other'],
                                datasets: [{
                                    label: 'Browser Breakdown',
                                    data: [0, 0, 0, 0], // Start with empty data
                                    backgroundColor: ['#ff0000', '#ff6600', '#3366cc', '#999999'],
                                }]
                            }
                        });

                        // Fetch analytics data
                        async function fetchAnalyticsData(year) {
                            try {
                                const response = await fetch(
                                    `analytics.php?year=${year}`); // Fetch data from PHP API
                                const data = await response.json();

                                console.log('API Response:', data);

                                // Set total visits
                                document.getElementById('total-visits').textContent = data.totalVisits;

                                // Update device pie chart data
                                const devices = data.devices || {};
                                deviceChart.data.datasets[0].data = [
                                    devices.Desktop || 0,
                                    devices.Mobile || 0,
                                    devices.Tablet || 0
                                ];
                                deviceChart.update();

                                // Update browser pie chart data
                                const browsers = data.browsers || {};
                                browserChart.data.datasets[0].data = [
                                    browsers.Chrome || 0,
                                    browsers.Firefox || 0,
                                    browsers.Safari || 0,
                                    browsers.Other || 0
                                ];
                                browserChart.update();

                                // Update monthly visitors chart
                                if (data.monthlyVisitors) {
                                    monthlyVisitorsChart.data.datasets[0].data = data.monthlyVisitors;
                                    monthlyVisitorsChart.update();
                                } else {
                                    console.warn('No monthly visitors data available');
                                }
                            } catch (error) {
                                console.error('Error fetching analytics data:', error);
                            }
                        }

                        // Add event listener for year selection
                        document.addEventListener('DOMContentLoaded', () => {
                            const currentYear = new Date().getFullYear();
                            document.getElementById('year-select').value = currentYear;

                            // Fetch analytics data for the current year on page load
                            fetchAnalyticsData(currentYear);

                            // Add event listener for year dropdown
                            document.getElementById('year-select').addEventListener('change', (event) => {
                                const selectedYear = event.target.value;
                                fetchAnalyticsData(selectedYear); // Fetch data for the selected year
                            });
                        });
                    </script>






                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; www.empireglobal.co.th 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
        window.onload = () => {
            // Fetch emails
            async function fetchEmails() {
                const response = await fetch('fetch_emails.php'); // Fetch emails from PHP
                const emails = await response.json();
                const emailList = document.getElementById('emailList');
                const emailCount = document.getElementById('emailCount');
                emailList.innerHTML = ''; // Clear the list

                // Update the email count
                emailCount.textContent = `${emails.length}`;

                emails.forEach(email => {
                    const listItem = document.createElement('li');
                    listItem.textContent = email; // Add email to the list item

                });
            }

            // Fetch staff data
            async function fetchStaff(group = '') {

                const response = await fetch(`fetch_staff.php${group ? `?group=${group}` : ''}`);

                const staffMembers = await response.json();
                const tbody = document.querySelector('#staffTable tbody');
                const staffCount = document.getElementById('staffCount');
                tbody.innerHTML = ''; // Clear previous rows

                if (staffMembers && Array.isArray(staffMembers)) {
                    staffMembers.forEach(staff => {
                        const row = document.createElement('tr');
                        tbody.appendChild(row);
                    });

                    // Update the staff count after rendering the rows
                    staffCount.textContent = staffMembers.length;
                } else {
                    // If no staff is returned or there's an issue with the data
                    staffCount.textContent = '0';
                }
            }

            // Call the fetch functions when the page is loaded
            fetchEmails();
            fetchStaff();


        };
    </script>


    <script>
        async function fetchTotalArticles(group = '') {
            try {
                // Fetch total articles based on the group filter
                const response = await fetch(`epCount.php?group=${group}`);

                if (!response.ok) throw new Error('Failed to fetch total articles');

                const data = await response.json();

                if (data.error) {
                    console.error(data.error);
                    return;
                }

                // Display the total article count
                const articleCountElement = document.getElementById('article-count');
                articleCountElement.textContent = `${data.totalArticles || 0}`;
            } catch (error) {
                console.error('Error fetching total articles:', error);
            }
        }

        // Load total articles on page load
        document.addEventListener('DOMContentLoaded', () => {
            fetchTotalArticles(); // Fetch without group filter initially
        });

        // Optional: Update total articles when a group is selected
        function onGroupChange(group) {
            fetchTotalArticles(group); // Fetch with group filter
        }
    </script>
</body>

</html>
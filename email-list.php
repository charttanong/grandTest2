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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



    <style>
        #post-editor {
            height: 400px;
            /* Adjust height as needed */
            margin-bottom: 20px;
        }

        .ql-editor img {
            max-width: 100%;
            /* Responsive size */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            /* Subtle shadow */
            margin: 10px 0;
            /* Margin for spacing */
            object-fit: cover;
            /* Cover the area without distortion */
        }

        .export-button {
            background-color: #007bff;
            /* Bootstrap primary color */
            color: white;
            border: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 30px;
            /* Spacing between buttons */
            transition: background-color 0.3s;
        }

        .export-button:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
        }

        .button-container {
            display: flex;
            /* Align buttons horizontally */
            justify-content: flex-end;
            /* Align buttons to the right */
            margin: 0px 0;
            /* Add some margin */
        }

        #emailList {
            list-style: none;
            /* Remove bullet points from the list */
            padding: 0;
            /* Remove padding */
        }

        #emailList li {
            display: flex;
            /* Use flexbox to align items */
            justify-content: space-between;
            /* Space out the email text and delete button */
            align-items: center;
            /* Center items vertically */
            padding: 10px;
            border-bottom: 1px solid #ddd;
            /* Add border between list items */
            margin: 0;
            /* Remove margin to keep list items aligned */
        }

        .delete-button {
            background-color: #ff4d4d;
            /* Red color for delete button */
            color: white;
            /* White text */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            padding: 5px 10px;
            /* Padding for the button */
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }

        .delete-button:hover {
            background-color: #ff1a1a;
            /* Darker red on hover */
        }
    </style>

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
                    <p class="mb-4">
                    </p>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button id="exportTextButton" class="export-button">Export Email List to Text</button>
                            <button id="exportExcelButton" class="export-button">Export Email List to Excel</button>
                        </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Email List A-Z</h6>
                            <p id="emailCount" class="text-muted">Total Emails: 0</p>
                            <!-- This is where the email count will be displayed -->

                        </div>


                        <ul id="emailList"></ul>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>


                        <script>
                            async function fetchEmails() {
                                const response = await fetch('fetch_emails.php'); // Fetch emails from PHP
                                const emails = await response.json();
                                const emailList = document.getElementById('emailList');
                                const emailCount = document.getElementById('emailCount'); // Reference to the email count element

                                emailList.innerHTML = ''; // Clear the list

                                // Update the email count
                                emailCount.textContent = `Total Emails: ${emails.length}`;

                                emails.forEach(email => {
                                    const listItem = document.createElement('li');
                                    listItem.textContent = email;

                                    // Create a delete button
                                    const deleteButton = document.createElement('button');
                                    deleteButton.textContent = 'Delete';
                                    deleteButton.classList.add('delete-button');
                                    deleteButton.onclick = async () => {
                                        await deleteEmail(email);
                                    };

                                    // Create a div to hold the delete button and align it
                                    const buttonContainer = document.createElement('div');
                                    buttonContainer.classList.add('button-container');
                                    buttonContainer.appendChild(deleteButton);

                                    listItem.appendChild(buttonContainer);
                                    emailList.appendChild(listItem);
                                });
                            }



                            async function deleteEmail(email) {
                                const response = await fetch(`delete_email.php?email=${encodeURIComponent(email)}`, {
                                    method: 'DELETE'
                                });

                                if (response.ok) {
                                    fetchEmails(); // Refresh the email list after deletion
                                } else {
                                    const errorData = await response.json();
                                    alert(`Error deleting email: ${errorData.error || 'Unknown error'}`);
                                    console.error('Delete email error:', errorData);
                                }
                            }


                            function exportEmailsToText() {
                                fetch('fetch_emails.php') // Adjust to your PHP endpoint
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Failed to fetch emails');
                                        }
                                        return response.json();
                                    })
                                    .then(emails => {
                                        console.log(emails); // Check the response

                                        if (emails.length === 0) {
                                            alert("No emails available for export.");
                                            return;
                                        }

                                        const emailText = emails.join('\n'); // Join emails with new lines
                                        const blob = new Blob([emailText], { type: 'text/plain' });
                                        const url = URL.createObjectURL(blob);
                                        const a = document.createElement('a');
                                        a.href = url;
                                        a.download = 'email_list.txt';
                                        document.body.appendChild(a);
                                        a.click();
                                        document.body.removeChild(a);
                                        URL.revokeObjectURL(url); // Clean up
                                    })
                                    .catch(error => {
                                        console.error('Error exporting emails to text:', error);
                                    });
                            }


                            function exportEmailsToExcel() {
                                fetch('fetch_emails.php') // Adjust to your PHP endpoint
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Failed to fetch emails');
                                        }
                                        return response.json();
                                    })
                                    .then(emails => {
                                        console.log(emails); // Check the response

                                        if (emails.length === 0) {
                                            alert("No emails available for export.");
                                            return;
                                        }

                                        const workbook = XLSX.utils.book_new();
                                        const worksheetData = emails.map(email => [email]); // Map emails into a 2D array
                                        const worksheet = XLSX.utils.aoa_to_sheet(worksheetData);

                                        XLSX.utils.book_append_sheet(workbook, worksheet, 'Emails');
                                        XLSX.writeFile(workbook, 'email_list.xlsx');
                                    })
                                    .catch(error => {
                                        console.error('Error exporting emails to Excel:', error);
                                    });
                            }

                            // Add event listeners to export buttons
                            document.getElementById('exportTextButton').addEventListener('click',
                                exportEmailsToText);
                            document.getElementById('exportExcelButton').addEventListener('click',
                                exportEmailsToExcel);

                            // Fetch emails on page load
                            window.onload = fetchEmails;
                        </script>
                    </div>






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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>



</body>

</html>
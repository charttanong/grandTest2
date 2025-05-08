<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $thainame = $_POST['thainame'];
    $position = $_POST['position'];
    $facebook = $_POST['facebook'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $group = $_POST['group'];

    $profileImage = $_FILES['profileImage']['name'];
    $lineQRCode = $_FILES['lineQRCode']['name'];

    // File upload paths
    $profileImagePath = 'uploads/' . basename($profileImage);
    $lineQRCodePath = 'uploads/' . basename($lineQRCode);

    // Move files to the uploads directory
    move_uploaded_file($_FILES['profileImage']['tmp_name'], $profileImagePath);
    move_uploaded_file($_FILES['lineQRCode']['tmp_name'], $lineQRCodePath);

    $stmt = $conn->prepare("INSERT INTO staff (name, thainame, position, facebook, phone, email, group_name, profile_image, line_qr_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssss', $name, $thainame, $position, $facebook, $phone, $email, $group, $profileImagePath, $lineQRCodePath);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Staff member added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add staff member']);
    }

    $stmt->close();
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="tel"],
        .form-group input[type="email"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="file"] {
            border: none;
        }

        .image-preview {
            margin-top: 10px;
            width: 100%;
            height: auto;
            max-width: 200px;
            display: none;
            border-radius: 8px;
        }

        .submit-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

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

        .close {
            color: #aaa;
            font-size: 28px;
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }

        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .delete-btn i {
            font-size: 16px;
            /* Adjust icon size here */
            color: rgb(255, 222, 131);
        }

        .team-item {
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        button {
            cursor: pointer;
            padding: 5px 10px;
            border: none;
            background-color: #f44336;
            color: white;
            border-radius: 4px;
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


                
                



                <div class="container">

                    


                    <h1>Add Staff Member</h1>
                    <form id="addStaffForm" enctype="multipart/form-data">

                        <div class="form-group">

                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required placeholder="Enter staff's name"><br>

                        </div>

                        <div class="form-group">

                            <label for="thainame">Thainame:</label>
                            <input type="text" id="thainame" name="thainame" required
                                placeholder="Enter staff's thainame"><br>

                        </div>

                        <div class="form-group">

                            <label for="position">Position:</label>
                            <input type="text" id="position" name="position" required
                                placeholder="Enter staff's position"><br>

                        </div>

                        <div class="form-group">

                            <label for="facebook">Facebook:</label>
                            <input type="text" id="facebook" name="facebook" required
                                placeholder="Enter facebook link"><br>

                        </div>

                        <div class="form-group">

                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" required placeholder="Enter phone number"><br>

                        </div>

                        <div class="form-group">

                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required placeholder="Enter Email"><br>

                        </div>

                        <div class="form-group">

                            <label for="profileImage">Profile Image:</label>
                            <input type="file" id="profileImage" name="profileImage" accept="image/*" required><br>
                            <img id="profile-image-preview" class="image-preview" src="" alt="Image Preview">


                        </div>

                        <div class="form-group">

                            <label for="lineQRCode">Line QR Code:</label>
                            <input type="file" id="lineQRCode" name="lineQRCode" accept="image/*" required><br>
                            <img id="line-qr-preview" class="image-preview" src="" alt="Line QR Preview">


                        </div>

                        <div class="form-group">

                            <label for="group">Group:</label>
                            <select id="group" name="group" required>
                                <option value="">Select Group</option>
                                <option value="NVOCC Consolidation">NVOCC Consolidation</option>
                                <option value="Customs Clearance">Customs Clearance</option>
                                <option value="LCL">LCL (Less than Container Load)</option>
                                <option value="FCL">FCL (Full Container Load)</option>
                                <option value="Inland Transportation">Inland Transportation</option>
                                <option value="International Freight Forwarding">International Freight Forwarding
                                </option>
                                <option value="Door to Door Service">Door to Door Service</option>
                                <option value="Industrial Packaging and Removal">Industrial Packaging and Removal
                                </option>
                                <option value="Project Handling and Marine Insurance">Project Handling and Marine
                                    Insurance</option>
                                <option value="Cross Border">Cross Border</option>
                                <option value="Air Freight">Air Freight</option>
                            </select>
                        </div>


                        <button type="submit">Add Staff</button>
                    </form>
                </div>

                <button onclick="window.location.href='service.html';" 
                        style="background-color: green; color: white; 
                            margin: 20px auto; 
                            padding: 10px 20px; max-width: 200px; 
                            display: block;">
                    View Service 
                </button>

                

                <div class="container-xxl py-5">
                    <div class="container py-5">

                        
                        <h1>Staff List</h1>
                        <p>Total Staff: <span id="staffCount">0</span></p>

                        


                        <label for="groupFilter">Filter by Group:</label>
                        <select id="groupFilter">
                            <option value="">All Groups</option>
                            <option value="NVOCC Consolidation">NVOCC Consolidation</option>
                            <option value="Customs Clearance">Customs Clearance</option>
                            <option value="LCL">LCL (Less than Container Load)</option>
                            <option value="FCL">FCL (Full Container Load)</option>
                            <option value="Inland Transportation">Inland Transportation</option>
                            <option value="International Freight Forwarding">International Freight Forwarding</option>
                            <option value="Door to Door Service">Door to Door Service</option>
                            <option value="Industrial Packaging and Removal">Industrial Packaging and Removal</option>
                            <option value="Project Handling and Marine Insurance">Project Handling and Marine Insurance
                            </option>
                            <option value="Cross Border">Cross Border</option>
                            <option value="Air Freight">Air Freight</option>
                        </select>

                        <table id="staffTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Thainame</th>

                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Group</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Staff members will be populated here -->
                            </tbody>
                        </table>

                    </div>
                </div>

                <script>
                    // Fetch staff data based on the selected group or fetch all if no group is specified
                    async function fetchStaff(group = '') {
                        const response = await fetch(`fetch_staff.php${group ? `?group=${group}` : ''}`);
                        const staffMembers = await response.json();

                        const tbody = document.querySelector('#staffTable tbody');
                        const staffCount = document.getElementById('staffCount');

                        tbody.innerHTML = '';
                        staffMembers.forEach(staff => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${staff.name}</td>
                                <td>${staff.thainame}</td>
                                <td>${staff.position}</td>
                                <td>${staff.phone}</td>
                                <td>${staff.email}</td>
                                <td>${staff.group_name}</td>
                                <td>
                                    <button onclick="deleteStaff(${staff.id})">Delete</button>
                                </td>
                            `;
                            tbody.appendChild(row);
                        });

                        staffCount.textContent = staffMembers.length;
                    }

                    // Function to delete staff member
                    async function deleteStaff(id) {
                        const response = await fetch(`delete_staff.php`, {
                            method: 'DELETE',
                            body: new URLSearchParams({ id })
                        });

                        const result = await response.json();

                        if (result.status === 'success') {
                            alert(result.message);
                            fetchStaff();
                        } else {
                            alert(result.message);
                        }
                    }


                    // Handle group filtering
                    document.getElementById('groupFilter').addEventListener('change', function () {
                        const selectedGroup = this.value;
                        fetchStaff(selectedGroup); // Fetch staff based on selected group
                    });

                    // Fetch staff data when the page loads
                    window.onload = () => fetchStaff(); // Fetch all staff on initial load
                </script>








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
     </div>

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




        <script>
            // Preview the uploaded profile image
            // Preview the uploaded profile image
            const profileImageInput = document.getElementById('profileImage');
            const profileImagePreview = document.getElementById('profile-image-preview');

            profileImageInput.addEventListener('change', () => {
                const file = profileImageInput.files[0];
                if (file && file.type.startsWith('image/')) { // Ensure the file is an image
                    const reader = new FileReader();
                    reader.onload = () => {
                        profileImagePreview.src = reader.result;
                        profileImagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Please select a valid image file.');
                }
            });

            // Preview the uploaded Line QR Code
            const lineQrInput = document.getElementById('lineQRCode');
            const lineQrPreview = document.getElementById('line-qr-preview');

            lineQrInput.addEventListener('change', () => {
                const file = lineQrInput.files[0];
                if (file && file.type.startsWith('image/')) { // Ensure the file is an image
                    const reader = new FileReader();
                    reader.onload = () => {
                        lineQrPreview.src = reader.result;
                        lineQrPreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Please select a valid image file.');
                }
            });

            // Handle form submission
            document.getElementById('addStaffForm').addEventListener('submit', async function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                const response = await fetch('add_staff.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === 'success') {
                    alert(result.message);
                    this.reset();
                    
                    // Reload the page after a successful submission
                    location.reload();
                } else {
                    alert(result.message);
                }
            });



            document.querySelectorAll('.delete-staff-btn').forEach(button => {
                button.addEventListener('click', (event) => {
                    const staffName = event.target.closest('.delete-staff-btn').dataset.staff;
                    const confirmDelete = confirm(`Are you sure you want to delete ${staffName}?`);

                    if (confirmDelete) {
                        // Remove the entire staff card
                        const staffCard = event.target.closest('.team-item');
                        staffCard.remove();
                    }
                });

                function deleteStaff(staffId) {
                    const staffElement = document.getElementById(staffId);
                    if (staffElement) {
                        staffElement.remove(); // Remove staff card from DOM
                    }
                }
            });
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            // Initialize Quill editor
            const quill = new Quill('#post-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['image', 'code-block'],
                        [{
                            'align': []
                        }],
                        ['clean']
                    ]
                }
            });

            // Custom image handler
            const toolbar = quill.getModule('toolbar');
            toolbar.addHandler('image', () => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();

                input.onchange = () => {
                    const file = input.files[0];
                    const reader = new FileReader();

                    reader.onloadend = () => {
                        const img = new Image();
                        img.src = reader.result;

                        // Create a temporary image element to preview
                        const previewContainer = document.createElement('div');
                        previewContainer.style.position = 'relative';
                        const previewImage = document.createElement('img');
                        previewImage.src = img.src;
                        previewImage.style.maxWidth = '100%';
                        previewImage.style.height = 'auto';
                        previewImage.style.borderRadius = '8px';
                        previewImage.style.margin = '10px 0';
                        previewImage.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.2)';
                        previewContainer.appendChild(previewImage);
                        document.body.appendChild(
                            previewContainer); // Append to body for temporary preview

                        img.onload = () => {
                            const MAX_WIDTH = 800; // Maximum width in pixels
                            const MAX_HEIGHT = 600; // Maximum height in pixels
                            let width = img.width;
                            let height = img.height;

                            // Calculate new dimensions while maintaining aspect ratio
                            if (width > MAX_WIDTH) {
                                height *= MAX_WIDTH / width;
                                width = MAX_WIDTH;
                            }
                            if (height > MAX_HEIGHT) {
                                width *= MAX_HEIGHT / height;
                                height = MAX_HEIGHT;
                            }

                            // Create a canvas to draw the resized image
                            const canvas = document.createElement('canvas');
                            canvas.width = width;
                            canvas.height = height;
                            const ctx = canvas.getContext('2d');
                            ctx.drawImage(img, 0, 0, width, height);

                            // Convert the canvas back to a base64 string
                            const resizedImage = canvas.toDataURL(file.type);
                            quill.insertEmbed(quill.getSelection().index, 'image', resizedImage);

                            // Remove preview after insertion
                            document.body.removeChild(previewContainer);
                        };
                    };

                    reader.readAsDataURL(file);
                };
            });

            // Handle save button click
            document.getElementById('save-post').addEventListener('click', () => {
                const postContent = quill.root.innerHTML;
                console.log(postContent); // Log the content for now
                // You can later implement the fetch request to your backend here
            });
        </script>




        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

</body>

</html>
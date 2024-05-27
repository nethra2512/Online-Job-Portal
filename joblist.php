<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings - Job Portal</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <h1 class="title">Job Listings</h1>
    </header>
    <main>
        <div class="background-container">
            <div class="container">
                <div class="form-container">
                    <h2>Filter Job Listings</h2>
                    <form method="post">
                        <label for="domain" class="form-label">Select Domain:</label>
                        <select name="domain" id="domain" class="form-select">
                            <option value="IT">IT</option>
                            <option value="Finance">Finance</option>
                            <option value="Web Development">Web Development</option>
                            
                        </select>
                        <label for="tenure" class="form-label">Select Tenure:</label>
                        <select name="tenure" id="tenure" class="form-select">
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Contract">Contract</option>
                            
                        </select>
                        <button type="submit" value="submit" name="submit" class="form-submit">Filter</button>
                    </form>
                </div>
                <?php
                
                $conn = new mysqli("localhost", "root", " ", "jobport");

                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                
                if(isset($_POST['submit'])) {
                   
                    $domain = $_POST['domain'];
                    $tenure = $_POST['tenure'];

                    
                    $stmt = $conn->prepare("SELECT title, description, company FROM joblisting WHERE domain = ? AND tenure = ?");
                    $stmt->bind_param("ss", $domain, $tenure);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='job-listing'>";
                            echo "<p class='job-title'>" . $row['title'] . "</p>";
                            echo "<p class='company-name'>" . $row['company'] . "</p>";
                            echo "<p class='job-description'>" . $row['description'] . "</p>";
                            echo "<button onclick='applyNow()' class='apply-now-button'>Apply Now</button>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='no-job-listings'>No job listings found for the selected criteria.</p>";
                    }

                   
                    $stmt->close();
                } else {
                    echo "<p class='select-criteria'>Please select both domain and tenure to filter job listings.</p>";
                }
                $conn->close();
                ?>
                <script>
                    function applyNow() {
                        window.location.href = "apply.html";
                    }
                </script>
            </div>
        </div>
    </main>
</body>
</html>

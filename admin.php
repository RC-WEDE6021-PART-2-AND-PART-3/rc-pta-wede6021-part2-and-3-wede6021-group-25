<?php
session_start();
include 'DBConn.php';

// PROTECT ADMIN PAGE
if(!isset($_SESSION['admin'])){
    header("Location: adminLogin.php");
    exit();
}

// VERIFY USER
if(isset($_GET['verify'])){
    $id = $_GET['verify'];
    $conn->query("UPDATE tblUser SET isVerified=1 WHERE userID=$id");
}
// ADD USER
if (isset($_GET['ADD'])) {
    $conn->query("INSERT INTO tblUser(name,email,password,isVerified) 
    VALUES('New User','new@gmail.com', '123')");
}

// DELETE USER
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tblUser WHERE userID=$id");
}

// UPDATE USER (SIMPLE VERSION)
if(isset($_GET['update'])){
    $id = $_GET['update'];
    $conn->query("UPDATE tblUser SET name='Updated User' WHERE userID=$id");
}

// FETCH USERS
$result = $conn->query("SELECT * FROM tblUser");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel | Pastimes</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<style>
.table-container {
    width: 90%;
    margin: 40px auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 15px;
    overflow: hidden;
}

th {
    background: #A084CA;
    color: white;
    padding: 15px;
}

td {
    padding: 12px;
    text-align: center;
}

tr:nth-child(even) {
    background: #f5f5f5;
}

.btn-small {
    padding: 6px 10px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.verify {
    background: #6BCB77;
    color: white;
}

.delete {
    background: #FF6B6B;
    color: white;
}

.update {
    background: #4D96FF;
    color: white;
}

.status {
    font-weight: bold;
}

.verified {
    color: green;
}

.pending {
    color: orange;
}
</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="table-container">

<h2 style="text-align:center;">Admin Dashboard 💜</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?php echo $row['userID']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>

    <td class="status">
        <?php if($row['isVerified'] == 1): ?>
            <span class="verified">Verified</span>
        <?php else: ?>
            <span class="pending">Pending</span>
        <?php endif; ?>
    </td>

    <td>

        <?php if($row['isVerified'] == 0): ?>
            <a href="?verify=<?php echo $row['userID']; ?>">
                <button class="btn-small verify">Verify</button>
            </a>
        <?php endif; ?>

        <a href="?update=<?php echo $row['userID']; ?>">
            <button class="btn-small update">Update</button>
        </a>

        <a href="?delete=<?php echo $row['userID']; ?>" onclick="return confirm('Delete user?')">
            <button class="btn-small delete">Delete</button>
        </a>
        <a href="?add=1">
            <button class="btn-small update">Add User</button>
        </a>

    </td>
</tr>
<?php endwhile; ?>

</table>

<br>

<div style="text-align:center;">
    <a href="adminLogout.php">
        <button class="btn">Logout</button>
    </a>
</div>

</div>

<footer>
    <p>© 2026 Pastimes | Admin Panel 💜</p>
</footer>

</body>
</html>
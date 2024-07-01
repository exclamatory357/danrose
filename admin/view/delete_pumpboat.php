<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the pumpboat record from the database
    $query = "DELETE FROM pumpboats WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Success message
        $message = "success";
    } else {
        // Error message
        $message = "error";
    }

    $stmt->close();
    $con->close();
} else {
    // Error message
    $message = "error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pumpboats</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if ($message == "success") : ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'The pumpboat has been deleted successfully.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../?manage_pumpboats';
                    }
                });
            <?php else : ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was an error deleting the pumpboat.',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../?manage_pumpboats';
                    }
                });
            <?php endif; ?>
        });
    </script>
</body>
</html>

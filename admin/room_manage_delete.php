<?php
if (isset($_POST['id'])) {
        include("../connect.php");
        $id = intval($_POST['id']);
        $deleteQuery = "DELETE FROM rt_room WHERE id = '$id' LIMIT 1";
        $conn->query($deleteQuery);
        if ($conn->affected_rows == 1) {
            $response['status']  = 'success';
            $response['message'] = 'Product Deleted Successfully ...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
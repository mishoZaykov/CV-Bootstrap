<?php

require_once 'db.php';
require_once 'util.php';
$db = new Database;
$util = new Util;

// Handle Add New User Request
if (isset($_POST['add'])) {
  $username = $util->testInput($_POST['username']);
  $email = $util->testInput($_POST['email']);
  $role = $util->testInput($_POST['role']);

  if ($db->insert($username, $email, $role)) {
    echo $util->showMessage('success', 'User inserted successfully!');
  } else {
    echo $util->showMessage('danger', 'Something went wrong!');
  }
}

// Handle Fetch All Users Request
if (isset($_GET['read'])) {
  $users = $db->read();
  $output = '';
  if ($users) {
    foreach ($users as $row) {
      $output .= '
        <tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['username'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['role'] . '</td>
        <td>
            <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</a>
            <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
        </td>
    </tr>';
    }
    echo $output;
  } else {
    echo '<tr>
          <td colspan="5">No Users Found in the Database!</td>
          </tr>';
  }
}


  // Handle Edit User Request
  if(isset($_GET['edit'])){
    $id = $_GET['id'];

    $user = $db->readOne($id);
    echo json_encode($user);
  }

  // Handle Update User Request
  if(isset($_POST['update'])){
    $id = $util->testInput(($_POST['id']));
    $username = $util->testInput(($_POST['username']));
    $email = $util->testInput(($_POST['email']));
    $role = $util->testInput(($_POST['role']));

    if($db->update($id, $username, $email, $role)){
      echo $util->showMessage('success', 'User updated successfully!');
    }else{
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Delete user Request
  if(isset($_GET['delete'])){
    $id = $_GET['id'];
    if($db->delete($id)){
      echo $util->showMessage('info', 'User deleted successfully!');
    }else{
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }
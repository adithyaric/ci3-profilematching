<html>

<head>
    <style>
        .login {
            margin: 15em auto;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?= $this->session->flashdata('pesan'); ?>
    <form action="<?php echo base_url('auth/aksi_login'); ?>" method="post">
        <table class="login">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="level">
                        <option value="user">Users</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
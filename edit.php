<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM user_form where id='$id'");
while($d = mysqli_fetch_array($data)) {
    ?>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="id" value="<?php echo $d['name']; ?>">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="id" value="<?php echo $d['email']; ?>">
                </td>
            </tr>
        </table>
    </form>
    <?php
}
?>
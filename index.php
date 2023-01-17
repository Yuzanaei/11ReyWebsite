<?php
include 'database_conn.php';
$query = "SELECT * FROM customers limit 200";
$result = mysqli_query($db_connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#home">Home</a></li>
                                        
                                    </ul>
                                  
                                </div><!-- /.navbar-collapse -->
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="float-start mb-4">
                    <h2>List Barang</h2>
                </div>
                <div class ="float-end">
                    <a href="add.php" class="btn btn-success">Tambah Barang Baru</a>
                </div>
                <div class ="float-end">
                    <a href="Ecom.html" class="btn btn-danger">Beranda</a>
                </div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) : ?>
                            <?php while ($customer_data = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <th scope="row"><?php echo $customer_data['customer_id'] ?></th>
                                    <td><?php echo $customer_data['firstname'] ?></td>
                                    <td><?php echo $customer_data['lastname'] ?></td>
                                    <td><?php echo $customer_data['email'] ?></td>
                                    <td><?php $new_date = new DateTime($customer_data['created']);
                                    echo $new_date->format('Y-m-d'); ?></td>
                                    <td>
                                        <a href="edit.php?customer_id=<?php echo $customer_data['customer_id']; ?>" class="btn 
                                        btn-primary">Edit</a>
                                        <a href="delete.php?customer_id=<?php echo $customer_data['customer_id']; ?>" class="btn 
                                        btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" rowspan="1" headers="">Tidak Ada Data Ditemukan!</td>
                            </tr>
                        <?php endif; ?>
                        <?php mysqli_free_result($result); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
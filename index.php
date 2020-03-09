<?php
    $conn = new mysqli('localhost', 'id12777767_keluhan', '123456', 'id12777767_keluhan');

    if(!$conn){
    echo json_encode(['status' => 0, 'msg' => 'Koneksi Error!!!']);
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Keluhan Aset 2D Game Gear Racing</title>
  </head>
  <body>
  <div class="container">
      <div class="head" style="text-align:center;">
          <h1>Keluhan Aset 2D  Game Gear Racing</h1>
      </div>
    <form method='GET'>
      <div class="form-group">
        <label for="nama">Aset 2D</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Aset">
      </div>
      <div class="form-group">
        <label for="keluhan">Keluhan </label>
        <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Masukan Keluhan Anda">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    if (isset ($_GET['nama'])) {
    $url = 'https://wowi.000webhostapp.com/tugas1/koneksi.php?nama='.urlencode($_GET['nama'])."&keluhan=".urlencode($_GET['keluhan']);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    echo "Berhasil Dinputkan";
    curl_close($ch);
    }   
    ?>
    
    
    <table class="table">
        <div class="table-responsive">
        <thead>
          <tr>
            <th>Aset 2D</th>
            <th>Keluhan</th>
            <th>Tanggal</th>
          </tr>
        </thead>
          
            <?php
            $sql = "SELECT * FROM keluhan";
            $result = mysqli_query($conn,$sql);
        
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                <td><?php echo $row['nama'];?></td>
                <td><?php echo $row['keluhan'];?></td>
                <td><?php echo $row['tanggal'];?></td>
                </tr>
                <?php
            }
            } else {
            echo "0 results";
            }
            ?>
          
          </div>
    <table>
  </div>
  </body>
</html>



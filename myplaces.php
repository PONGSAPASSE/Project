
<?php

    session_start();

    if ($_SESSION['Id_manager'] == "") {
        header("location: signin.php");

    } else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
    <title>สถานที่ของฉัน</title>
</head>
<style>
body {
    margin-top: 0px;
    background-image: url('img/img3.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}

</style>
<body>
<style>
    
    @font-face {
    font-family: 'Lily Script One';
    src: url('path_to_font_files/linly-script.woff2') format('woff2'), 
        url('path_to_font_files/linly-script.woff') format('woff');

    }
    
a {
    font-family: 'Lily Script One', cursive; 
}
.navbar-nav {
    flex-grow: 1;
    justify-content: center;
}

.navbar-nav .nav-item {
    margin: 0 20px;
}


.navbar-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar-brand .app-name {
            margin-bottom: -5px;
        }

        .navbar-brand .app-desc {
            font-size: 12px;
        }


</style>



<nav class="navbar navbar-expand-lg navbar-light bg-warning">
<div class="container-fluid">
    <a class="navbar-brand" href="#">
      <span class="app-name">Theaw-kan-mai App</span>
      <span class="app-desc">Location information management application</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="addplaces.php">Add Places</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="myplaces.php">My Places</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Promotion</a>
        </li>
      </ul>
      <form class="d-flex">
        <a class="navbar-brand" href="#">Welcome, <?php echo $_SESSION['username']; ?> </a>
        <a class="btn btn-outline-success" type="submit" href="logout.php">ออกจากระบบ</a>
      </form>
    </div>
  </div>
</nav>

<style>


.container{
    margin-top: 20px;
}



</style>



<?php 
    include_once('functions.php');
    $fetchdataowner = new DB_con();
    $sql = $fetchdataowner->fetchdataowner($_SESSION['Id_manager']);
    while($row = mysqli_fetch_array($sql)) {
      ?>





<div class="container">

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="https://cms.dmpcdn.com/travel/2022/01/26/6220e0f0-7e53-11ec-a887-811810290a51_webp_original.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['name_places']; ?></h5>
        <p class="card-text"><?php echo $row['details_places']; ?></p>
        <p class="card-text"><?php echo $row['contact_places']; ?></p>
      </div>
          <a href="updateplaces.php?id=<?php echo $row['id_places'];?>" class="btn btn-warning">เเก้ไขสถานที่</a>
          <a href="deleteplaces.php?del=<?php echo $row['id_places'];?>" class="btn btn-danger">ลบสถานที่</a>
    </div>
  </div>

</div>

</div>
</body>
</html>
<?php
          }
?>

<?php
    }
?>
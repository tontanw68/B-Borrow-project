<!-- เทส image -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Welcome to CodeIgniter</title>

	
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-dark bg-dark col-md-12" >
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
              </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="container">     
          <div class="row">
            <div class="col-md-3">
              <div class="card py-3 px-3 mt-3">
                <h2 class="text-center" id="fr">menu</h2>
                <div class="d-grid gap-2">
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card py-3 px-5 mt-3">
                <!-- <h1>menu</h1> -->
                <?php echo heading('menu',2);?>
                <form action="<?php echo site_url ('Hello/img_up'); ?>" method="post">
                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">รูปหน้าปก</label>
                    <div class="col-sm-6">
                    <input type="file" class="form-control" id="" name="image" accept="image/*" required>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <!-- <label for="inputName" class="col-sm-2 col-form-label">Type</label> -->
                    <div class="col-sm-10">
                    <input type="submit" value="add">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
</body>
</html>

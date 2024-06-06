<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">PROFILE</h1>

  <div class="row">
    <div class="col-lg-4 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <img src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" alt="Profile Picture">
          <h5 class="card-title"></h5>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div id="notification" class="" role="alert">

      </div>


      <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="email" name="email" readonly>
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Full Name *</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="name" name="name">
        </div>
      </div>

      <div class="form-group row mb-4">
        <label for="image" class="col-sm-3 col-form-label">Change Picture</label>
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file (Max 2MB)</label>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="currentpassword" name="currentpassword" readonly>
        </div>
        <div class="col-sm-3">
          <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-sm btn-danger">Change Password</a>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-9 offset-sm-3">
          <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
      </div>

    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>
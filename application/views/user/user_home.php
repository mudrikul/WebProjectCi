<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-3 shadow-sm" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php if ($userPicture != 'default.jpg') {
                                echo $userPicture;
                            } else {
                                echo base_url('assets/img/') . $userPicture;
                            } ?>" class="card-img img-thumbnail m-2" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $userName ?></h5>
                    <p class="card-text"><?= $userEmail ?></p>
                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $userDateCreated); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
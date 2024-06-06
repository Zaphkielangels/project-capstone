<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>

<section>
    <div class="card">
        <div class="d-flex justify-content-between">
            <a href="<?= base_url('mydashboard/'); ?>">
                <button class="btn btn-dark" type="button">
                    Back
                </button>
            </a>
            <div class="d-flex">
                <a href="<?= base_url('certificate/download/' . $certificate['id']); ?>">
                    <button class="btn btn-success mr-3 mb-3" type="button">Download</button>
                </a>
                <form action="<?= base_url('certificate/delete/' . $certificate['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit" onclick="return confirm ('Do you want to delete this certificate?');">Delete Certificate</button>
                </form>
            </div>
        </div>
        <img src="<?= base_url($certificate['certificate_png']); ?>" class="card-img-top" alt="...">
    </div>
</section>

<?= $this->endSection() ?>
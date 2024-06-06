<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>

<section>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success'); ?>
        </div>
    <?php endif; ?>
    <!-- <?php var_dump(session('name')) ?> -->
    <main>
        <div class="card">
            <a href="<?= base_url('generate'); ?>">
                <span>+</span>
                <p>Mulai Dari Awal</p>
            </a>
        </div>
        <?php foreach ($certificate as $key) : ?>
            <div class="card active">
                <a href="<?= base_url('certificate/' . $key['id']); ?>">
                    <span>&#128452;</span>
                    <p><?= $key['name_certificate']; ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </main>
</section>
<br><br><br><br><br><br><br><br><br>
<?= $this->endSection() ?>
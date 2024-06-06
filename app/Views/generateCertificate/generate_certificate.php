<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<!-- Form -->
<section>
    <h1 class="title">Generate Sertifikat</h1>
    <main>
        <!-- Tampilkan pesan sukses jika ada -->
        <form id="form" action="<?= base_url('/generate/save') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="user-info">
                <div class="input-box">
                    <label for="fullname">Certificate Recipient</label>
                    <input type="text" id="fullname" placeholder="Name of certificate recipient" name="fullname" required>
                </div>
                <div class="input-box">
                    <label for="events">Events</label>
                    <input type="text" id="events" placeholder="Name of events" name="events" required>
                </div>
                <div class="input-box">
                    <label for="nameofsignatory">Name of Signatory</label>
                    <input type="text" id="nameofsignatory" placeholder="Name of Signatory" name="nameofsignatory" required>
                </div>
                <div class="input-box">
                    <label for="signature">Signature</label>
                    <input type="file" id="signature" placeholder="Signature" name="signature" required>
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="input-box">
                <button type="submit">Submit</button>
            </div>
        </form>
    </main>
</section>
<br><br><br><br>
<?= $this->endSection() ?>
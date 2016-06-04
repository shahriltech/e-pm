<?php

/* @var $this yii\web\View */

$this->title = 'e-PM';
?>
<div class="site-index">
    <div class='row'>
        <center>
            <img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/wakaf2.jpg" alt="Chania" >
        </center>
        
    </div>
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <img class="img-responsive" src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/assets/layouts/layout5/img/carta.png" alt="Chania" >
            </div>
            <div class="col-lg-4">
                <h2>Sistem e-PM</h2>

                <p>Sistem e-PM atau di kenali sebagai e-Paperwork Management System di bangunkan untuk ahli jawatankuasa masjid membuat satu kertas kerja 
                    secara atas talian. Kaedah ini adalah seperti sediakala di mana dilakukan secara manual iaitu menggunakan kertas A4 tetapi dengan menggunakan sistem atas talian ini
                    ianya dapat memudahkan proses permohonan ahli jawatankuasa masjid untuk permohonan aktiviti atau program. </p>
            </div>
            <div class="col-lg-4">
                <?php if(Yii::$app->user->identity->role == 2) {?>
                <h2>Panduan</h2>

                <p>Ahli jawatankuasa masjid perlu mengisi borang di halaman kertas kerja untuk proses permohonan. Setelah pihak AJK masjid selesai mengisi borang, pihak AJK perlu 
                    simpan maklumat tersebut dengan menekan butang SIMPAN di halaman "KERTAS KERJA".Ahli jawatankuasa masjid boleh mengemaskini maklumat program sebelum di hantar ke pihak pengurusan.
                    Untuk proses penghantaran kertas kerja ke pihak pengurusan, pemohon perlu menekan butang "KEMASKINI" di halaman "kertas kerja" dan tekan butang "HANTAR" atau "Kemaskini" untuk sekadar mengemaskini maklumat program.
                    Setelah maklumat program di hantar ke pihak pengurusan, pemohon tidak boleh mengemaskini maklumat program dan tidak boleh padam maklumat yang telah di hantar. Pemohon perlu menunggu pengesahan atau kelulusan dari pihak pengurusan masjid dan
                    ianya boleh di lihat di halaman "STATUS". </p>
                <?php }elseif (Yii::$app->user->identity->role == 1) {?>
                <h2>Panduan</h2>
                    <p>Pihak Pengurusan seperti setiausaha,bendahari,timbalan Nazir dan nazir hanya memberi kelulusan program yang telah di mohon oleh ahli jawatankuasa masjid sama ada lulus atau tidak.
                        Proses ini di mulakan oleh setiausaha,bendahari,timbalan nazir dan seterusnya nazir.Kelulusan akan di beri mengikut hierarki pengurusan. Proses kelulusan akan terhenti sekiranya salah seorang dari pihak pengurusan tidak memberi kelulusan program yang telah di mohon oleh ahli jawatankuasa masjid.
                        Pihak pengurusan juga boleh mencetak laporan kertas kerja yang telah di luluskan.</p>
                <?php }?>
            </div>
        </div>

    </div>
</div>

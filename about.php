<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation'); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getAboutResult = api('about'); // Vi henter om os dataer fra om os i api'et

    $getServiceResult = api('service'); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial'); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team'); // Vi henter team dataer fra henter i api'et
    
    $getNewsResult = api('news'); // Vi henter nyheder dataer fra nyheder i api'et

    // usort er en function og her har jeg valgt at sortere efter datoer. Da vi gerne ville have de nyeste oplæg
    usort($getNewsResult, function ($a, $b) {
        return substr($a['received'], 0, 10) > substr($b['received'], 0, 10) ? -1 : 1;
    });

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    echo breadcrumbs(['Forside' => ['link' => './'], 'Om os' => ['link' => NULL]]);

?>

<section class="about-info">
    <div class="container">
        <div class="row g-3">
            <div class="col-12 text-center mb-5">
                <h4><?=$getAboutResult['title'];?></h4>
                <p><?=$getAboutResult['teaser'];?></p>
                <div class="line-mark justify-content-center">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-list">
                    <?=$getAboutResult['content'];?>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="<?=API_URL . '/images/about/1.jpg';?>" width="100%" class="rounded-2" alt="">
            </div>
        </div>
    </div>
</section>

<section class="about-testimonial pb-5 bg-cultured">
    <?php require './inc/components/Testimonial.php';?>
</section>

<section class="about-team py-5 my-5">
    <div class="container">
        <?php require './inc/components/Team.php';?>
    </div>
</section>

<?php require './inc/components/Footer.php'; ?>
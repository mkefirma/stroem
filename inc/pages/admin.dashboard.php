<?php

    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Dashboard' => ['link' => NULL]
        ]
    );

    // session_destroy();

?>

<main class="admin">
    <div class="container-fluid">
        <div class="row justify-content-center g-4">
            <?php require './inc/components/Sidebar.php'; ?>
            <div class="admin-content col-lg-10">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Velkommen til <?=$getUserInformationResult['name'];?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

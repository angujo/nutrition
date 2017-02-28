<div class="row">
    <div class="col-xs-12">
        <h2>News and Events list</h2>
        <hr/>
    </div>
    <div class="col-xs-12 news-events-list">
        <?php
        if ($links) {
            foreach ($links as $link) { ?>
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object" src="<?= $link->thumbnail ?>" alt="<?= $link->publisher; ?>">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= $link->name ?></h4>
                        <ul class="list-inline text-muted">
                            <li><?= $link->organization; ?></li>
                            <li><?= date('F j, Y, g:i a', strtotime($link->dated)); ?></li>
                            <li>By <?= $link->publisher ?></li>
                        </ul>
                        <hr/>
                        <ul class="list-inline">
                            <li><a href="<?= base_url('admin/links/' . $link->id); ?>"><i class="fa fa-edit fa-fw"></i></a></li>
                            <li><a class="text-danger"><i class="fa fa-trash fa-fw"></i></a></li>
                            <li><a target="_blank" href="<?= $link->url ?>">Test Link<sup><i class="fa fa-external-link fa-fw"></i></sup></a></li>
                        </ul>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>
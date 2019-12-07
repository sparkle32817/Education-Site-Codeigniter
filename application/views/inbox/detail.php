
        <div class="col-xlg-10 col-lg-9 col-md-8 border-left">
            <div class="card-body p-t-0">
                <div class="card b-all shadow-none">
                    <div class="card-body">
                        <h3 class="card-title m-b-0"><?= $information['title']; ?></h3>
                    </div>
                    <div>
                        <hr class="m-t-0">
                    </div>
                    <div class="card-body">
                        <div class="d-flex m-b-40">
                            <div>
                                <a href="javascript:void(0)"><img src="<?= $information['avatar']; ?>" alt="user" width="60" class="img-circle" /></a>
                            </div>
                            <div class="p-l-10">
                                <h4 class="m-b-0"><?= $information['name']; ?></h4>
                                <small class="text-muted">From: <?= $information['email']; ?></small>
                            </div>
                        </div>
                        <p><?= $information['message']; ?></p>
                    </div>
                    <div>
                        <hr class="m-t-0">
                    </div>
                    <div class="card-body">
                        <div class="b-all m-t-20 p-20">
                            <p class="p-b-20">Click <a href="javascript:void(0)"><b>here</b></a> to Reply</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
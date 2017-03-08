<div class="row">
    <div class="col-xs-12">
        <h3>Today's Recommendations for your Child<br/>
            <small>Pick any of the foods recommended below for your child. Selection may be based on what has been prepared for the child.</small>
        </h3>
        <hr/>
    </div>
    <div class="col-xs-12">
        <div class="row food-list">
            <?php foreach (range(1, 12) as $food) { ?>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="w3-card-4 food-item">
                        <header class="w3-container w3-light-grey">
                            <h3>Boiled Broccoli and Carrot</h3>
                        </header>
                        <div class="w3-container">
                            <img src="<?= base_url('img/food-101.jpg') ?>" alt="Avatar" class="w3-left w3-circle">
                            <p>Decreases the risk of obesity, diabetes, heart disease and overall mortality while promoting a healthy complexion and hair, increased energy and overall lower weight.
                                Broccoli also contributes to your daily need for calcium, providing 43 milligrams in one cup. </p>
                        </div>
                        <button class="w3-button w3-block w3-dark-grey">Select</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
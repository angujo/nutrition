<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 8:36 PM
 */ ?>
<form class="w3-container">
    <p>
        <label>Name of Food</label>
        <input class="w3-input" required>
    </p>
    <p>
        <label>Serving Measurement</label>
    <div class="w3-row">
        <div class="w3-col s12 m6 w3-padding-small"><input class="w3-input" placeholder="Amount" type="number"></div>
        <div class="w3-col s12 m6 w3-padding-small"><input class="w3-input" placeholder="Unit"></div>
    </div>
    </p>
    <p>
        <label>Brief description</label>
        <textarea class="w3-input" required></textarea>
    </p>
    <p>
    <ul class="w3-ul w3-card-2">
        <?php foreach (range(1, 5) as $nut) { ?>
            <li>
                <span onclick="this.parentElement.style.display='none'"
                      class="w3-closebtn w3-margin-right w3-medium">&times;</span>
                <div class="w3-row">
                    <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" placeholder="Nutrient Name"></div>
                    <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" placeholder="Nutrient Value" type="number"></div>
                    <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" placeholder="Nutrient Unit"></div>
                </div>
            </li>
        <?php } ?>
        <li>
                <span onclick="this.parentElement.style.display='none'"
                      class="w3-closebtn w3-margin-right w3-medium hidden">&times;</span>
            <div class="w3-row">
                <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" placeholder="Nutrient Name"></div>
                <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" placeholder="Nutrient Value" type="number"></div>
                <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" placeholder="Nutrient Unit"></div>
            </div>
        </li>
        <li>
            <div class="horizontal-center">
                <a class="w3-button w3-btn-block">&plus; Add Nutrient</a>
            </div>
        </li>
    </ul>
    </p>
    <hr/>
    <div class="horizontal-flex-end">
        <button type="submit" class="w3-button w3-blue">Save</button>
    </div>
</form>

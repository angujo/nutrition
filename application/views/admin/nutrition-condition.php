<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 8:36 PM
 */ ?>
<form class="w3-container">
    <p>
        <label>Name of Condition</label>
        <input class="w3-input" required>
    </p>
    <fieldset>
        <legend>Condition</legend>
        <label>Age</label>
        <div class="w3-row">
            <div class="w3-col s12 m3 w3-padding-small">
                <select class="w3-input">
                    <option value="2">Above</option>
                    <option value="1">Below</option>
                </select>
            </div>
            <div class="w3-col s12 m9 w3-padding-small">
                <input class="w3-input" placeholder="Age" type="number">
            </div>
        </div>
        <div class="horizontal-center">
            <div class="s12 m3 w3-padding-12">
                <select class="w3-input">
                    <option value="2">AND</option>
                    <option value="1">OR</option>
                </select>
            </div>
        </div>
        <label>Weight</label>
        <div class="w3-row">
            <div class="w3-col s12 m3 w3-padding-small">
                <select class="w3-input">
                    <option value="2">Above</option>
                    <option value="1">Below</option>
                </select>
            </div>
            <div class="w3-col s12 m9 w3-padding-small">
                <input class="w3-input" placeholder="Weight" type="number">
            </div>
        </div>
    </fieldset>
    </p>
    <p>
        <label>Brief description</label>
        <textarea class="w3-input"></textarea>
    </p>
    <p>
    <ul class="w3-ul w3-card-2">
        <?php foreach (range(1, 5) as $nut) { ?>
            <li>
                <span onclick="this.parentElement.style.display='none'"
                      class="w3-closebtn w3-margin-right w3-medium">&times;</span>
                <div class="w3-row">
                    <div class="w3-col s12 m5 w3-padding-small">
                        <select class="w3-input">
                            <option>Select Nutrient</option>
                        </select>
                    </div>
                    <div class="w3-col s9 m6 w3-padding-small">
                        <input min="0" class="w3-input" placeholder="Nutrient Value" type="number">
                    </div>
                    <div class="w3-col s3 m1 w3-padding-small">&micro;g</div>
                </div>
            </li>
        <?php } ?>
        <li>
                <span onclick="this.parentElement.style.display='none'"
                      class="w3-closebtn w3-margin-right w3-medium hidden">&times;</span>
            <div class="w3-row">
                <div class="w3-col s12 m5 w3-padding-small">
                    <select class="w3-input">
                        <option>Select Nutrient</option>
                    </select>
                </div>
                <div class="w3-col s9 m6 w3-padding-small">
                    <input min="0" class="w3-input" placeholder="Nutrient Value" type="number">
                </div>
                <div class="w3-col s3 m1 w3-padding-small">&micro;g</div>
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

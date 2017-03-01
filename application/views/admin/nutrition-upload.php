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
    <p>
        <label>CSV of nutrients</label>
        <input class="w3-input" type="file" accept="text/csv,.csv" required>
    </p>
    <p>
        <label>Brief description</label>
        <textarea class="w3-input" required></textarea>
    </p>
    <div class="horizontal-flex-end">
        <button type="submit" class="w3-button w3-blue">Upload</button>
    </div>
</form>
